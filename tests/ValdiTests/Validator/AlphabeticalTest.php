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
use Valdi\Validator\Alphabetical;

class AlphabeticalTest extends \PHPUnit\Framework\TestCase
{

    public function testValidate()
    {
        $validator = new Alphabetical();

        $this->assertTrue($validator->isValid('test', []));

        $this->assertFalse($validator->isValid('test123', []));
        $this->assertFalse($validator->isValid('@test.de', []));

        $this->assertTrue($validator->isValid('', []));
        $this->assertTrue($validator->isValid(null, []));
    }

}
