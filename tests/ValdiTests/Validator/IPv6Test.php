<?php

namespace ValdiTests\Validator;

use Valdi\Validator\IPv6;

class IPv6Test extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new IPv6();

        $this->assertTrue($validator->validate('2001:0db8:0000:08d3:0000:8a2e:0070:7344', array()));
        $this->assertTrue($validator->validate('2001:db8:0:8d3:0:8a2e:70:7344', array()));
        $this->assertTrue($validator->validate('::ffff:7f00:1', array()));

        $this->assertFalse($validator->validate('127.0.0.1', array()));
        $this->assertFalse($validator->validate('999.999.999.999', array()));
        $this->assertFalse($validator->validate('127.0.0', array()));
        $this->assertFalse($validator->validate(':::ffff:7f00:1', array()));

        $this->assertFalse($validator->validate('test', array()));
        $this->assertFalse($validator->validate('', array()));
        $this->assertFalse($validator->validate(null, array()));
    }

}
