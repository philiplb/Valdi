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
 * The interface each validator has to implement.
 */
interface ValidatorInterface {

    /**
     * Validates the given value.
     *
     * @param mixed $value
     * the value to validate
     *
     * @param array $parameters
     * the other parameters the validator might need
     *
     * @return boolean
     * true if the value is valid, false else
     */
    public function validate($value, array $parameters);

}
