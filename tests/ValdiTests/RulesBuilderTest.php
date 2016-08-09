<?php

/*
 * This file is part of the Valdi package.
 *
 * (c) Philip Lehmann-Böhm <philip@philiplb.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ValdiTests;

use Valdi\RulesBuilder;
use Valdi\Validator;

class RulesBuilderTest extends \PHPUnit_Framework_TestCase {

    public function testCreate() {
        $read = RulesBuilder::create();
        $expected = 'Valdi\RulesBuilder';
        $this->assertSame(get_class($read), $expected);
    }

    public function testRulesBuilding() {
        $read = RulesBuilder::create()
            ->addRule('a', 'required')
            ->addRule('b', 'inThePast')
            ->addRule('a', 'min', 42)
            ->addRule('c', 'slug')
            ->addRule('b', 'between', 5, 17)
            ->getRules()
        ;
        $expected = [
            'a' => [['required'], ['min', 42]],
            'b' => [['inThePast'], ['between', 5, 17]],
            'c' => [['slug']]
        ];
        $this->assertSame($read, $expected);
    }

    public function testCreatedRules() {
        $rules = RulesBuilder::create()
            ->addRule('a', 'required')
            ->addRule('b', 'min', 5)
            ->getRules()
        ;
        $data = ['a' => 'abc', 'b' => 6];
        $validator = new Validator();
        $read = $validator->isValid($rules, $data);
        $expected = [
            'valid' => true,
            'errors' => []
        ];
        $this->assertSame($read, $expected);
    }

}
