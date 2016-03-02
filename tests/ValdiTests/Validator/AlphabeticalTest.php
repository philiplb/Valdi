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

use Valdi\Validator\Alphabetical;
use Valdi\ValidationException;

class AlphaTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Alphabetical();

        $this->assertTrue($validator->validate('test', array()));

        $this->assertFalse($validator->validate('test123', array()));
        $this->assertFalse($validator->validate('@test.de', array()));

        $this->assertTrue($validator->validate('', array()));
        $this->assertTrue($validator->validate(null, array()));
    }

}
