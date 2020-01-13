-----------------------------------------------
Valdi\\Validator\\AbstractParametrizedValidator
-----------------------------------------------

.. toctree::

   AbstractComparator
   AbstractDateTimeComparator

.. php:namespace:: Valdi\Validator

.. php:class:: AbstractParametrizedValidator

      Validator for parametrized validators.

   .. php:method:: AbstractParametrizedValidator::validateParameterCount()

      Throws an exception if the parameters don't fulfill the expected
      parameter count.

      :param string $name: the name of the validator
      :param integer $parameterAmount: the amount of expected parameters
      :param string[] $parameters: the parameters

      :throws: ValidationException $ thrown if the amount of parameters isn't the expected one