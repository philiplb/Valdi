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

use Valdi\Validator\Max;

class MaxTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Max();

        $this->assertTrue($validator->isValid(1, array(1)));
        $this->assertTrue($validator->isValid(1.1, array(1.1)));
        $this->assertTrue($validator->isValid('1', array(1)));
        $this->assertTrue($validator->isValid('1.1', array(1.1)));

        $this->assertTrue($validator->isValid(1, array(2)));
        $this->assertTrue($validator->isValid(1.1, array(2.1)));
        $this->assertTrue($validator->isValid('1', array(2)));
        $this->assertTrue($validator->isValid('1.1', array(2.1)));

        $this->assertFalse($validator->isValid(2, array(1)));
        $this->assertFalse($validator->isValid(2.1, array(1.1)));
        $this->assertFalse($validator->isValid('2', array(1)));
        $this->assertFalse($validator->isValid('2.1', array(1.1)));

        $this->assertFalse($validator->isValid('test', array(1)));

        $this->assertTrue($validator->isValid('', array(1)));
        $this->assertTrue($validator->isValid(null, array(1)));
    }

}
