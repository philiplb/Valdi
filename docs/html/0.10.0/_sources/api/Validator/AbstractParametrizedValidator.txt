----------------------------------------
Validator\\AbstractParametrizedValidator
----------------------------------------

.. toctree::

   AbstractComparator
   AbstractDateTimeComparator

.. php:namespace: Valdi\\Validator

.. php:class:: AbstractParametrizedValidator

    Validator for parametrized validators.

    .. php:method:: validateParameterCount($name, $parameterAmount, $parameters)

        Throws an exception if the parameters don't fullfill the expected
        parameter count.

        :type $name: string
        :param $name: the name of the validator
        :type $parameterAmount: integer
        :param $parameterAmount: the amount of expected parameters
        :type $parameters: string[]
        :param $parameters: the parameters

    .. php:method:: isValid($value, $parameters)

        Validates the given value.

        :type $value: mixed
        :param $value: the value to validate
        :type $parameters: array
        :param $parameters: the other parameters the validator might need
        :returns: boolean true if the value is valid, false else
