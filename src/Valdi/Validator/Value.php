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
 * Validator for equal values.
 */
class Value extends AbstractComparator {

    /**
     * Holds the type of the validator.
     */
    protected $type = 'value';

    /**
     * {@inheritdoc}
     */
    protected function isValidComparison($value, $parameters) {
        return $value == $parameters[0];
    }
}
