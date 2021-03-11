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
use Valdi\Validator\DateTime;

class DateTimeTest extends \PHPUnit\Framework\TestCase
{

    public function testValidate()
    {
        $validator = new DateTime();

        $this->assertTrue($validator->isValid('2016-02-28 01:23:45', []));
        $this->assertTrue($validator->isValid('20160228012345', ['YmdHis']));

        $this->assertFalse($validator->isValid('2016-02-28', []));
        $this->assertFalse($validator->isValid('test', []));
        $this->assertFalse($validator->isValid('2016-02-30 01:23:45', []));
        $this->assertFalse($validator->isValid('2016-02-28 25:23:45', []));

        $this->assertTrue($validator->isValid('', []));
        $this->assertTrue($validator->isValid(null, []));
    }

    public function testGetInvalidDetails()
    {
        $validator = new DateTime();
        $read = $validator->getInvalidDetails();
        $expected = 'dateTime';
        $this->assertSame($read, $expected);
    }

}
