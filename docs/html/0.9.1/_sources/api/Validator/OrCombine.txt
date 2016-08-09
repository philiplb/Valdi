---------------------------
Validator\\OrCombine
---------------------------

.. php:namespace: Valdi\\Validator

.. php:class:: OrCombine

    Validator to combine other validators with a logical "or".

    .. php:attr:: invalid

        protected

        Holds the invalid validators.

    .. php:method:: checkParameters($parameters)

        Checks whether the given parameters fullfil:
        - At least three given
        - The first one is a Validator or a subclass of it

        :type $parameters: array
        :param $parameters: the validation parameters

    .. php:method:: isValid($value, $parameters)

        {@inheritdoc}

        :param $value:
        :param $parameters:

    .. php:method:: getInvalidDetails()

        {@inheritdoc}
