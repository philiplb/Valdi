<?php

namespace ValdiTests\Validator;

use Valdi\Validator\Max;

class MaxTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Max();

        $this->assertTrue($validator->validate(1, array(1)));
        $this->assertTrue($validator->validate(1.1, array(1.1)));
        $this->assertTrue($validator->validate('1', array(1)));
        $this->assertTrue($validator->validate('1.1', array(1.1)));

        $this->assertTrue($validator->validate(1, array(2)));
        $this->assertTrue($validator->validate(1.1, array(2.1)));
        $this->assertTrue($validator->validate('1', array(2)));
        $this->assertTrue($validator->validate('1.1', array(2.1)));

        $this->assertFalse($validator->validate(2, array(1)));
        $this->assertFalse($validator->validate(2.1, array(1.1)));
        $this->assertFalse($validator->validate('2', array(1)));
        $this->assertFalse($validator->validate('2.1', array(1.1)));

        $this->assertFalse($validator->validate('test', array(1)));

        $this->assertTrue($validator->validate('', array(1)));
        $this->assertTrue($validator->validate(null, array(1)));
    }

}
