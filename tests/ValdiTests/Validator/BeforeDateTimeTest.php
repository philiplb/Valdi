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

use Valdi\Validator\BeforeDateTime;

class BeforeDateTimeTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new BeforeDateTime();

        $this->assertTrue($validator->validate('2016-03-28 01:23:45', array('2016-03-29 01:23:45')));
        $this->assertTrue($validator->validate('20160328012345', array('20160329012345', 'YmdHis')));

        $this->assertFalse($validator->validate('2016-03-28 01:23:45', array('2016-03-28 01:23:45')));
        $this->assertFalse($validator->validate('20160328012345', array('20160328012345', 'YmdHis')));
        $this->assertFalse($validator->validate('2016-03-28 01:23:45', array('2016-03-27 01:23:45')));
        $this->assertFalse($validator->validate('20160328012345', array('20160327012345', 'YmdHis')));

        $this->assertTrue($validator->validate('', array('2016-03-29 01:23:45')));
        $this->assertTrue($validator->validate(null, array('2016-03-29 01:23:45')));
    }

}
