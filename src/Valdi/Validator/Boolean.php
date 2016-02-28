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

/**
 * Validator for booleans.
 */
class Boolean extends Filter {

    /**
     * {@inheritdoc}
     */
    protected function getFilter() {
        return \FILTER_VALIDATE_BOOLEAN;
    }
}
