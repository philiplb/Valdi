--------------------------
Valdi\\Validator\\Contains
--------------------------

.. php:namespace:: Valdi\Validator

.. php:class:: Contains

      Validator for strings containing a substring.

   .. php:method:: Contains::validateParameterCount()

      Throws an exception if the parameters don't fulfill the expected
      parameter count.

      :param integer $parameterAmount: the amount of expected parameters

      :throws: ValidationException $ thrown if less than one parameter is given

   .. php:method:: Contains::adjustCaseInsensitive()

      Adjusts value and parameters to be case insensitive if the second
      parameter says so or is not given.

      :param mixed $value: the value to validate
      :param array $parameters: - the other parameters the validator need

   .. php:method:: Contains::isValid()

      {@inheritdoc}

   .. php:method:: Contains::getInvalidDetails()

      {@inheritdoc}
