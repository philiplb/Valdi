<?php

/*
 * This file is part of the Valdi package.
 *
 * (c) Philip Lehmann-Böhm <philip@philiplb.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ValdiTests\Validator;

use Valdi\RulesBuilder;
use Valdi\ValidationException;
use Valdi\Validator;
use Valdi\Validator\Nested;

class NestedTest extends \PHPUnit_Framework_TestCase {

    protected function getRules() {
        return RulesBuilder::create()
        ->addRule('b', 'required')
        ->addRule('b', 'integer')
        ->addRule('c', 'required')
        ->getRules()
        ;
    }

    public function testValidate() {
        $validator = new Nested();
        $nestedValidator = new Validator();
        $rules = $this->getRules();

        $this->assertTrue($validator->isValid(['b' => 1, 'c' => 'asd'], [$nestedValidator, $rules]));
        $this->assertFalse($validator->isValid(['c' => 'asd'], [$nestedValidator, $rules]));
        $this->assertFalse($validator->isValid(['b' => 1], [$nestedValidator, $rules]));
        $this->assertFalse($validator->isValid(['b' => 'foo', 'c' => 'asd'], [$nestedValidator, $rules]));
        $this->assertFalse($validator->isValid('asd', [$nestedValidator, $rules]));


        $this->assertTrue($validator->isValid('', [$nestedValidator, $rules]));
        $this->assertTrue($validator->isValid(null, [$nestedValidator, $rules]));

        try {
            $this->assertTrue($validator->isValid([], []));
            $this->fail();
        } catch (ValidationException $e) {
            $expected = 'Expecting two parameters.';
            $read = $e->getMessage();
            $this->assertSame($read, $expected);
        } catch (\Exception $e) {
            var_dump($e);
            $this->fail();
        }

        try {
            $this->assertTrue($validator->isValid([], ['asd', 'dsa']));
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = 'Expecting the first parameter to be an instance of a Validator.';
            $this->assertSame($read, $expected);
        } catch (\Exception $e) {
            $this->fail();
        }

    }

    public function testGetInvalidDetails() {

        $validator = new Nested();
        $nestedValidator = new Validator();
        $rules = $this->getRules();
        $validator->isValid(['b' => 'foo'], [$nestedValidator, $rules]);
        $read = $validator->getInvalidDetails();
        $expected = ['nested' => ['b' => ['integer'], 'c' => ['required']]];
        $this->assertSame($expected, $read);
    }

}
