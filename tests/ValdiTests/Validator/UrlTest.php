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

use Valdi\Validator\Url;

class UrlTest extends \PHPUnit_Framework_TestCase {

    public function testValidate() {
        $validator = new Url();

        $this->assertTrue($validator->isValid('http://www.philiplb.de', []));
        $this->assertTrue($validator->isValid('https://www.philiplb.de', []));
        $this->assertTrue($validator->isValid('ftps://www.philiplb.de', []));
        $this->assertTrue($validator->isValid('https://www.philiplb.de/CRUDlex', []));
        $this->assertTrue($validator->isValid('https://www.philiplb.de/CRUDlex?test=test', []));

        $this->assertFalse($validator->isValid('test', []));
        $this->assertTrue($validator->isValid('htt://www.philiplb.de', []));

        $this->assertTrue($validator->isValid('', []));
        $this->assertTrue($validator->isValid(null, []));
    }

    public function testGetInvalidDetails() {
        $validator = new Url();
        $read = $validator->getInvalidDetails();
        $expected = 'url';
        $this->assertSame($read, $expected);
    }

}
