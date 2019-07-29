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
use Valdi\Validator\Min;

class MinTest extends PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Min();

        $this->assertTrue($validator->isValid(1, [1]));
        $this->assertTrue($validator->isValid(1.1, [1.1]));
        $this->assertTrue($validator->isValid('1', [1]));
        $this->assertTrue($validator->isValid('1.1', [1.1]));

        $this->assertTrue($validator->isValid(2, [1]));
        $this->assertTrue($validator->isValid(2.1, [1.1]));
        $this->assertTrue($validator->isValid('2', [1]));
        $this->assertTrue($validator->isValid('2.1', [1.1]));

        $this->assertFalse($validator->isValid(1, [2]));
        $this->assertFalse($validator->isValid(1.1, [2.1]));
        $this->assertFalse($validator->isValid('1', [2]));
        $this->assertFalse($validator->isValid('1.1', [2.1]));

        $this->assertFalse($validator->isValid('test', [1]));

        $this->assertTrue($validator->isValid('', [1]));
        $this->assertTrue($validator->isValid(null, [1]));
    }

}
