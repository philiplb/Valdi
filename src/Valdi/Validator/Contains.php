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
 * Validator for strings containing a substring.
 */
class Contains implements ValidatorInterface {

    /**
     * {@inheritdoc}
     */
    public function isValid($value, array $parameters) {
        $parametersCount = count($parameters);

        if ($parametersCount < 1) {
            throw new ValidationException('"contains" expects at least 1 parameter.');
        }

        $caseInsensitive = $parametersCount == 1 || $parametersCount > 1 && $parameters[1];

        if ($caseInsensitive) {
            $parameters[0] = strtolower($parameters[0]);
            $value         = strtolower($value);
        }
        return in_array($value, array('', null), true) || strpos($value, $parameters[0]) !== false;
    }
}
