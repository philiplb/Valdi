<?php

/*
 * This file is part of the Valdi package.
 *
 * (c) Philip Lehmann-Böhm <philip@philiplb.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ValdiTests;

use Valdi\Validator;
use Valdi\ValidatorException;

class RequiredTest extends \PHPUnit_Framework_TestCase {

    public function testIsValid() {
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
            'e' => array('required', 'integer', 'floating'),
            'f' => array('required', 'integer'),
        );
        $read = $validator->isValid($validators, $data);
        $expected = array(
            'valid' => false,
            'errors' => array(
                'b' => array('required'),
                'c' => array('required'),
                'e' => array('integer', 'floating'),
                'f' => array('required'),
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
        $read = $validator->isValid($validators, $data);
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
            $read = $validator->isValid($validators, array());
            $this->fail();
        } catch (ValidatorException $e) {
            $read = $e->getMessage();
            $expected = '"invalid" not found as available validator.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }
    }

    public function testAddValidator() {
        $validator = new Validator();
        $validators = array(
            'a' => array('test')
        );
        try {
            $read = $validator->isValid($validators, array('a' => 1));
            $this->fail();
        } catch (ValidatorException $e) {
            $read = $e->getMessage();
            $expected = '"test" not found as available validator.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }

        $validator->addValidator('test', new TestValidator());
        $read = $validator->isValid($validators, array('a' => 1));
        $expected = array(
            'valid' => false,
            'errors' => array('a' => array('test'))
        );
        $this->assertSame($read, $expected);
        $read = $validator->isValid($validators, array('a' => 2));
        $expected = array(
            'valid' => true,
            'errors' => array()
        );
        $this->assertSame($read, $expected);
    }

}
