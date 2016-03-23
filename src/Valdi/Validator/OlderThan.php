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
 * Validator for a date time being older than a certain amount of seconds
 * compared to the current moment.
 * For the format, see:
 * http://php.net/manual/en/datetime.createfromformat.php
 */
class OlderThan extends AbstractDateTimeComparator {

    /**
     * Holds whether to parse the parameters as \DateTimes so the child class
     * can decide.
     */
    protected $dateTimeParameters = false;

    /**
     * Holds the type of the validator.
     */
    protected $type = 'olderThan';

    /**
     * {@inheritdoc}
     */
    protected function isValidComparison(\DateTime $date, array $datetimes, array $parameters) {
        $now = new \DateTime();
        return $now->getTimestamp() - $date->getTimestamp() > $parameters[0];
    }

}
