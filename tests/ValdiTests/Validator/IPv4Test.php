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

use Valdi\Validator\IPv4;

class IPv4Test extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new IPv4();

        $this->assertTrue($validator->validate('127.0.0.1', array()));

        $this->assertFalse($validator->validate('2001:0db8:0000:08d3:0000:8a2e:0070:7344', array()));
        $this->assertFalse($validator->validate('999.999.999.999', array()));
        $this->assertFalse($validator->validate('127.0.0', array()));

        $this->assertFalse($validator->validate('test', array()));

        $this->assertTrue($validator->validate('', array()));
        $this->assertTrue($validator->validate(null, array()));
    }

}
