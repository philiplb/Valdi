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
use Valdi\Validator\Email;
use Valdi\Validator\Floating;
use Valdi\Validator\Integer;
use Valdi\Validator\IP;
use Valdi\Validator\IPv4;
use Valdi\Validator\IPv6;
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
            'email' => new Email(),
            'floating' => new Floating(),
            'integer' => new Integer(),
            'ip' => new IP(),
            'ipv4' => new IPv4(),
            'ipv6' => new IPv6(),
            'regexp' => new Regexp(),
            'required' => new Required(),
            'url' => new Url()
        );
    }

    protected function validateField($validators, $value) {
        $result = array();
        foreach ($validators as $validator) {
            $name = $validator;
            $parameters = array();
            if (is_array($validator)) {
                $parameters = $validator;
                $name = array_shift($parameters);
            }
            if (!array_key_exists($name, $this->availableValidators)) {
                throw new ValidatorException('"'.$name . '" not found as available validator.');
            }
            $valid = $this->availableValidators[$name]->validate($value, $parameters);
            if (!$valid) {
                $result[$name] = false;
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

    public function validate(array $validators, array $data) {
        $errors = array();
        foreach ($validators as $field => $fieldValidators) {
            $value = isset($data[$field]) ? $data[$field] : null;
            $fieldErrors = $this->validateField($fieldValidators, $value);
            if ($fieldErrors) {
                $errors[$field] = $fieldErrors;
            }
        }
        return array(
            'valid' => count($errors) === 0,
            'errors' => $errors
        );
    }

}
