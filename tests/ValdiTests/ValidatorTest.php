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
            'c' => '',
            'd' => 42,
            'e' => 'test',
            'f' => '',
        );
        $validators = array(
            'a' => array('required'),
            'b' => array(array('required')),
            'c' => array('required'),
            'd' => array('required', 'integer'),
            'e' => array('required', 'integer'),
            'f' => array('required', 'integer'),
        );
        $read = $validator->validate($validators, $data);
        $expected = array(
            'valid' => false,
            'errors' => array(
                'b' => array('required' => false),
                'c' => array('required' => false),
                'e' => array('integer' => false),
                'f' => array('required' => false),
            )
        );
        $this->assertSame($read, $expected);
            $validator = new Validator();
            $data = array(
                'a' => 'a',
                'b' => 'b',
            );
            $validators = array(
                'a' => array('required'),
                'b' => array(array('required')),
            );
            $read = $validator->validate($validators, $data);
            $expected = array(
                'valid' => true,
                'errors' => array()
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
