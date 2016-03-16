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
 * Validator for a date time being after the given date time.
 * For the format, see:
 * http://php.net/manual/en/datetime.createfromformat.php
 */
class AfterDateTime extends AbstractDateTimeComparator {

    /**
     * Holds the type of the validator.
     */
    protected $type = 'afterDateTime';

    /**
     * {@inheritdoc}
     */
    protected function isValidComparison(\DateTime $date, array $datetimes, array $parameters) {
        return $date > $datetimes[0];
    }

}
