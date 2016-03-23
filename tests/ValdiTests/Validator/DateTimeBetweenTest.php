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

use Valdi\ValidationException;
use Valdi\Validator\DateTimeBetween;

class DateTimeBetweenTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new DateTimeBetween();

        $this->assertTrue($validator->isValid('2016-03-29 11:23:45', array('2016-03-29 01:23:45', '2016-03-30 01:23:45')));
        $this->assertTrue($validator->isValid('20160329112345', array('20160329012345', '20160330012345', 'YmdHis')));

        $this->assertFalse($validator->isValid('2016-03-28 01:23:45', array('2016-03-29 01:23:45', '2016-03-30 01:23:45')));
        $this->assertFalse($validator->isValid('2016-03-31 01:23:45', array('2016-03-29 01:23:45', '2016-03-30 01:23:45')));
        $this->assertFalse($validator->isValid('20160328012345', array('20160329012345', '20160330012345', 'YmdHis')));
        $this->assertFalse($validator->isValid('20160330012345', array('20160329012345', '20160330012345', 'YmdHis')));
        $this->assertFalse($validator->isValid('test', array('2016-03-29 01:23:45', '2016-03-30 01:23:45')));

        $this->assertTrue($validator->isValid('', array('2016-03-29 01:23:45', '2016-03-30 01:23:45')));
        $this->assertTrue($validator->isValid(null, array('2016-03-29 01:23:45', '2016-03-30 01:23:45')));

        try {
            $validator->isValid('2016-03-28 01:23:45', array('2016-03-29 01:23:45'));
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"dateTimeBetween" expects at least 2 parameter.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }
    }

}
