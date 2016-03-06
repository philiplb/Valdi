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
 * Validator for a date time being before the given date time.
 * For the format, see:
 * http://php.net/manual/en/datetime.createfromformat.php
 */
class BeforeDateTime extends DateTimeComparator {

    /**
     * Holds the type of the validator.
     */
    protected $type = 'beforeDateTime';

    /**
     * {@inheritdoc}
     */
    protected function compare($date, array $compareDates) {
        return $date < $compareDates[0];
    }

}
