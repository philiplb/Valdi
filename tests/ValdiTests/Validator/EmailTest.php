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
use Valdi\Validator\Email;

class EmailTest extends PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Email();

        $this->assertTrue($validator->isValid('test@test.de', []));

        $this->assertFalse($validator->isValid('test.de', []));
        $this->assertFalse($validator->isValid('@test.de', []));
        $this->assertFalse($validator->isValid('test', []));

        $this->assertTrue($validator->isValid('', []));
        $this->assertTrue($validator->isValid(null, []));
    }

    public function testGetInvalidDetails() {
        $validator = new Email();
        $read = $validator->getInvalidDetails();
        $expected = 'email';
        $this->assertSame($read, $expected);
    }

}
