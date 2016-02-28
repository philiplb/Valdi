<?php

namespace ValdiTests\Validator;

use Valdi\Validator\Boolean;

class BooleanTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Boolean();

        $this->assertTrue($validator->validate(1, array()));
        $this->assertTrue($validator->validate('1', array()));
        $this->assertTrue($validator->validate(true, array()));
        $this->assertTrue($validator->validate('on', array()));
        $this->assertTrue($validator->validate('yes', array()));

        $this->assertFalse($validator->validate(0, array()));
        $this->assertFalse($validator->validate('0', array()));
        $this->assertFalse($validator->validate(false, array()));
        $this->assertFalse($validator->validate('off', array()));
        $this->assertFalse($validator->validate('no', array()));

        $this->assertFalse($validator->validate('test', array()));
        $this->assertFalse($validator->validate('', array()));
        $this->assertFalse($validator->validate(null, array()));
    }

}
