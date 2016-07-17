<?php

/*
 * This file is part of the Valdi package.
 *
 * (c) Philip Lehmann-Böhm <philip@philiplb.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ValdiTests\Validator;

use Valdi\Validator\OrCombine;
use Valdi\ValidationException;
use Valdi\Validator;

class OrCombineTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $combine = new OrCombine();
        $validator = new Validator();

        $this->assertTrue($combine->isValid('test@test.de', array($validator, array('email'), array('url'))));
        $this->assertTrue($combine->isValid('https://www.philiplb.de', array($validator, array('email'), array('url'))));

        $this->assertTrue($combine->isValid('one', array($validator, array('email'), array('url'), array('inSet', 'one', 'two'))));

        $this->assertFalse($combine->isValid('test', array($validator, array('email'), array('url'))));
        $this->assertFalse($combine->isValid('three', array($validator, array('email'), array('url'), array('inSet', 'one', 'two'))));

        $this->assertTrue($combine->isValid('', array($validator, array('email'), array('url'))));
        $this->assertTrue($combine->isValid(null, array($validator, array('email'), array('url'))));


        try {
            $this->assertTrue($combine->isValid('test@test.de', array($validator, array('email'))));
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"or" expects at least 3 parameters.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }

        try {
            $this->assertTrue($combine->isValid('test@test.de', array('foo', array('email'), array('url'))));
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"or" expects the first parameter to be a Validator or a subclass of it.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }

    }

    public function testGetInvalidDetails() {
        $combine = new OrCombine();
        $validator = new Validator();
        $combine->isValid('test', array($validator, array('email'), array('url')));
        $read = $combine->getInvalidDetails();
        $expected = array('or' => array('email', 'url'));
        $this->assertSame($read, $expected);
    }

}
