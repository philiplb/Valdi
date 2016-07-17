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

use Valdi\Validator\AfterDateTime;
use Valdi\ValidationException;

class AfterDateTimeTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new AfterDateTime();

        $this->assertTrue($validator->isValid('2016-03-28 01:23:45', array('2016-03-27 01:23:45')));
        $this->assertTrue($validator->isValid('20160328012345', array('20160327012345', 'YmdHis')));

        $this->assertFalse($validator->isValid('2016-03-28 01:23:45', array('2016-03-28 01:23:45')));
        $this->assertFalse($validator->isValid('20160328012345', array('20160328012345', 'YmdHis')));
        $this->assertFalse($validator->isValid('2016-03-28 01:23:45', array('2016-03-29 01:23:45')));
        $this->assertFalse($validator->isValid('20160328012345', array('20160329012345', 'YmdHis')));
        $this->assertFalse($validator->isValid('test', array('2016-03-29 01:23:45')));

        $this->assertTrue($validator->isValid('', array('2016-03-29 01:23:45')));
        $this->assertTrue($validator->isValid(null, array('2016-03-29 01:23:45')));

        try {
            $validator->isValid('2016-03-28 01:23:45', array('2015-03-27 01:23:45', 'asd'));
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"afterDateTime" expects a date of the format "asd".';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }

        try {
            $validator->isValid('2016-03-28 01:23:45', array());
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"afterDateTime" expects at least 1 parameter.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }
    }

    public function testGetInvalidDetails() {
        $validator = new AfterDateTime();
        $read = $validator->getInvalidDetails();
        $expected = 'afterDateTime';
        $this->assertSame($read, $expected);
    }

}
