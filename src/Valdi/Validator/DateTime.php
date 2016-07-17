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
 * Validator for date time with an optional given format.
 * For the format, see:
 * http://php.net/manual/en/datetime.createfromformat.php
 */
class DateTime implements ValidatorInterface {

    /**
     * {@inheritdoc}
     */
    public function isValid($value, array $parameters) {
        $format = 'Y-m-d H:i:s';
        if (count($parameters) > 0) {
            $format = $parameters[0];
        }
        return in_array($value, array('', null), true) ||
            \DateTime::createFromFormat($format, $value) !== false;
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidDetails() {
        return 'dateTime';
    }
}
