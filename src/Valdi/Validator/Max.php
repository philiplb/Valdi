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
 * Validator for max values.
 */
class Max implements ValidatorInterface {

    /**
     * {@inheritdoc}
     */
    public function validate($value, array $parameters) {

        if (count($parameters) !== 1) {
            throw new ValidationException('"max" expects one parameter.');
        }

        return $value === '' || $value === null ||
            (is_numeric($value) && $value <= $parameters[0]);
    }
}
