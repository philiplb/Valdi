---------------------------
Valdi\\Validator\\OrCombine
---------------------------

.. php:namespace:: Valdi\Validator

.. php:class:: OrCombine

      Validator to combine other validators with a logical "or".

   .. php:attr:: $invalidDetails

      Holds the invalid validators.

   .. php:method:: OrCombine::checkParameters()

      Checks whether the given parameters fulfil:
      - At least three given
      - The first one is a Validator or a subclass of it

      :param array $parameters: the validation parameters

      :throws: ValidationException $ thrown if the amount of parameters is less than three or the first parameter is not a Validator

   .. php:method:: OrCombine::isValid()

      {@inheritdoc}

   .. php:method:: OrCombine::getInvalidDetails()

      {@inheritdoc}
