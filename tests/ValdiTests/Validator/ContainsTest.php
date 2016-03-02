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

use Valdi\Validator\Contains;
use Valdi\ValidationException;

class ContainsTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Contains();

        $this->assertTrue($validator->validate('test', array(true, 'ES')));
        $this->assertTrue($validator->validate('test', array(false, 'es')));

        $this->assertFalse($validator->validate('test', array(false, 'ES')));
        $this->assertFalse($validator->validate('test', array(true, '123')));

        $this->assertTrue($validator->validate('', array(true, 'es')));
        $this->assertTrue($validator->validate(null, array(true, 'es')));
    }

}
