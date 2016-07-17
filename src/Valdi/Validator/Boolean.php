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
 * Validator for booleans.
 */
class Boolean implements ValidatorInterface {

    /**
     * {@inheritdoc}
     */
    public function isValid($value, array $parameters) {
        return in_array($value, array(
            '', null,
            true, false,
            'true', 'false',
            1, 0,
            '1', '0',
            'on', 'off',
            'yes', 'no'
        ), true);
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidDetails() {
        return 'boolean';
    }
}
