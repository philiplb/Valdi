---------------------------
Valdi\\Validator\\InThePast
---------------------------

.. php:namespace:: Valdi\Validator

.. php:class:: InThePast

      Validator for a date time being in the past compared to the current moment.
      For the format, see:
      http://php.net/manual/en/datetime.createfromformat.php

   .. php:attr:: $amountOfParameters

      Holds the amount of parameters.

   .. php:attr:: $dateTimeParameters

      Holds whether to parse the parameters as \\DateTimes so the child class
      can decide.

   .. php:attr:: $type

      Holds the type of the validator.

   .. php:method:: InThePast::isValidComparison()

      {@inheritdoc}
