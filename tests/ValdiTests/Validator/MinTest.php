<?php

namespace ValdiTests\Validator;

use Valdi\Validator\Min;

class MinTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Min();

        $this->assertTrue($validator->validate(1, array(1)));
        $this->assertTrue($validator->validate(1.1, array(1.1)));
        $this->assertTrue($validator->validate('1', array(1)));
        $this->assertTrue($validator->validate('1.1', array(1.1)));

        $this->assertTrue($validator->validate(2, array(1)));
        $this->assertTrue($validator->validate(2.1, array(1.1)));
        $this->assertTrue($validator->validate('2', array(1)));
        $this->assertTrue($validator->validate('2.1', array(1.1)));

        $this->assertFalse($validator->validate(1, array(2)));
        $this->assertFalse($validator->validate(1.1, array(2.1)));
        $this->assertFalse($validator->validate('1', array(2)));
        $this->assertFalse($validator->validate('1.1', array(2.1)));

        $this->assertFalse($validator->validate('test', array(1)));

        $this->assertTrue($validator->validate('', array(1)));
        $this->assertTrue($validator->validate(null, array(1)));
    }

}
