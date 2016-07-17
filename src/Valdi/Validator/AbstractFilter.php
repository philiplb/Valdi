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
abstract class AbstractFilter implements ValidatorInterface {

    /**
     * Gets the filter to use within the validation.
     * See http://php.net/manual/de/filter.filters.validate.php .
     *
     * @return string
     * the filter to use
     */
    abstract protected function getFilter();

    /**
     * Gets the flags to use within the validation.
     * See http://php.net/manual/de/filter.filters.validate.php .
     *
     * @return string|null
     * the flags to use
     */
    protected function getFlags() {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid($value, array $parameters) {
        return in_array($value, array('', null), true) ||
            filter_var($value, $this->getFilter(), $this->getFlags()) !== false;
    }
}
