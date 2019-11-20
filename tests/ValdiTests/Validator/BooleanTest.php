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
use Valdi\Validator\Boolean;

class BooleanTest extends \PHPUnit\Framework\TestCase
{

    public function testValidate()
    {
        $validator = new Boolean();

        $this->assertTrue($validator->isValid(1, []));
        $this->assertTrue($validator->isValid('1', []));
        $this->assertTrue($validator->isValid(true, []));
        $this->assertTrue($validator->isValid('true', []));
        $this->assertTrue($validator->isValid('on', []));
        $this->assertTrue($validator->isValid('yes', []));

        $this->assertTrue($validator->isValid(0, []));
        $this->assertTrue($validator->isValid('0', []));
        $this->assertTrue($validator->isValid(false, []));
        $this->assertTrue($validator->isValid('false', []));
        $this->assertTrue($validator->isValid('off', []));
        $this->assertTrue($validator->isValid('no', []));
        $this->assertTrue($validator->isValid('', []));
        $this->assertTrue($validator->isValid(null, []));

        $this->assertFalse($validator->isValid('test', []));
    }

    public function testGetInvalidDetails()
    {
        $validator = new Boolean();
        $read = $validator->getInvalidDetails();
        $expected = 'boolean';
        $this->assertSame($read, $expected);
    }

}
