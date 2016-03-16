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
 * Validator for alphabetical values.
 */
class Alphabetical extends Regexp {

    /**
     * Holds the amount of parameters.
     */
    protected $amountOfParameters = 0;

    /**
     * Holds the type of the validator.
     */
    protected $type = 'alphabetical';

    /**
     * {@inheritdoc}
     */
    protected function isValidComparison($value, $parameters) {
        $parameters = array('/^([a-z])+$/i');
        return parent::isValidComparison($value, $parameters);
    }
}
