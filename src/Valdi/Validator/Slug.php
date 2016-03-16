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
 * Validator for slug values: Starting with a alphanumerical value,
 * sequences of dashes and more alphanumerical values and ending with an
 * alphanumerical character.
 */
class Slug extends Regexp {

    /**
     * Holds the amount of parameters.
     */
    protected $amountOfParameters = 0;

    /**
     * Holds the type of the validator.
     */
    protected $type = 'slug';

    /**
     * {@inheritdoc}
     */
    protected function isValidComparison($value, $parameters) {
        $parameters = array('/^[a-z0-9][-a-z0-9]*[a-z0-9]+$/i');
        return parent::isValidComparison($value, $parameters);
    }
}
