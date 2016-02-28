<?php

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
