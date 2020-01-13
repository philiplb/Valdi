--------------------------------------------
Valdi\\Validator\\AbstractDateTimeComparator
--------------------------------------------

.. toctree::

   AfterDateTime
   BeforeDateTime
   DateTimeBetween
   InTheFuture
   InThePast
   OlderThan
   YoungerThan

.. php:namespace:: Valdi\Validator

.. php:class:: AbstractDateTimeComparator

      Abstract validator to compare date times.
      For the format, see:
      http://php.net/manual/en/datetime.createfromformat.php

   .. php:attr:: $amountOfParameters

      Holds the amount of parameters.

   .. php:attr:: $type

      Holds the type of the validator.

   .. php:attr:: $dateTimeParameters

      Holds whether to parse the parameters as \\DateTimes so the child class
      can decide.

   .. php:method:: AbstractDateTimeComparator::isValidComparison()

      Compares date times.

      :param \\DateTime $date: the first date to compare
      :param \\DateTime[] $datetimes: the date times to compare to
      :param array $parameters: the original validator parameters

      :returns: boolean $ true if the dates compare

   .. php:method:: AbstractDateTimeComparator::getDateTimeFormat()

      Gets a date time format from the parameters if given or a default one.

      :param string[] $parameters: the parameters

      :returns: string $ the date time format

   .. php:method:: AbstractDateTimeComparator::getDateTimes()

      Interprets the given parameters as date times and returns them.

      :param array $parameters: the parameters
      :param string $format: the date time format

      :returns: \\DateTime[] $ the date times

      :throws: ValidationException $ thrown if one of the parameters is not a date in the given format

   .. php:method:: AbstractDateTimeComparator::isValid()

      {@inheritdoc}

   .. php:method:: AbstractDateTimeComparator::getInvalidDetails()

      {@inheritdoc}
