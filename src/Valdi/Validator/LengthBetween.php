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
class LengthBetween extends AbstractComparator {

    /**
     * Holds the amount of parameters.
     */
    protected $amountOfParameters = 2;

    /**
     * Holds the type of the validator.
     */
    protected $type = 'lengthBetween';

    /**
     * {@inheritdoc}
     */
    protected function isValidComparison($value, $parameters) {
        return $this->isAllNumeric($parameters[0], $parameters[1])
            && strlen($value) >= $parameters[0]
            && strlen($value) <= $parameters[1];
    }
}
