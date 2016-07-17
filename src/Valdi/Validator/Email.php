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
 * Validator for e-mail addresses.
 */
class Email extends AbstractFilter {

    /**
     * {@inheritdoc}
     */
    public function getFilter() {
        return \FILTER_VALIDATE_EMAIL;
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidDetails() {
        return 'email';
    }
}
