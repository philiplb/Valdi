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

use Valdi\Validator\Regexp;
use Valdi\ValidationException;

class RegexpTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Regexp();

        $this->assertTrue($validator->validate('test', array('/t.st/')));

        $this->assertFalse($validator->validate('test', array('foo')));
        $this->assertFalse($validator->validate('@test.de', array('foo')));

        $this->assertTrue($validator->validate('', array('foo')));
        $this->assertTrue($validator->validate(null, array('foo')));

        try {
            $validator->validate('test', array());
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"regexp" expects 1 parameter.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }

        try {
            $validator->validate('test', array('1', '2'));
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"regexp" expects 1 parameter.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }
    }

}
