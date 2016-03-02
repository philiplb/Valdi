<?php

/*
 * This file is part of the Valdi package.
 *
 * (c) Philip Lehmann-Böhm <philip@philiplb.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Valdi;

use Valdi\Validator\ValidatorInterface;

/**
 * The Validator is used to chain Validators together and validate a set of data
 * with it.
 */
class Validator {

    /**
     * Holds the available validators.
     */
    protected $availableValidators;

    /**
     * Creates instances of the available validators.
     *
     * @param array $validators
     * the validators to load, key = name, value = classname within the
     * namespace "\Valdi\Validator"
     */
    protected function createValidators(array $validators) {
        $this->availableValidators = array();
        foreach ($validators as $name => $type) {
            $class = '\\Valdi\\Validator\\' . $type;
            $this->availableValidators[$name] = new $class();
        }
    }

    /**
     * Validates a single rule.
     *
     * @param string $validator
     * the validator to use
     * @param string[] $parameters
     * the validation parameters, depending on the validator
     * @param string $value
     * the value to validate
     *
     * @return boolean
     * true if the value is valid
     */
    protected function validateRule($validator, $parameters, $value) {
        if (!array_key_exists($validator, $this->availableValidators)) {
            throw new ValidatorException('"' . $validator . '" not found as available validator.');
        }
        return $this->availableValidators[$validator]->validate($value, $parameters);
    }

    /**
     * Validates a value via the given rules.
     *
     * @param array $fieldRules
     * the validation rules
     * @param string $value
     * the value to validate
     *
     * @return string[]
     * the fields where the validation failed
     */
    protected function validateField($fieldRules, $value) {
        $result = array();
        foreach ($fieldRules as $rule) {
            $name = $rule;
            $parameters = array();
            if (is_array($rule)) {
                $parameters = $rule;
                $name = array_shift($parameters);
            }
            $valid = $this->validateRule($name, $parameters, $value);
            if (!$valid) {
                $result[] = $name;
            }
        }
        return $result;
    }

    /**
     * Constructor.
     */
    public function __construct() {
        $validators = array(
            'alphabetical' => 'Alphabetical', 'alphaNumerical' => 'AlphaNumerical',
            'between' => 'Between', 'boolean' => 'Boolean',
            'dateTime' => 'DateTime', 'email' => 'Email',
            'floating' => 'Floating', 'inSet' => 'InSet',
            'integer' => 'Integer', 'ip' => 'IP',
            'ipv4' => 'IPv4', 'ipv6' => 'IPv6',
            'lengthBetween' => 'LengthBetween', 'max' => 'Max',
            'maxLength' => 'MaxLength', 'min' => 'Min',
            'minLength' => 'MinLength', 'regexp' => 'Regexp',
            'required' => 'Required', 'slug' => 'Slug',
            'url' => 'Url', 'value' => 'Value'
        );
        $this->createValidators($validators);
    }

    /**
     * Adds additional validator. It can override existing validators as well.
     *
     * @param string $name
     * the name of the new validator.
     * @param ValidatorInterface $validator
     * the validator to add
     */
    public function addValidator($name, ValidatorInterface $validator) {
        $this->availableValidators[$name] = $validator;
    }

    /**
     * Performs the actual validation.
     *
     * @param array $rules
     * the validation rules: an array with a field name as key and an array
     * of rules to use for this field; each rule is either a string with the
     * validator name or an array with the validator name as first element and
     * parameters as following elements; example:
     * array('a' => array('required'), 'b' => array(array('min', 1)))
     * @param array $data
     * the data to validate as a map
     *
     * @return array
     * the validation result having the keys "valid" (true or false) and
     * the key "errors" containing all failed fields as keys with arrays of the
     * failed validator names; example where the field "b" from the above sample
     * failed due to the min validator:
     * array('valid' => false, errors => array('b' => array('min')))
     */
    public function validate(array $rules, array $data) {
        $errors = array();
        foreach ($rules as $field => $fieldRules) {
            $value = isset($data[$field]) ? $data[$field] : null;
            $fieldErrors = $this->validateField($fieldRules, $value);
            if (!empty($fieldErrors)) {
                $errors[$field] = $fieldErrors;
            }
        }
        return array(
            'valid' => count($errors) === 0,
            'errors' => $errors
        );
    }

}
