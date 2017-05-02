------------------------
Valdi\\Validator\\Nested
------------------------

.. php:namespace: Valdi\\Validator

.. php:class:: Nested

    Validator for nested data sets.

    .. php:attr:: invalidDetails

        protected

        Holds the invalid values.

    .. php:method:: isValidNested($value, Validator $validator, $rules)

        Checks whether the given values are of the expected nested data.

        :type $value: mixed
        :param $value: the potential nested values to check
        :type $validator: Validator
        :param $validator: the validator to check with
        :type $rules: array
        :param $rules: the rules which the nested data must fulfill
        :returns: boolean true if all the $values are a valid array, else false with the invalid details set

    .. php:method:: isValid($value, $parameters)

        {@inheritdoc}

        :param $value:
        :param $parameters:

    .. php:method:: getInvalidDetails()

        {@inheritdoc}
