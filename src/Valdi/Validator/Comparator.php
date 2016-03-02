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
abstract class Comparator extends ParametrizedValidator {

    /**
     * Holds the amount of parameters.
     */
    protected $amountOfParameters;

    /**
     * Performs the comparison.
     *
     * @param mixed $a
     * the first value to compare
     * @param mixed $parameters
     * the values to compare
     *
     * @return boolean
     * true if a compares to the values
     */
    abstract protected function compare($a, $parameters);

    /**
     * {@inheritdoc}
     */
    public function validate($value, array $parameters) {

        $this->validateParameterCount('max', $this->amountOfParameters, $parameters);

        return in_array($value, array('', null), true) ||
            $this->compare($value, $parameters);
    }
}
