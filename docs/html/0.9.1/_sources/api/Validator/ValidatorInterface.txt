-----------------------------
Validator\\ValidatorInterface
-----------------------------

.. php:namespace: Valdi\\Validator

.. php:interface:: ValidatorInterface

    The interface each validator has to implement.

    .. php:method:: isValid($value, $parameters)

        Validates the given value.

        :type $value: mixed
        :param $value: the value to validate
        :type $parameters: array
        :param $parameters: the other parameters the validator might need
        :returns: boolean true if the value is valid, false else

    .. php:method:: getInvalidDetails()

        Gets the details if the validation failed.

        :returns: mixed the details
