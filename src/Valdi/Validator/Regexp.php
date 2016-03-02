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
 * Validator for regular expressions.
 */
class Regexp implements ValidatorInterface {

    /**
     * {@inheritdoc}
     */
    public function validate($value, array $parameters) {
        if (count($parameters) !== 1) {
            throw new ValidationException('"regexp" expects one parameter.');
        }
        if (in_array($value, array('', null), true)) {
            return true;
        }
        // Workaround for not using '@preg_match'.
        $oldError = error_reporting(0);
        $regexResult = preg_match($parameters[0], $value);
        error_reporting($oldError);
        return $regexResult === 1;
    }
}
