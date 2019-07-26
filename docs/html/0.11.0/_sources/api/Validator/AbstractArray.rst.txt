-------------------------------
Valdi\\Validator\\AbstractArray
-------------------------------

.. toctree::

   Collection
   Nested

.. php:namespace: Valdi\\Validator

.. php:class:: AbstractArray

    Validator for array data, be it maps or lists.

    .. php:attr:: invalidDetails

        protected

        Holds the invalid values.

    .. php:method:: isValidArray($values, Validator $validator, $rules)

        Checks whether the given values are of the expected array data.

        :type $values: mixed
        :param $values: the potential array values to check
        :type $validator: Validator
        :param $validator: the validator to check with
        :type $rules: array
        :param $rules: the rules which the array data must fulfill
        :returns: boolean true if all the $values are valid, else false with the invalid details set

    .. php:method:: isValid($value, $parameters)

        {@inheritdoc}

        :param $value:
        :param $parameters:

    .. php:method:: getInvalidDetails()

        Gets the details if the validation failed.

        :returns: mixed the details
