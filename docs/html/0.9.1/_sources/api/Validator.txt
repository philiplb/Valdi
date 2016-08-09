---------
Validator
---------

.. php:namespace: Valdi

.. php:class:: Validator

    The Validator is used to chain Validators together and validate a set of data
    with it.

    .. php:attr:: availableValidators

        protected

        Holds the available validators.

    .. php:method:: createValidators($validators)

        Creates instances of the available validators.

        :type $validators: array
        :param $validators: the validators to load, key = name, value = classname within the namespace "\Valdi\Validator"

    .. php:method:: isValidRule($validator, $parameters, $value)

        Validates a single rule.

        :type $validator: string
        :param $validator: the validator to use
        :type $parameters: string[]
        :param $parameters: the validation parameters, depending on the validator
        :type $value: string
        :param $value: the value to validate
        :returns: boolean true if the value is valid

    .. php:method:: __construct()

        Constructor.

    .. php:method:: addValidator($name, ValidatorInterface $validator)

        Adds additional validator. It can override existing validators as well.

        :type $name: string
        :param $name: the name of the new validator.
        :type $validator: ValidatorInterface
        :param $validator: the validator to add

    .. php:method:: isValidValue($rules, $value)

        Validates a value via the given rules.

        :type $rules: array
        :param $rules: the validation rules
        :type $value: string
        :param $value: the value to validate
        :returns: string[] the fields where the validation failed

    .. php:method:: isValid($rules, $data)

        Performs the actual validation.

        :type $rules: array
        :param $rules: the validation rules: an array with a field name as key and an array of rules to use for this field; each rule is an array with the validator name as first element and parameters as following elements; example: array('a' => array(array('required')), 'b' => array(array('min', 1)))
        :type $data: array
        :param $data: the data to validate as a map
        :returns: array<string,boolean|array> the validation result having the keys "valid" (true or false) and the key "errors" containing all failed fields as keys with arrays of the failed validator names; example where the field "b" from the above sample failed due to the min validator: array('valid' => false, errors => array('b' => array('min'))) the "or" validator doesn't return a single string on validation error; instead, it returns an array listing all failed validators of it: array('or' => array('url', 'email')
