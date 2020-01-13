---------------------------
Valdi\\Validator\\OlderThan
---------------------------

.. php:namespace:: Valdi\Validator

.. php:class:: OlderThan

      Validator for a date time being older than a certain amount of seconds
      compared to the current moment.
      For the format, see:
      http://php.net/manual/en/datetime.createfromformat.php

   .. php:attr:: $dateTimeParameters

      Holds whether to parse the parameters as \\DateTimes so the child class
      can decide.

   .. php:attr:: $type

      Holds the type of the validator.

   .. php:method:: OlderThan::isValidComparison()

      {@inheritdoc}
