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

use Valdi\ValidationException;
use Valdi\Validator;

/**
 * Validator for nested data sets.
 */
class Nested extends AbstractArray {

    /**
     * {@inheritdoc}
     */
    protected function isValidArray($values, Validator $validator, array $rules) {
        if (!is_array($values)) {
            $this->invalidDetails = $values;
            return false;
        }

        $elementValidation = $validator->isValid($rules, $values);
        if (!$elementValidation['valid']) {
            $this->invalidDetails = $elementValidation['errors'];
            return false;
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidDetails() {
        return ['nested' => $this->invalidDetails];
    }
}
