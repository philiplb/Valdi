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
 * Validator for regular expressions.
 */
class Regexp extends Comparator {

    /**
     * Holds the type of the validator.
     */
    protected $type = 'regexp';

    /**
     * {@inheritdoc}
     */
    protected function compare($value, $parameters) {
        // Workaround for not using '@preg_match'.
        $oldError    = error_reporting(0);
        $regexResult = preg_match($parameters[0], $value);
        error_reporting($oldError);
        return $regexResult === 1;
    }
}
