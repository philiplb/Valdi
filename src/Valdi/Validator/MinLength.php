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
 * Validator for strings of a min length.
 */
class MinLength extends AbstractComparator {

    /**
     * Holds the type of the validator.
     */
    protected $type = 'minLength';

    /**
     * {@inheritdoc}
     */
    protected function isValidComparison($value, $parameters) {
        $length = strlen($value);
        return is_numeric($parameters[0]) && $length >= $parameters[0];
    }
}
