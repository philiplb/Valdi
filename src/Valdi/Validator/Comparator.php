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
     * Performs the comparison.
     *
     * @param mixed $a
     * the first number to compare
     * @param mixed $b
     * the second number to compare
     *
     * @return boolean
     * true if a compares to b
     */
    abstract protected function compare($a, $b);

    /**
     * {@inheritdoc}
     */
    public function validate($value, array $parameters) {

        $this->validateParameterCount('max', 1, $parameters);

        return in_array($value, array('', null), true) ||
            $this->compare($value, $parameters[0]);
    }
}
