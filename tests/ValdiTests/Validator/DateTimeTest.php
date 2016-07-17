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

use Valdi\Validator\DateTime;

class DateTimeTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new DateTime();

        $this->assertTrue($validator->isValid('2016-02-28 01:23:45', array()));
        $this->assertTrue($validator->isValid('20160228012345', array('YmdHis')));

        $this->assertFalse($validator->isValid('2016-02-28', array()));
        $this->assertFalse($validator->isValid('test', array()));

        $this->assertTrue($validator->isValid('', array()));
        $this->assertTrue($validator->isValid(null, array()));
    }

    public function testGetInvalidDetails() {
        $validator = new DateTime();
        $read = $validator->getInvalidDetails();
        $expected = 'dateTime';
        $this->assertSame($read, $expected);
    }

}
