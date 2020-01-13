------------------------------------
Valdi\\Validator\\AbstractComparator
------------------------------------

.. toctree::

   Between
   LengthBetween
   Max
   MaxLength
   Min
   MinLength
   Regexp
   Value

.. php:namespace:: Valdi\Validator

.. php:class:: AbstractComparator

      Validator for comparing values.

   .. php:attr:: $amountOfParameters

      Holds the amount of parameters.

   .. php:attr:: $type

      Holds the type of the validator.

   .. php:method:: AbstractComparator::isValidComparison()

      Performs the comparison.

      :param mixed $value: the first value to compare
      :param mixed $parameters: the values to compare

      :returns: boolean $ true if value compares to the parameters

   .. php:method:: AbstractComparator::isAllNumeric()

      Checks whether all given parameters are numeric.

      :returns: boolean $ true if all values are numeric

   .. php:method:: AbstractComparator::isValid()

      {@inheritdoc}

   .. php:method:: AbstractComparator::getInvalidDetails()

      {@inheritdoc}