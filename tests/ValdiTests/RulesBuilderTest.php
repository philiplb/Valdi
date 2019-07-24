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
        $read = RulesBuilder::new();
        $expected = 'Valdi\RulesBuilder';
        $this->assertSame(get_class($read), $expected);
    }

    public function testRulesBuilding() {
        $read = RulesBuilder::new()
            ->addFieldRule('a', 'required')
            ->addFieldRule('b', 'inThePast')
            ->addFieldRule('a', 'min', 42)
            ->addFieldRule('c', 'slug')
            ->addFieldRule('b', 'between', 5, 17)
            ->build()
        ;
        $expected = [
            'a' => [['required'], ['min', 42]],
            'b' => [['inThePast'], ['between', 5, 17]],
            'c' => [['slug']]
        ];
        $this->assertSame($read, $expected);
    }

    public function testCreatedRules() {
        $rules = RulesBuilder::new()
            ->addFieldRule('a', 'required')
            ->addFieldRule('b', 'min', 5)
            ->build()
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

    public function testCreatedCollectionRules() {
        $validator = new Validator();
        $builder = RulesBuilder::new();
        $elementRules = $builder->addRule('min', 5)->build();
        $rules = $builder
            ->addFieldRule('a', 'collection', $validator, $elementRules)
            ->build()
        ;
        $data = ['a' => [6, 7, 8]];
        $read = $validator->isValid($rules, $data);
        $expected = [
            'valid' => true,
            'errors' => []
        ];
        $this->assertSame($read, $expected);
        $data = ['a' => [6, 7, 1]];
        $read = $validator->isValid($rules, $data);
        $expected = [
            'valid' => false,
            'errors' => ['a' => [['collection' => [2 => ['min']]]]]
        ];
        $this->assertSame($read, $expected);
    }

}
