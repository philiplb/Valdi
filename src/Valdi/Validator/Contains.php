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
 * Validator for strings containing a substring.
 */
class Contains extends Comparator {

    /**
     * Holds the amount of parameters.
     */
    protected $amountOfParameters = 2;

    /**
     * Holds the type of the validator.
     */
    protected $type = 'contains';

    /**
     * {@inheritdoc}
     */
    protected function compare($value, $parameters) {
        if ($parameters[0]) {
            $parameters[1] = strtolower($parameters[1]);
            $value = strtolower($value);
        }
        return strpos($value, $parameters[1]) !== false;
    }
}
