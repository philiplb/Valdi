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

    /**
     * Holds the amount of parameters.
     */
    protected $amountOfParameters = 1;

    /**
     * Holds the type of the validator.
     */
    protected $type;

    /**
     * Compares date times.
     *
     * @param \DateTime $date
     * the first date to compare
     * @param \DateTime[] $datetimes
     * the date times to compare to
     * @param array $parameters
     * the original validator parameters
     *
     * @return boolean
     * true if the dates compare
     */
    abstract protected function compare($date, array $datetimes, array $parameters);

    /**
     * Gets a date time format from the parameters if given or a default one.
     *
     * @param string[] $parameters
     * the parameters
     *
     * @return string
     * the date time format
     */
    protected function getDateTimeFormat($parameters) {
        $format = 'Y-m-d H:i:s';
        if (count($parameters) > $this->amountOfParameters) {
            $format = $parameters[$this->amountOfParameters];
        }
        return $format;
    }

    /**
     * Interprets the given parameters as date times and returns them.
     *
     * @param array $parameters
     * the paramters
     * @param string $format
     * the date time format
     *
     * @return \DateTime[]
     * the date times
     */
    protected function getDateTimes(array $parameters, $format) {
        $datetimes = array();
        for ($i = 0; $i < $this->amountOfParameters; ++$i) {
            $datetime = \DateTime::createFromFormat($format, $parameters[$i]);
            if ($datetime === false) {
                throw new ValidationException('"' . $this->type . '" expects a date of the format "' . $format . '".');
            }
            $datetimes[] = $datetime;
        }
        return $datetimes;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($value, array $parameters) {

        $this->validateMinParameterCount($this->type, $this->amountOfParameters, $parameters);

        if (in_array($value, array('', null), true)) {
            return true;
        }

        $format = $this->getDateTimeFormat($parameters);

        $datetimes = $this->getDateTimes($parameters, $format);
        $date = \DateTime::createFromFormat($format, $value);
        if ($date === false) {
            return false;
        }

        return $this->compare($date, $datetimes, $parameters);
    }
}
