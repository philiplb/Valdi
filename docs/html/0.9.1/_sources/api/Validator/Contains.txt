-------------------
Validator\\Contains
-------------------

.. php:namespace: Valdi\\Validator

.. php:class:: Contains

    Validator for strings containing a substring.

    .. php:method:: validateParameterCount($parameterAmount)

        Throws an exception if the parameters don't fullfill the expected
        parameter count.

        :type $parameterAmount: integer
        :param $parameterAmount: the amount of expected parameters

    .. php:method:: adjustCaseInsensitive($value, $parameters)

        Adjusts value and parameters to be case insensitive if the second
        parameter says so or is not given.

        :type $value: mixed
        :param $value: the value to validate
        :type $parameters: array
        :param $parameters: the other parameters the validator need

    .. php:method:: isValid($value, $parameters)

        {@inheritdoc}

        :param $value:
        :param $parameters:

    .. php:method:: getInvalidDetails()

        {@inheritdoc}
