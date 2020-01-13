------------------------------------
Valdi\\Validator\\ValidatorInterface
------------------------------------

.. php:namespace:: Valdi\Validator

.. php:interface:: ValidatorInterface

      The interface each validator has to implement.

   .. php:method:: ValidatorInterface::isValid()

      Validates the given value.

      :param mixed $value: the value to validate
      :param array $parameters: the other parameters the validator might need

      :returns: boolean $ true if the value is valid, false else

   .. php:method:: ValidatorInterface::getInvalidDetails()

      Gets the details if the validation failed.

      :returns: mixed $ the details
