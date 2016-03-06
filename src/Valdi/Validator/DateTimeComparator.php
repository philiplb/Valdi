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
     * Compares two dates.
     *
     * @param \DateTime $date
     * the first date to compare
     * @param \DateTime[] $compareDates
     * the second date to compare
     *
     * @return boolean
     * true if the dates compare
     */
    abstract protected function compare($date, array $compareDates);

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
     * {@inheritdoc}
     */
    public function validate($value, array $parameters) {

        $this->validateMinParameterCount($this->type, $this->amountOfParameters, $parameters);

        $format = $this->getDateTimeFormat($parameters);

        $compareDates = array();
        for ($i = 0; $i < $this->amountOfParameters; ++$i) {
            $compareDate = \DateTime::createFromFormat($format, $parameters[0]);
            if ($compareDate === false) {
                throw new ValidationException('"' . $this->type . '" expects a date of the format "' . $format . '".');
            }
            $compareDates[] = $compareDate;
        }


        if (in_array($value, array('', null), true)) {
            return true;
        }

        $date = \DateTime::createFromFormat($format, $value);
        if ($date === false) {
            return false;
        }
        return $this->compare($date, $compareDates);
    }
}
