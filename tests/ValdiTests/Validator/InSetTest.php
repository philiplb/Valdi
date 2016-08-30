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

use Valdi\Validator\InSet;
use Valdi\ValidationException;

class InSetTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new InSet();

        $this->assertTrue($validator->isValid('a', ['a']));
        $this->assertTrue($validator->isValid('a', ['a', 'b']));

        $this->assertFalse($validator->isValid('c', ['a', 'b']));

        $this->assertTrue($validator->isValid('', ['a']));
        $this->assertTrue($validator->isValid(null, ['a']));

        try {
            $validator->isValid('test', []);
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"set" expects at least one parameter.';
            $this->assertSame($read, $expected);
        } catch (\Exception $e) {
            $this->fail();
        }
    }

    public function testGetInvalidDetails() {
        $validator = new InSet();
        $read = $validator->getInvalidDetails();
        $expected = 'inSet';
        $this->assertSame($read, $expected);
    }

}
