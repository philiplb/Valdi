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
 * Validator for a date time being between the given date times.
 * For the format, see:
 * http://php.net/manual/en/datetime.createfromformat.php
 */
class DateTimeBetween extends AbstractDateTimeComparator {

    /**
     * Holds the amount of parameters.
     */
    protected $amountOfParameters = 2;

    /**
     * Holds the type of the validator.
     */
    protected $type = 'dateTimeBetween';

    /**
     * {@inheritdoc}
     */
    protected function isValidComparison(\DateTime $date, array $datetimes, array $parameters) {
        return $date > $datetimes[0] && $date < $datetimes[1];
    }

}
