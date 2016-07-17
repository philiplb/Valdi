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

use Valdi\Validator;
use Valdi\ValidationException;

/**
 * Validator to combine other validators with a logical "or".
 */
class OrCombine implements ValidatorInterface {

    /**
     * Holds the invalid validators.
     */
    protected $invalidDetails;

    /**
     * Checks whether the given parameters fullfil:
     * - At least three given
     * - The first one is a Validator or a subclass of it
     *
     * @param array $parameters
     * the validation parameters
     */
    protected function checkParameters($parameters) {
        if (count($parameters) < 3) {
            throw new ValidationException('"or" expects at least 3 parameters.');
        }
        if (!($parameters[0] instanceof Validator)) {
            throw new ValidationException('"or" expects the first parameter to be a Validator or a subclass of it.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function isValid($value, array $parameters) {

        $this->checkParameters($parameters);

        $validator            = array_shift($parameters);
        $this->invalidDetails = array();
        $valid                = false;
        foreach ($parameters as $rules) {
            $failedValidations = $validator->isValidValue(array($rules), $value);
            foreach ($failedValidations as $failedValidation) {
                $this->invalidDetails[] = $failedValidation;
            }
            $valid = $valid || empty($failedValidations);
        }

        return $valid;
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidDetails() {
        return array('or' => $this->invalidDetails);
    }

}
