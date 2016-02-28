<?php

namespace ValdiTests\Validator;

use Valdi\Validator\InSet;
use Valdi\ValidationException;

class InSetTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new InSet();

        $this->assertTrue($validator->validate('a', array('a')));
        $this->assertTrue($validator->validate('a', array('a', 'b')));

        $this->assertFalse($validator->validate('c', array('a', 'b')));

        $this->assertTrue($validator->validate('', array('a')));
        $this->assertTrue($validator->validate(null, array('a')));

        try {
            $validator->validate('test', array());
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"set" expects at least one parameter.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }
    }

}
