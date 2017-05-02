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
 * Validator for array values fulfilling a rule.
 */
class Collection implements ValidatorInterface {


    /**
     * Holds the invalid array values.
     */
    protected $invalidDetails;

    /**
     * Checks whether the given values are of the expected array.
     *
     * @param mixed $values
     * the potential array values to check
     * @param Validator $validator
     * the validator to check with
     * @param array $rule
     * the rule which each element must fulfill
     *
     * @return boolean
     * true if all the $values are a valid array, else false with the invalid details set
     */
    protected function isValidCollection($values, Validator $validator, array $rule) {
        if (!is_array($values)) {
            $this->invalidDetails = $values;
            return false;
        }

        $this->invalidDetails = [];
        foreach ($values as $key => $value) {
            $elementValidation = $validator->isValid(['value' => [$rule]], ['value' => $value]);
            if (!$elementValidation['valid']) {
                $this->invalidDetails[$key] = $elementValidation['errors']['value'][0];
            }
        }
        return count($this->invalidDetails) === 0;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid($value, array $parameters) {
        if (count($parameters) !== 2) {
            throw new ValidationException('"collection" expects two parameters.');
        }
        if (!($parameters[0] instanceof Validator)) {
            throw new ValidationException('"collection" expects the first parameter to be an instance of a Validator.');
        }
        return in_array($value, ['', null], true) ||
            $this->isValidCollection($value, $parameters[0], $parameters[1]);
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidDetails() {
        return ['collection' => $this->invalidDetails];
    }
}
