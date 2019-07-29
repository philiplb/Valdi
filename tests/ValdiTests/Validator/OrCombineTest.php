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

use Exception;
use PHPUnit_Framework_TestCase;
use Valdi\RulesBuilder;
use Valdi\Validator\OrCombine;
use Valdi\ValidationException;
use Valdi\Validator;

class OrCombineTest extends PHPUnit_Framework_TestCase
{

    public function testValidate()
    {
        $combine = new OrCombine();
        $validator = new Validator();

        $this->assertTrue($combine->isValid('test@test.de', [$validator, [['email']], [['url']]]));
        $this->assertTrue($combine->isValid('https://www.philiplb.de', [$validator, [['email']], [['url']]]));

        $this->assertTrue($combine->isValid('one', [$validator, [['email']], [['url']], [['inSet', 'one', 'two']]]));

        $this->assertFalse($combine->isValid('test', [$validator, [['email']], [['url']]]));
        $this->assertFalse($combine->isValid('three', [$validator, [['email']], [['url']], [['inSet', 'one', 'two']]]));

        $this->assertTrue($combine->isValid('', [$validator, [['email']], [['url']]]));
        $this->assertTrue($combine->isValid(null, [$validator, [['email']], [['url']]]));


        try {
            $this->assertTrue($combine->isValid('test@test.de', [$validator, [['email']]]));
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"or" expects at least 3 parameters.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }

        try {
            $this->assertTrue($combine->isValid('test@test.de', ['foo', [['email']], [['url']]]));
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"or" expects the first parameter to be a Validator or a subclass of it.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }

    }

    public function testGetInvalidDetails()
    {
        $combine = new OrCombine();
        $validator = new Validator();
        $combine->isValid('test', [$validator, [['email']], [['url']]]);
        $read = $combine->getInvalidDetails();
        $expected = ['or' => ['email', 'url']];
        $this->assertSame($read, $expected);
    }

    public function testValidateWithRulesBuilder()
    {
        $combine = new OrCombine();
        $validator = new Validator();

        $builder = RulesBuilder::create();
        $minIntegerRules = $builder->addRule('integer')->addRule('min', 5)->build();
        $emailRules = $builder->addRule('email')->build();
        $this->assertTrue($combine->isValid('test@test.de', [$validator, $minIntegerRules, $emailRules]));
        $this->assertTrue($combine->isValid(6, [$validator, $minIntegerRules, $emailRules]));
        $this->assertFalse($combine->isValid('asd', [$validator, $minIntegerRules, $emailRules]));
    }
}
