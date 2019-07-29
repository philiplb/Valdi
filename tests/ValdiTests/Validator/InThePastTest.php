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
use Valdi\Validator\InThePast;

class InThePastTest extends PHPUnit_Framework_TestCase
{

    public function testValidate()
    {
        $validator = new InThePast();

        $this->assertTrue($validator->isValid(date('Y-m-d H:i:s', time() - 5), []));
        $this->assertTrue($validator->isValid(date('YmdHis', time() - 5), ['YmdHis']));

        $this->assertFalse($validator->isValid(date('Y-m-d H:i:s', time() + 5), []));
        $this->assertFalse($validator->isValid(date('YmdHis', time() + 5), ['YmdHis']));
        $this->assertFalse($validator->isValid(date('test', time() - 5), []));

        $this->assertTrue($validator->isValid('', [10]));
        $this->assertTrue($validator->isValid(null, [10]));

    }

}
