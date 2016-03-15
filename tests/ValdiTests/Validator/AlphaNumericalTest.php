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

use Valdi\Validator\AlphaNumerical;
use Valdi\ValidationException;

class AlphaNumericalTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new AlphaNumerical();

        $this->assertTrue($validator->isValid('test', array()));
        $this->assertTrue($validator->isValid('test123', array()));
        $this->assertTrue($validator->isValid('123test', array()));
        $this->assertTrue($validator->isValid('t3st', array()));

        $this->assertFalse($validator->isValid('@test.de', array()));

        $this->assertTrue($validator->isValid('', array()));
        $this->assertTrue($validator->isValid(null, array()));
    }

}
