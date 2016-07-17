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

use Valdi\Validator\Boolean;

class BooleanTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Boolean();

        $this->assertTrue($validator->isValid(1, array()));
        $this->assertTrue($validator->isValid('1', array()));
        $this->assertTrue($validator->isValid(true, array()));
        $this->assertTrue($validator->isValid('true', array()));
        $this->assertTrue($validator->isValid('on', array()));
        $this->assertTrue($validator->isValid('yes', array()));

        $this->assertTrue($validator->isValid(0, array()));
        $this->assertTrue($validator->isValid('0', array()));
        $this->assertTrue($validator->isValid(false, array()));
        $this->assertTrue($validator->isValid('false', array()));
        $this->assertTrue($validator->isValid('off', array()));
        $this->assertTrue($validator->isValid('no', array()));
        $this->assertTrue($validator->isValid('', array()));
        $this->assertTrue($validator->isValid(null, array()));

        $this->assertFalse($validator->isValid('test', array()));
    }

    public function testGetInvalidDetails() {
        $validator = new Boolean();
        $read = $validator->getInvalidDetails();
        $expected = 'boolean';
        $this->assertSame($read, $expected);
    }

}
