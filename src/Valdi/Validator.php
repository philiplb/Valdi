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
use Valdi\Validator\Boolean;
use Valdi\Validator\DateTime;
use Valdi\Validator\Email;
use Valdi\Validator\Floating;
use Valdi\Validator\InSet;
use Valdi\Validator\Integer;
use Valdi\Validator\IP;
use Valdi\Validator\IPv4;
use Valdi\Validator\IPv6;
use Valdi\Validator\Max;
use Valdi\Validator\Min;
use Valdi\Validator\Regexp;
use Valdi\Validator\Required;
use Valdi\Validator\Url;

/**
 * The Validator is used to chain Validators together and validate a set of data
 * with it.
 */
class Validator {

    protected $availableValidators;

    protected function setupValidators() {
        $this->availableValidators = array(
            'boolean' => new Boolean(),
            'dateTime' => new DateTime(),
            'email' => new Email(),
            'floating' => new Floating(),
            'inSet' => new InSet(),
            'integer' => new Integer(),
            'ip' => new IP(),
            'ipv4' => new IPv4(),
            'ipv6' => new IPv6(),
            'max' => new Max(),
            'min' => new Min(),
            'regexp' => new Regexp(),
            'required' => new Required(),
            'url' => new Url()
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
