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
use Valdi\Validator\Integer;

class IntegerTest extends PHPUnit_Framework_TestCase
{

    public function testValidate()
    {
        $validator = new Integer();

        $this->assertTrue($validator->isValid(1, []));
        $this->assertTrue($validator->isValid('1', []));

        $this->assertFalse($validator->isValid('test', []));
        $this->assertFalse($validator->isValid('1abc', []));

        $this->assertTrue($validator->isValid('', []));
        $this->assertTrue($validator->isValid(null, []));
    }

    public function testGetInvalidDetails()
    {
        $validator = new Integer();
        $read = $validator->getInvalidDetails();
        $expected = 'integer';
        $this->assertSame($read, $expected);
    }

}
