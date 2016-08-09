-----------------
Validator\\Regexp
-----------------

.. toctree::

   Alphabetical
   AlphaNumerical
   Slug

.. php:namespace: Valdi\\Validator

.. php:class:: Regexp

    Validator for regular expressions.

    .. php:attr:: type

        protected

        Holds the type of the validator.

    .. php:attr:: amountOfParameters

        protected

        Holds the amount of parameters.

    .. php:method:: isValidComparison($value, $parameters)

        {@inheritdoc}

        :param $value:
        :param $parameters:

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
