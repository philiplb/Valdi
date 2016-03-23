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

/**
 * To ease the building of the rules array.
 */
class RulesBuilder {

    /**
     * Holds the rules under construction.
     */
    protected $rules;

    /**
     * Creates and returns an instance.
     *
     * @return RulesBuilder
     * the new instance
     */
    public static function create() {
        return new RulesBuilder();
    }

    /**
     * Constructor.
     */
    public function __construct() {
        $this->rules = array();
    }

    /**
     * Adds a rule to the set. This function takes a variable amount
     * of parameters in order to cover the rule parameters. Example for a rule
     * without parameter:
     * addRule('myField', 'required')
     * Example for a rule with two parameters:
     * addRule('myField', 'between', 3, 7)
     *
     * @param string $field
     * the field for the rule
     * @param string $rule
     * the rule to add
     *
     * @return RulesBuilder
     * the instance of the called RulesBuilder in order to chain the rules
     * creation
     */
    public function addRule($field, $rule) {
        if (!isset($this->rules[$field])) {
            $this->rules[$field] = array();
        }
        $newRule = array($rule);
        $numArgs = func_num_args();
        for ($i = 2; $i < $numArgs; ++$i) {
            $newRule[] = func_get_arg($i);
        }
        $this->rules[$field][] = $newRule;
        return $this;
    }

    /**
     * Gets the created rules.
     *
     * @return array
     * the created rules
     */
    public function getRules() {
        return $this->rules;
    }

}
