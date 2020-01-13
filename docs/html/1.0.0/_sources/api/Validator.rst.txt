----------------
Valdi\\Validator
----------------

.. php:namespace:: Valdi

.. php:class:: Validator

      The Validator is used to chain Validators together and validate a set of data
      with it.

   .. php:attr:: $availableValidators

      Holds the available validators.

   .. php:method:: Validator::createValidators()

      Creates instances of the available validators.

      :param array $validators: the validators to load, key = name, value = classname within the namespace "\\Valdi\\Validator"

   .. php:method:: Validator::isValidRule()

      Validates a single rule.

      :param string $validator: the validator to use
      :param string[] $parameters: the validation parameters, depending on the validator
      :param null|string $value: the value to validate

      :returns: boolean $ true if the value is valid

      :throws: ValidatorException $ thrown if the validator is not available

   .. php:method:: Validator::__construct()

      Constructor.

   .. php:method:: Validator::addValidator()

      Adds additional validator. It can override existing validators as well.

      :param string $name: the name of the new validator.
      :param ValidatorInterface $validator: the validator to add

   .. php:method:: Validator::isValidValue()

      Validates a value via the given rules.

      :param array $rules: the validation rules
      :param null|string $value: the value to validate

      :returns: string[] $ the fields where the validation failed

      :throws: ValidatorException $ thrown if a validator is not available

   .. php:method:: Validator::isValid()

      Performs the actual validation.

      :param array $rules: the validation rules: an array with a field name as key and an array of rules to use for this field; each rule is an array with the validator name as first element and parameters as following elements; example: array('a' => array(array('required')), 'b' => array(array('min', 1)))
      :param array $data: the data to validate as a map

      :returns: array<string,boolean|array> $ the validation result having the keys "valid" (true or false) and the key "errors" containing all failed fields as keys with arrays of the failed validator names; example where the field "b" from the above sample failed due to the min validator: array('valid' => false, errors => array('b' => array('min'))) the "or" validator doesn't return a single string on validation error; instead, it returns an array listing all failed validators of it: array('or' => array('url', 'email')

      :throws: ValidatorException $ thrown if a validator is not available
