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
        $rules = array(
            'a' => array(array('required')),
            'b' => array(array('required')),
            'c' => array(array('required')),
            'd' => array(array('required'), array('integer')),
            'e' => array(array('required'), array('integer'), array('floating')),
            'f' => array(array('required'), array('integer')),
        );
        $read = $validator->isValid($rules, $data);
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
        $rules = array(
            'a' => array(array('required')),
            'b' => array(array('required')),
        );
        $read = $validator->isValid($rules, $data);
        $expected = array(
            'valid' => true,
            'errors' => array()
        );
        $this->assertSame($read, $expected);
    }

    public function testInvalidOrCombine() {
        $validator = new Validator();
        $data = array(
            'a' => 'invalid'
        );
        $rules = array(
            'a' => array(array('or', $validator, array('email'), array('url')))
        );
        $read = $validator->isValid($rules, $data);
        $expected = array(
            'valid' => false,
            'errors' => array(
                'a' => array(array('or' => array('email', 'url')))
            )
        );
        $this->assertSame($read, $expected);
    }

    public function testInvalidRule() {
        $validator = new Validator();
        $rules = array(
            'a' => array(array('invalid'))
        );
        try {
            $read = $validator->isValid($rules, array());
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
        $rules = array(
            'a' => array(array('test'))
        );
        try {
            $read = $validator->isValid($rules, array('a' => 1));
            $this->fail();
        } catch (ValidatorException $e) {
            $read = $e->getMessage();
            $expected = '"test" not found as available validator.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }

        $validator->addValidator('test', new TestValidator());
        $read = $validator->isValid($rules, array('a' => 1));
        $expected = array(
            'valid' => false,
            'errors' => array('a' => array('test'))
        );
        $this->assertSame($read, $expected);
        $read = $validator->isValid($rules, array('a' => 2));
        $expected = array(
            'valid' => true,
            'errors' => array()
        );
        $this->assertSame($read, $expected);
    }

}
