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
 * Validator for comparing numeric values.
 */
abstract class Comparator implements ValidatorInterface {

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

        if (count($parameters) !== 1) {
            throw new ValidationException('"max" expects one parameter.');
        }

        return in_array($value, array('', null), true) ||
            (is_numeric($value) && $this->compare($value, $parameters[0]));
    }
}
