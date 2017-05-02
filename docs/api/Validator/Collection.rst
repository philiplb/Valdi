----------------------------
Valdi\\Validator\\Collection
----------------------------

.. php:namespace: Valdi\\Validator

.. php:class:: Collection

    Validator for array values fulfilling a rule.

    .. php:attr:: invalidDetails

        protected

        Holds the invalid array values.

    .. php:method:: checkParameters($parameters)

        Checks whether the given parameters fulfil:
        - At two given
        - The first one is a Validator or a subclass of it

        :type $parameters: array
        :param $parameters: the validation parameters

    .. php:method:: isValidCollection($values, Validator $validator, $rule)

        Checks whether the given values are of the expected array.

        :type $values: mixed
        :param $values: the potential array values to check
        :type $validator: Validator
        :param $validator: the validator to check with
        :type $rule: array
        :param $rule: the rule which each element must fulfill
        :returns: boolean true if all the $values are a valid array, else false with the invalid details set

    .. php:method:: isValid($value, $parameters)

        {@inheritdoc}

        :param $value:
        :param $parameters:

    .. php:method:: getInvalidDetails()

        {@inheritdoc}
