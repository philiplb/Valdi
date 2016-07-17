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

use Valdi\Validator\InSet;
use Valdi\ValidationException;

class InSetTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new InSet();

        $this->assertTrue($validator->isValid('a', array('a')));
        $this->assertTrue($validator->isValid('a', array('a', 'b')));

        $this->assertFalse($validator->isValid('c', array('a', 'b')));

        $this->assertTrue($validator->isValid('', array('a')));
        $this->assertTrue($validator->isValid(null, array('a')));

        try {
            $validator->isValid('test', array());
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"set" expects at least one parameter.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }
    }

    public function testGetInvalidDetails() {
        $validator = new InSet();
        $read = $validator->getInvalidDetails();
        $expected = 'inSet';
        $this->assertSame($read, $expected);
    }

}
