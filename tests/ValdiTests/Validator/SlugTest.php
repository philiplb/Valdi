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
use Valdi\Validator\Slug;

class SlugTest extends PHPUnit_Framework_TestCase
{

    public function testSlug()
    {
        $validator = new Slug();

        $this->assertTrue($validator->isValid('test', []));
        $this->assertTrue($validator->isValid('a-test', []));
        $this->assertTrue($validator->isValid('a-real-test', []));

        $this->assertFalse($validator->isValid('-test', []));
        $this->assertFalse($validator->isValid('false-test-', []));
        $this->assertFalse($validator->isValid('@test', []));

        $this->assertTrue($validator->isValid('', []));
        $this->assertTrue($validator->isValid(null, []));
    }

}
