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

        $this->assertTrue($validator->validate('test', array()));
        $this->assertTrue($validator->validate('a-test', array()));
        $this->assertTrue($validator->validate('a-real-test', array()));

        $this->assertFalse($validator->validate('-test', array()));
        $this->assertFalse($validator->validate('false-test-', array()));
        $this->assertFalse($validator->validate('@test', array()));

        $this->assertTrue($validator->validate('', array()));
        $this->assertTrue($validator->validate(null, array()));
    }

}
