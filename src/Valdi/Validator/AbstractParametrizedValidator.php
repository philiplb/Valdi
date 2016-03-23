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
     * Throws an exception if the parameters don't fullfill the expected
     * parameter count.
     *
     * @param string $name
     * the name of the validator
     * @param integer $parameterAmount
     * the amount of expected parameters
     * @param string[] $parameters
     * the parameters
     * @param boolean $exact
     * whether the amount of parameters has to be exact (true) or whether it
     * might be greater (false)
     */
    protected function validateParameterCount($name, $parameterAmount, array $parameters, $exact = true) {
        if (($exact && count($parameters) !== $parameterAmount) || (count($parameters) < $parameterAmount)) {
            throw new ValidationException('"' . $name . '" expects ' . (!$exact ? 'at least ' : '') . $parameterAmount . ' parameter.');
        }
    }

}
