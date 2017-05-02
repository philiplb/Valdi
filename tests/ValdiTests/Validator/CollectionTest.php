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

use Valdi\ValidationException;
use Valdi\Validator;
use Valdi\Validator\Collection;

class CollectionTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Collection();
        $valueValidator = new Validator();

        $this->assertTrue($validator->isValid([], [$valueValidator, [['integer']]]));
        $this->assertTrue($validator->isValid([1], [$valueValidator, [['integer']]]));
        $this->assertTrue($validator->isValid([1, 2, 3], [$valueValidator, [['integer']]]));

        $this->assertFalse($validator->isValid('one', [$valueValidator, [['integer']]]));
        $this->assertFalse($validator->isValid(['one'], [$valueValidator, [['integer']]]));
        $this->assertFalse($validator->isValid(['one', 'two'], [$valueValidator, [['integer']]]));
        $this->assertFalse($validator->isValid([1, 'two'], [$valueValidator, [['integer']]]));

        $this->assertTrue($validator->isValid('', [$valueValidator, [['integer']]]));
        $this->assertTrue($validator->isValid([], [$valueValidator, [['integer']]]));
        $this->assertTrue($validator->isValid(null, [$valueValidator, [['integer']]]));


        try {
            $this->assertTrue($validator->isValid([], []));
            $this->fail();
        } catch (ValidationException $e) {
            $expected = 'Expecting two parameters.';
            $read = $e->getMessage();
            $this->assertSame($read, $expected);
        } catch (\Exception $e) {
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
        $validator = new Collection();
        $valueValidator = new Validator();
        $validator->isValid([1, 'two', 3,'four'], [$valueValidator, [['integer']]]);
        $read = $validator->getInvalidDetails();
        $expected = ['collection' => [1 => ['integer'], 3 => ['integer']]];
        $this->assertSame($expected, $read);
    }

}
