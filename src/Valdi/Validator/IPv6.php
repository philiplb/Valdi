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
 * Validator for floats.
 */
class IPv6 extends AbstractFilter {

    /**
     * {@inheritdoc}
     */
    protected function getFilter() {
        return \FILTER_VALIDATE_IP;
    }

    /**
     * {@inheritdoc}
     */
    protected function getFlags() {
        return \FILTER_FLAG_IPV6;
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidDetails() {
        return 'ipv6';
    }
}
