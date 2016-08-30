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

use Valdi\Validator\YoungerThan;
use Valdi\ValidationException;

class YoungerThanTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new YoungerThan();

        $this->assertTrue($validator->isValid(date('Y-m-d H:i:s', time() - 5), [10]));
        $this->assertTrue($validator->isValid(date('YmdHis', time() - 5), [10, 'YmdHis']));

        $this->assertFalse($validator->isValid(date('Y-m-d H:i:s', time() - 5), [4]));
        $this->assertFalse($validator->isValid(date('YmdHis', time() - 5), [4, 'YmdHis']));
        $this->assertFalse($validator->isValid(date('test', time() - 5), [10]));

        $this->assertTrue($validator->isValid('', [10]));
        $this->assertTrue($validator->isValid(null, [10]));

        try {
            $this->assertTrue($validator->isValid(date('Y-m-d H:i:s', time() - 5), []));
            $this->fail();
        } catch (ValidationException $e) {
            $read = $e->getMessage();
            $expected = '"youngerThan" expects at least 1 parameter.';
            $this->assertSame($read, $expected);
        } catch (\Exception $e) {
            $this->fail();
        }
    }

}
