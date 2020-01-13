-------------------------------
Valdi\\Validator\\AbstractArray
-------------------------------

.. toctree::

   Collection
   Nested

.. php:namespace:: Valdi\Validator

.. php:class:: AbstractArray

      Validator for array data, be it maps or lists.

   .. php:attr:: $invalidDetails

      Holds the invalid values.

   .. php:method:: AbstractArray::isValidArray()

      Checks whether the given values are of the expected array data.

      :param mixed $values: the potential array values to check
      :param Validator $validator: the validator to check with
      :param array $rules: the rules which the array data must fulfill

      :returns: boolean $ true if all the $values are valid, else false with the invalid details set

   .. php:method:: AbstractArray::isValid()

      {@inheritdoc}
