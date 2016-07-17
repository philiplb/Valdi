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

use Valdi\Validator\IP;

class IPTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new IP();

        $this->assertTrue($validator->isValid('127.0.0.1', array()));
        $this->assertTrue($validator->isValid('2001:0db8:0000:08d3:0000:8a2e:0070:7344', array()));
        $this->assertTrue($validator->isValid('2001:db8:0:8d3:0:8a2e:70:7344', array()));
        $this->assertTrue($validator->isValid('::ffff:7f00:1', array()));

        $this->assertFalse($validator->isValid('999.999.999.999', array()));
        $this->assertFalse($validator->isValid('127.0.0', array()));
        $this->assertFalse($validator->isValid(':::ffff:7f00:1', array()));

        $this->assertFalse($validator->isValid('test', array()));

        $this->assertTrue($validator->isValid('', array()));
        $this->assertTrue($validator->isValid(null, array()));
    }

    public function testGetInvalidDetails() {
        $validator = new IP();
        $read = $validator->getInvalidDetails();
        $expected = 'ip';
        $this->assertSame($read, $expected);
    }

}
