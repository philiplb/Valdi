<?php

namespace ValdiTests\Validator;

use Valdi\Validator\Integer;

class IntegerTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Integer();

        $this->assertTrue($validator->validate(1, array()));
        $this->assertTrue($validator->validate('1', array()));

        $this->assertFalse($validator->validate('test', array()));
        $this->assertFalse($validator->validate('1abc', array()));

        $this->assertTrue($validator->validate('', array()));
        $this->assertTrue($validator->validate(null, array()));
    }

}
