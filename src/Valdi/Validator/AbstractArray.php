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

use Valdi\ValidationException;
use Valdi\Validator;

/**
 * Validator for array data, be it maps or lists.
 */
abstract class AbstractArray implements ValidatorInterface {


    /**
     * Holds the invalid values.
     */
    protected $invalidDetails;


    /**
     * Checks whether the given values are of the expected array data.
     *
     * @param mixed $values
     * the potential array values to check
     * @param Validator $validator
     * the validator to check with
     * @param array $rules
     * the rules which the array data must fulfill
     *
     * @return boolean
     * true if all the $values are valid, else false with the invalid details set
     */
    abstract protected function isValidArray($values, Validator $validator, array $rules);

    /**
     * {@inheritdoc}
     */
    public function isValid($value, array $parameters) {
        if (count($parameters) !== 2) {
            throw new ValidationException('Expecting two parameters.');
        }
        if (!($parameters[0] instanceof Validator)) {
            throw new ValidationException('Expecting the first parameter to be an instance of a Validator.');
        }
        return in_array($value, ['', null], true) ||
            $this->isValidArray($value, $parameters[0], $parameters[1]);
    }
}
