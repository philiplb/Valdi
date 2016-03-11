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

use Valdi\Validator\OlderThan;
use Valdi\ValidationException;

class OlderThanTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new OlderThan();

        $this->assertTrue($validator->validate(date('Y-m-d H:i:s', time() - 15), array(10)));
        $this->assertTrue($validator->validate(date('YmdHis', time() - 15), array(10, 'YmdHis')));

        $this->assertFalse($validator->validate(date('Y-m-d H:i:s', time() - 5), array(10)));
        $this->assertFalse($validator->validate(date('YmdHis', time() - 5), array(10, 'YmdHis')));
        $this->assertFalse($validator->validate(date('test', time() - 10), array(5)));

        $this->assertTrue($validator->validate('', array(10)));
        $this->assertTrue($validator->validate(null, array(10)));

        try {
            $this->assertTrue($validator->validate(date('Y-m-d H:i:s', time() - 5), array()));
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"olderThan" expects at least 1 parameter.';
            $this->assertSame($read, $expected);
        } catch (Exception $e) {
            $this->fail();
        }
    }

}
