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

use Valdi\Validator\Integer;

class IntegerTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Integer();

        $this->assertTrue($validator->isValid(1, array()));
        $this->assertTrue($validator->isValid('1', array()));

        $this->assertFalse($validator->isValid('test', array()));
        $this->assertFalse($validator->isValid('1abc', array()));

        $this->assertTrue($validator->isValid('', array()));
        $this->assertTrue($validator->isValid(null, array()));
    }

    public function testGetInvalidDetails() {
        $validator = new Integer();
        $read = $validator->getInvalidDetails();
        $expected = 'integer';
        $this->assertSame($read, $expected);
    }

}
