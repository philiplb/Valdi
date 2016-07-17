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

use Valdi\Validator\Required;

class RequiredTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Required();

        $this->assertTrue($validator->isValid('test', array()));

        $this->assertFalse($validator->isValid('', array()));
        $this->assertFalse($validator->isValid(null, array()));
    }

    public function testGetInvalidDetails() {
        $validator = new Required();
        $read = $validator->getInvalidDetails();
        $expected = 'required';
        $this->assertSame($read, $expected);
    }

}
