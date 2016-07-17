-------------
Validator\\IP
-------------

.. php:namespace: Valdi\\Validator

.. php:class:: IP

    Validator for IPs.

    .. php:method:: getFilter()

        {@inheritdoc}

    .. php:method:: getInvalidDetails()

        {@inheritdoc}

    .. php:method:: getFlags()

        Gets the flags to use within the validation.
        See http://php.net/manual/de/filter.filters.validate.php .

        :returns: string|null the flags to use

    .. php:method:: isValid($value, $parameters)

        {@inheritdoc}

        :param $value:
        :param $parameters:
