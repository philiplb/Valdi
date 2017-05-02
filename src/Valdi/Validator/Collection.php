<?php

/*
 * This file is part of the Valdi package.
 *
 * (c) Philip Lehmann-Böhm <philip@philiplb.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Valdi\Validator;

use Valdi\Validator;

/**
 * Validator for array values fulfilling a rule.
 */
class Collection extends AbstractArray {

    /**
     * {@inheritdoc}
     */
    protected function isValidArray($values, Validator $validator, array $rules) {
        if (!is_array($values)) {
            $this->invalidDetails = $values;
            return false;
        }

        $this->invalidDetails = [];
        foreach ($values as $key => $value) {
            $elementValidation = $validator->isValid(['value' => $rules], ['value' => $value]);
            if (!$elementValidation['valid']) {
                $this->invalidDetails[$key] = $elementValidation['errors']['value'];
            }
        }
        return count($this->invalidDetails) === 0;
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidDetails() {
        return ['collection' => $this->invalidDetails];
    }
}
