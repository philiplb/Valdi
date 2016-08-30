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
 * Validator for parametrized validators.
 */
abstract class AbstractParametrizedValidator implements ValidatorInterface {

    /**
     * Throws an exception if the parameters don't fulfill the expected
     * parameter count.
     *
     * @param string $name
     * the name of the validator
     * @param integer $parameterAmount
     * the amount of expected parameters
     * @param string[] $parameters
     * the parameters
     *
     * @throws ValidationException
     * thrown if the amount of parameters isn't the expected one
     */
    protected function validateParameterCount($name, $parameterAmount, array $parameters) {
        if (count($parameters) !== $parameterAmount) {
            throw new ValidationException('"'.$name.'" expects '.$parameterAmount.' parameter.');
        }
    }

}
