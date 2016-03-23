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
 * Validator for min values.
 */
class Min extends AbstractComparator {

    /**
     * Holds the type of the validator.
     */
    protected $type = 'min';

    /**
     * {@inheritdoc}
     */
    protected function isValidComparison($value, $parameters) {
        $isAllNumeric = $this->isAllNumeric($value, $parameters[0]);
        return $isAllNumeric && $value >= $parameters[0];
    }
}
