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

use Valdi\Validator\Floating;

class FloatTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Floating();

        $this->assertTrue($validator->isValid(1, array()));
        $this->assertTrue($validator->isValid(1.2, array()));
        $this->assertTrue($validator->isValid('1', array()));
        $this->assertTrue($validator->isValid('1.2', array()));

        $this->assertFalse($validator->isValid('test', array()));
        $this->assertFalse($validator->isValid('1abc', array()));

        $this->assertTrue($validator->isValid('', array()));
        $this->assertTrue($validator->isValid(null, array()));
    }

    public function testGetInvalidDetails() {
        $validator = new Floating();
        $read = $validator->getInvalidDetails();
        $expected = 'floating';
        $this->assertSame($read, $expected);
    }

}
