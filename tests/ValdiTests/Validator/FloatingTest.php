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

        $this->assertTrue($validator->validate(1, array()));
        $this->assertTrue($validator->validate(1.2, array()));
        $this->assertTrue($validator->validate('1', array()));
        $this->assertTrue($validator->validate('1.2', array()));

        $this->assertFalse($validator->validate('test', array()));
        $this->assertFalse($validator->validate('1abc', array()));

        $this->assertTrue($validator->validate('', array()));
        $this->assertTrue($validator->validate(null, array()));
    }

}
