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

use Valdi\Validator\MaxLength;

class MaxLengthTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new MaxLength();

        $this->assertTrue($validator->validate('1', array(2)));
        $this->assertTrue($validator->validate('11', array(2)));

        $this->assertFalse($validator->validate('11', array(1)));
        $this->assertFalse($validator->validate('111', array(1)));

        $this->assertTrue($validator->validate('', array(1)));
        $this->assertTrue($validator->validate(null, array(1)));
    }

}
