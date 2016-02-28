<?php

namespace ValdiTests\Validator;

use Valdi\Validator\Required;

class RequiredTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Required();

        $this->assertTrue($validator->validate('test', array()));
        
        $this->assertFalse($validator->validate('', array()));
        $this->assertFalse($validator->validate(null, array()));
    }

}
