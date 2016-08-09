-------------------
Validator\\Floating
-------------------

.. php:namespace: Valdi\\Validator

.. php:class:: Floating

    Validator for floats. It's not named "Float" as it is a reserved class name
    in PHP7.

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
