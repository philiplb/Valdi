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
 * Base validator for PHPs filter_var function.
 */
abstract class Filter implements ValidatorInterface {

    /**
     * Gets the filter to use within the validation.
     * See http://php.net/manual/de/filter.filters.validate.php .
     *
     * @return string
     * the filter to use
     */
    protected abstract function getFilter();
    /**
     * {@inheritdoc}
     */
    public function validate($value, array $parameters) {
        return filter_var($value, $this->getFilter()) !== false;
    }
}
