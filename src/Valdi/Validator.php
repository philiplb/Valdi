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

use Valdi\Validator\Required;

class Validator {

    protected $availableValidators;

    protected function setupValidators() {
        $this->availableValidators = array(
            'required' => new Required()
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
                throw new ValidatorException($name.' not found as available validator.');
            }
            $result[$name] = $this->availableValidators[$name]->validate($value, $parameters);
        }
        return $result;
    }

    protected function gatherFailedFields($fields) {
        $failedFields = array();
        foreach ($fields as $field => $result) {
            foreach ($result as $subResult) {
                if (!$subResult) {
                    $failedFields[] = $field;
                    break;
                }
            }
        }
        return $failedFields;
    }

    public function __construct() {
        $this->setupValidators();
    }

    public function addValidator(ValidatorInterface $validator) {
        $this->validators[$validator->getType()] = $validator;
    }

    public function validate(array $validators, array $data) {
        $fields = array();
        foreach ($validators as $field => $fieldValidators) {
            if (!array_key_exists($field, $data)) {
                continue;
            }
            $value = isset($data[$field]) ? $data[$field] : null;
            $fields[$field] = $this->validateField($fieldValidators, $value);
        }
        $failed = $this->gatherFailedFields($fields);
        return array(
            'valid' => count($failed) === 0,
            'fields' => $fields,
            'failed' => $failed
        );
    }

}
