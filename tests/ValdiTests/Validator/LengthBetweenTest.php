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
use Valdi\Validator\LengthBetween;

class LengthBetweenTest extends PHPUnit_Framework_TestCase
{

    public function testValidate()
    {
        $validator = new LengthBetween();

        $this->assertTrue($validator->isValid('1', [1, 3]));
        $this->assertTrue($validator->isValid('11', [1, 3]));
        $this->assertTrue($validator->isValid('111', [1, 3]));

        $this->assertFalse($validator->isValid('1', [2, 3]));
        $this->assertFalse($validator->isValid('1111', [1, 3]));

        $this->assertTrue($validator->isValid('', [0, 1]));
        $this->assertTrue($validator->isValid(null, [1, 2]));
    }

    public function testGetInvalidDetails()
    {
        $validator = new LengthBetween();
        $read = $validator->getInvalidDetails();
        $expected = 'lengthBetween';
        $this->assertSame($read, $expected);
    }

}
