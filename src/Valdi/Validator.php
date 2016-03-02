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
        $this->availableValidators = array(
            'boolean' => new \Valdi\Validator\Boolean(),
            'dateTime' => new \Valdi\Validator\DateTime(),
            'email' => new \Valdi\Validator\Email(),
            'floating' => new \Valdi\Validator\Floating(),
            'inSet' => new \Valdi\Validator\InSet(),
            'integer' => new \Valdi\Validator\Integer(),
            'ip' => new \Valdi\Validator\IP(),
            'ipv4' => new \Valdi\Validator\IPv4(),
            'ipv6' => new \Valdi\Validator\IPv6(),
            'max' => new \Valdi\Validator\Max(),
            'min' => new \Valdi\Validator\Min(),
            'regexp' => new \Valdi\Validator\Regexp(),
            'required' => new \Valdi\Validator\Required(),
            'url' => new \Valdi\Validator\Url()
        );
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
