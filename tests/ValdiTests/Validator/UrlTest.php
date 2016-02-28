<?php

namespace ValdiTests\Validator;

use Valdi\Validator\Url;

class UrlTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Url();

        $this->assertTrue($validator->validate('http://www.philiplb.de', array()));
        $this->assertTrue($validator->validate('https://www.philiplb.de', array()));
        $this->assertTrue($validator->validate('ftps://www.philiplb.de', array()));
        $this->assertTrue($validator->validate('https://www.philiplb.de/CRUDlex', array()));
        $this->assertTrue($validator->validate('https://www.philiplb.de/CRUDlex?test=test', array()));

        $this->assertFalse($validator->validate('test', array()));
        $this->assertTrue($validator->validate('htt://www.philiplb.de', array()));

        $this->assertTrue($validator->validate('', array()));
        $this->assertTrue($validator->validate(null, array()));
    }

}
