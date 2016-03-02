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
 * Validator for string lengths between.
 */
class LengthBetween extends Comparator {

    /**
     * {@inheritdoc}
     */
    protected function compare($a, $parameters) {
        return $this->allNumeric($parameters[0], $parameters[1])
            && strlen($a) >= $parameters[0]
            && strlen($a) <= $parameters[1];
    }

    /**
     * Constructor.
     */
    public function __construct() {
        $this->amountOfParameters = 2;
    }
}
