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
use Valdi\Validator\MaxLength;

class MaxLengthTest extends \PHPUnit\Framework\TestCase
{

    public function testValidate()
    {
        $validator = new MaxLength();

        $this->assertTrue($validator->isValid('1', [2]));
        $this->assertTrue($validator->isValid('11', [2]));

        $this->assertFalse($validator->isValid('11', [1]));
        $this->assertFalse($validator->isValid('111', [1]));

        $this->assertTrue($validator->isValid('', [1]));
        $this->assertTrue($validator->isValid(null, [1]));
    }

}
