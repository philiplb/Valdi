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

    protected $availableValidators;

    protected function setupValidators() {

        $validators = array(
            'boolean' => 'Boolean',
            'dateTime' => 'DateTime',
            'email' => 'Email',
            'floating' => 'Floating',
            'inSet' => 'InSet',
            'integer' => 'Integer',
            'ip' => 'IP',
            'ipv4' => 'IPv4',
            'ipv6' => 'IPv6',
            'max' => 'Max',
            'min' => 'Min',
            'regexp' => 'Regexp',
            'required' => 'Required',
            'url' => 'Url'
        );

        $this->availableValidators = array();
        foreach ($validators as $name => $type) {
            $class = '\\Valdi\\Validator\\' . $type;
            $this->availableValidators[$name] = new $class();
        }
    }

    protected function validateRule($name, $parameters, $value) {
        if (!array_key_exists($name, $this->availableValidators)) {
            throw new ValidatorException('"' . $name . '" not found as available validator.');
        }
        return $this->availableValidators[$name]->validate($value, $parameters);
    }

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

    public function __construct() {
        $this->setupValidators();
    }

    public function addValidator($name, ValidatorInterface $validator) {
        $this->availableValidators[$name] = $validator;
    }

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
