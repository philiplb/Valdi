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

/**
 * Validator for strings containing a substring.
 */
class Contains implements ValidatorInterface {

    /**
     * Throws an exception if the parameters don't fullfill the expected
     * parameter count.
     *
     * @param integer $parameterAmount
     * the amount of expected parameters
     */
    protected function validateParameterCount($parameterAmount) {
        if ($parameterAmount < 1) {
            throw new ValidationException('"contains" expects at least 1 parameter.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function isValid($value, array $parameters) {
        $parameterAmount = count($parameters);

        $this->validateParameterCount($parameterAmount);

        if ($parameterAmount == 1 || $parameterAmount > 1 && $parameters[1]) {
            $parameters[0] = strtolower($parameters[0]);
            $value         = strtolower($value);
        }
        return in_array($value, array('', null), true) || strpos($value, $parameters[0]) !== false;
    }
}
