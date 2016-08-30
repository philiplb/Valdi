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
        $data = [
            'a' => 'a',
            'b' => null,
            'c' => '',
            'd' => 42,
            'e' => 'test',
            'f' => '',
        ];
        $rules = [
            'a' => [['required']],
            'b' => [['required']],
            'c' => [['required']],
            'd' => [['required'], ['integer']],
            'e' => [['required'], ['integer'], ['floating']],
            'f' => [['required'], ['integer']],
        ];
        $read = $validator->isValid($rules, $data);
        $expected = [
            'valid' => false,
            'errors' => [
                'b' => ['required'],
                'c' => ['required'],
                'e' => ['integer', 'floating'],
                'f' => ['required'],
            ]
        ];
        $this->assertSame($read, $expected);
        $validator = new Validator();
        $data = [
            'a' => 'a',
            'b' => 'b',
        ];
        $rules = [
            'a' => [['required']],
            'b' => [['required']],
        ];
        $read = $validator->isValid($rules, $data);
        $expected = [
            'valid' => true,
            'errors' => []
        ];
        $this->assertSame($read, $expected);
    }

    public function testInvalidOrCombine() {
        $validator = new Validator();
        $data = [
            'a' => 'invalid'
        ];
        $rules = [
            'a' => [['or', $validator, ['email'], ['url']]]
        ];
        $read = $validator->isValid($rules, $data);
        $expected = [
            'valid' => false,
            'errors' => [
                'a' => [['or' => ['email', 'url']]]
            ]
        ];
        $this->assertSame($read, $expected);
    }

    public function testInvalidRule() {
        $validator = new Validator();
        $rules = [
            'a' => [['invalid']]
        ];
        try {
            $validator->isValid($rules, []);
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
        $rules = [
            'a' => [['test']]
        ];
        try {
            $validator->isValid($rules, ['a' => 1]);
            $this->fail();
        } catch (ValidatorException $e) {
            $read = $e->getMessage();
            $expected = '"test" not found as available validator.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }

        $validator->addValidator('test', new TestValidator());
        $read = $validator->isValid($rules, ['a' => 1]);
        $expected = [
            'valid' => false,
            'errors' => ['a' => ['test']]
        ];
        $this->assertSame($read, $expected);
        $read = $validator->isValid($rules, ['a' => 2]);
        $expected = [
            'valid' => true,
            'errors' => []
        ];
        $this->assertSame($read, $expected);
    }

}
