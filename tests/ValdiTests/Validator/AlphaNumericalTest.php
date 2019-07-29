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
use Valdi\Validator\AlphaNumerical;

class AlphaNumericalTest extends PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new AlphaNumerical();

        $this->assertTrue($validator->isValid('test', []));
        $this->assertTrue($validator->isValid('test123', []));
        $this->assertTrue($validator->isValid('123test', []));
        $this->assertTrue($validator->isValid('t3st', []));

        $this->assertFalse($validator->isValid('@test.de', []));

        $this->assertTrue($validator->isValid('', []));
        $this->assertTrue($validator->isValid(null, []));
    }

}
