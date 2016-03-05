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
 * Abstract validator to compare date times.
 * For the format, see:
 * http://php.net/manual/en/datetime.createfromformat.php
 */
abstract class DateTimeComparator extends ParametrizedValidator {

    abstract protected function compare($date, $compareDate);

    /**
     * {@inheritdoc}
     */
    public function validate($value, array $parameters) {

        $this->validateMinParameterCount('beforeDateTime', 1, $parameters);

        $format = 'Y-m-d H:i:s';
        if (count($parameters) > 1) {
            $format = $parameters[1];
        }
        $compareDate = \DateTime::createFromFormat($format, $parameters[0]);
        if ($compareDate === false) {
            throw new ValidationException('"beforeDateTime" expects a date of the format ' . $format . '.');
        }

        if (in_array($value, array('', null), true)) {
            return true;
        }

        $date = \DateTime::createFromFormat($format, $value);
        if ($date === false) {
            return false;
        }
        return $this->compare($date, $compareDate);
    }
}
