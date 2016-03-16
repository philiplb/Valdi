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
 * Validator for strings of a max length.
 */
class MaxLength extends AbstractComparator {

    /**
     * Holds the type of the validator.
     */
    protected $type = 'maxLength';

    /**
     * {@inheritdoc}
     */
    protected function isValidComparison($value, $parameters) {
        return is_numeric($parameters[0]) && strlen($value) <= $parameters[0];
    }
}
