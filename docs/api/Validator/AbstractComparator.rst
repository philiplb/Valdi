-----------------------------
Validator\\AbstractComparator
-----------------------------

.. toctree::

   Between
   Contains
   LengthBetween
   Max
   MaxLength
   Min
   MinLength
   Regexp
   Value

.. php:namespace: Valdi\\Validator

.. php:class:: AbstractComparator

    Validator for comparing values.

    .. php:attr:: amountOfParameters

        protected

        Holds the amount of parameters.

    .. php:attr:: type

        protected

        Holds the type of the validator.

    .. php:method:: isValidComparison($value, $parameters)

        Performs the comparison.

        :type $value: mixed
        :param $value: the first value to compare
        :type $parameters: mixed
        :param $parameters: the values to compare
        :returns: boolean true if value compares to the parameters

    .. php:method:: isAllNumeric()

        Checks whether all given parameters are numeric.

        :returns: boolean true if all values are numeric

    .. php:method:: isValid($value, $parameters)

        {@inheritdoc}

        :param $value:
        :param $parameters:

    .. php:method:: getInvalidDetails()

        {@inheritdoc}

    .. php:method:: validateParameterCount($name, $parameterAmount, $parameters)

        Throws an exception if the parameters don't fullfill the expected
        parameter count.

        :type $name: string
        :param $name: the name of the validator
        :type $parameterAmount: integer
        :param $parameterAmount: the amount of expected parameters
        :type $parameters: string[]
        :param $parameters: the parameters
