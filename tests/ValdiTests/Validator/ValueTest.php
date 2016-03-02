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

use Valdi\Validator\Value;

class ValueTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Value();

        $this->assertTrue($validator->validate(1, array(1)));
        $this->assertTrue($validator->validate('1', array(1)));
        $this->assertTrue($validator->validate(1, array('1')));
        $this->assertTrue($validator->validate('1', array('1')));

        $this->assertFalse($validator->validate(2, array(1)));
        $this->assertFalse($validator->validate('2', array(1)));
        $this->assertFalse($validator->validate(2, array('1')));
        $this->assertFalse($validator->validate('2', array('1')));

        $this->assertTrue($validator->validate('', array(1)));
        $this->assertTrue($validator->validate(null, array(1)));
    }

}
