-------------------------
Validator\\BeforeDateTime
-------------------------

.. php:namespace: Valdi\\Validator

.. php:class:: BeforeDateTime

    Validator for a date time being before the given date time.
    For the format, see:
    http://php.net/manual/en/datetime.createfromformat.php

    .. php:attr:: type

        protected

        Holds the type of the validator.

    .. php:attr:: amountOfParameters

        protected

        Holds the amount of parameters.

    .. php:attr:: dateTimeParameters

        protected

        Holds whether to parse the parameters as \DateTimes so the child class
        can decide.

    .. php:method:: isValidComparison(DateTime $date, $datetimes, $parameters)

        {@inheritdoc}

        :type $date: DateTime
        :param $date:
        :param $datetimes:
        :param $parameters:

    .. php:method:: getDateTimeFormat($parameters)

        Gets a date time format from the parameters if given or a default one.

        :type $parameters: string[]
        :param $parameters: the parameters
        :returns: string the date time format

    .. php:method:: getDateTimes($parameters, $format)

        Interprets the given parameters as date times and returns them.

        :type $parameters: array
        :param $parameters: the paramters
        :type $format: string
        :param $format: the date time format
        :returns: \DateTime[] the date times

    .. php:method:: isValid($value, $parameters)

        {@inheritdoc}

        :param $value:
        :param $parameters:

    .. php:method:: getInvalidDetails()

        {@inheritdoc}

    .. php:method:: validateParameterCount($name, $parameterAmount, $parameters)

        Throws an exception if the parameters don't fullfill the expected
        parameter count.

        :type $name: string
        :param $name: the name of the validator
        :type $parameterAmount: integer
        :param $parameterAmount: the amount of expected parameters
        :type $parameters: string[]
        :param $parameters: the parameters
