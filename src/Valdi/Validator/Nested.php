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
 * Validator for nested data sets.
 */
class Nested implements ValidatorInterface {


    /**
     * Holds the invalid values.
     */
    protected $invalidDetails;

    /**
     * Checks whether the given values are of the expected nested data.
     *
     * @param mixed $value
     * the potential nested values to check
     * @param Validator $validator
     * the validator to check with
     * @param array $rules
     * the rules which the nested data must fulfill
     *
     * @return boolean
     * true if all the $values are a valid array, else false with the invalid details set
     */
    protected function isValidNested($value, Validator $validator, array $rules) {
        if (!is_array($value)) {
            $this->invalidDetails = $value;
            return false;
        }

        $elementValidation = $validator->isValid($rules, $value);
        if (!$elementValidation['valid']) {
            $this->invalidDetails = $elementValidation['errors'];
            return false;
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid($value, array $parameters) {
        if (count($parameters) !== 2) {
            throw new ValidationException('"nested" expects two parameters.');
        }
        if (!($parameters[0] instanceof Validator)) {
            throw new ValidationException('"nested" expects the first parameter to be an instance of a Validator.');
        }
        return in_array($value, ['', null], true) ||
            $this->isValidNested($value, $parameters[0], $parameters[1]);
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidDetails() {
        return ['nested' => $this->invalidDetails];
    }
}
