<?php

namespace ValdiTests;

use Valdi\Validator;
use Valdi\ValidatorException;

class RequiredTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Validator();
        $data = array(
            'a' => 'a',
            'b' => null,
            'c' => ''
        );
        $validators = array(
            'a' => array('required'),
            'b' => array(array('required')),
            'c' => array('required')
        );
        $read = $validator->validate($validators, $data);
        $expected = array(
            'valid' => false,
            'fields' => array(
                'a' => array('required' => true),
                'b' => array('required' => false),
                'c' => array('required' => false),
            ),
            'failed' => array('b', 'c')
        );
        $this->assertSame($read, $expected);
    }

    public function testInvalidRule() {
        $validator = new Validator();
        $validators = array(
            'a' => array('invalid')
        );
        try {
            $read = $validator->validate($validators, array());
            $this->fail();
        } catch (ValidatorException $e) {
            $read = $e->getMessage();
            $expected = '"invalid" not found as available validator.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }
    }

}
