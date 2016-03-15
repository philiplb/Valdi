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

use Valdi\Validator\Slug;
use Valdi\ValidationException;

class SlugTest extends \PHPUnit_Framework_TestCase {

    public function testSlug() {
        $validator = new Slug();

        $this->assertTrue($validator->isValid('test', array()));
        $this->assertTrue($validator->isValid('a-test', array()));
        $this->assertTrue($validator->isValid('a-real-test', array()));

        $this->assertFalse($validator->isValid('-test', array()));
        $this->assertFalse($validator->isValid('false-test-', array()));
        $this->assertFalse($validator->isValid('@test', array()));

        $this->assertTrue($validator->isValid('', array()));
        $this->assertTrue($validator->isValid(null, array()));
    }

}
