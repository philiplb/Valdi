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
 * Validator for strings of a max length.
 */
class MaxLength extends Comparator {

    /**
     * {@inheritdoc}
     */
    protected function compare($a, $parameters) {
        return is_numeric($parameters[0]) && strlen($a) <= $parameters[0];
    }

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->type = 'maxLength';
    }
}
