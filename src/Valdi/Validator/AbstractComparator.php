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
 * Validator for comparing values.
 */
abstract class AbstractComparator extends AbstractParametrizedValidator {

    /**
     * Holds the amount of parameters.
     */
    protected $amountOfParameters = 1;

    /**
     * Holds the type of the validator.
     */
    protected $type;

    /**
     * Performs the comparison.
     *
     * @param mixed $value
     * the first value to compare
     * @param mixed $parameters
     * the values to compare
     *
     * @return boolean
     * true if value compares to the parameters
     */
    abstract protected function isValidComparison($value, $parameters);

    /**
     * Checks whether all given parameters are numeric.
     *
     * @return boolean
     * true if all values are numeric
     */
    protected function isAllNumeric() {
        foreach (func_get_args() as $value) {
            if (!is_numeric($value)) {
                return false;
            }
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid($value, array $parameters) {

        $this->validateParameterCount($this->type, $this->amountOfParameters, $parameters);

        return in_array($value, array('', null), true) ||
            $this->isValidComparison($value, $parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidDetails() {
        return $this->type;
    }
}
