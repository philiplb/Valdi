<?php

/*
 * This file is part of the Valdi package.
 *
 * (c) Philip Lehmann-Böhm <philip@philiplb.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Valdi\Validator;

/**
 * Validator for values between.
 */
class Between extends Comparator {

    /**
     * {@inheritdoc}
     */
    protected function compare($a, $parameters) {
        return is_numeric($a) && is_numeric($parameters[0]) &&
            is_numeric($parameters[1])
            && $a >= $parameters[0]
            && $a <= $parameters[1];
    }

    /**
     * Constructor.
     */
    public function __construct() {
        $this->amountOfParameters = 2;
    }
}
