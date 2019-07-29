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

use PHPUnit_Framework_TestCase;
use Valdi\Validator\Floating;

class FloatTest extends PHPUnit_Framework_TestCase
{

    public function testValidate()
    {
        $validator = new Floating();

        $this->assertTrue($validator->isValid(1, []));
        $this->assertTrue($validator->isValid(1.2, []));
        $this->assertTrue($validator->isValid('1', []));
        $this->assertTrue($validator->isValid('1.2', []));

        $this->assertFalse($validator->isValid('test', []));
        $this->assertFalse($validator->isValid('1abc', []));

        $this->assertTrue($validator->isValid('', []));
        $this->assertTrue($validator->isValid(null, []));
    }

    public function testGetInvalidDetails()
    {
        $validator = new Floating();
        $read = $validator->getInvalidDetails();
        $expected = 'floating';
        $this->assertSame($read, $expected);
    }

}
