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
 * Validator for a date time being younger than a certain amount of seconds
 * compared to the current moment.
 * For the format, see:
 * http://php.net/manual/en/datetime.createfromformat.php
 */
class YoungerThan extends DateTimeComparator {

    /**
     * Holds the amount of parameters.
     */
    protected $amountOfParameters = 0;

    /**
     * Holds the type of the validator.
     */
    protected $type = 'youngerThan';

     /**
      * {@inheritdoc}
      */
     protected function compare(\DateTime $date, array $datetimes, array $parameters) {
         $this->validateMinParameterCount($this->type, 1, $parameters);
         $now = new \DateTime();
         return $now->getTimestamp() - $date->getTimestamp() < $parameters[0];
     }

}
