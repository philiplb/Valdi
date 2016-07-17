<?php

/*
 * This file is part of the Valdi package.
 *
 * (c) Philip Lehmann-Böhm <philip@philiplb.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ValdiTests;

use Valdi\Validator\ValidatorInterface;

class TestValidator implements ValidatorInterface {

    public function isValid($value, array $parameters) {
       return $value % 2 == 0;
    }

    public function getInvalidDetails() {
        return 'test';
    }

}
