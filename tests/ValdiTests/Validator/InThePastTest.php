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

use Valdi\Validator\InThePast;
use Valdi\ValidationException;

class InThePastTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new InThePast();

        $this->assertTrue($validator->validate(date('Y-m-d H:i:s', time() - 5), array()));
        $this->assertTrue($validator->validate(date('YmdHis', time() - 5), array('YmdHis')));

        $this->assertFalse($validator->validate(date('Y-m-d H:i:s', time() + 5), array()));
        $this->assertFalse($validator->validate(date('YmdHis', time() + 5), array('YmdHis')));
        $this->assertFalse($validator->validate(date('test', time() - 5), array()));

        $this->assertTrue($validator->validate('', array(10)));
        $this->assertTrue($validator->validate(null, array(10)));

    }

}
