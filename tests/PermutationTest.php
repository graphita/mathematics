<?php

namespace Graphita\Mathematics\Tests;

use Graphita\Mathematics\Permutation;
use PHPUnit\Framework\TestCase;

class PermutationTest extends TestCase
{
    public function testGetAndSetRepetitions()
    {
        $permutation = new Permutation();

        $this->assertFalse($permutation->canRepetitions());

        $permutation->setRepetitions(true);

        $this->assertTrue($permutation->canRepetitions());
    }

    public function testGetAndSetItems()
    {
        $permutation = new Permutation();

        $this->assertIsArray($permutation->getItems());
        $this->assertEmpty($permutation->getItems());
        $this->assertEquals(0, $permutation->countItems());

        $permutation->setItems([1, 2, 3]);

        $this->assertIsArray($permutation->getItems());
        $this->assertCount(3, $permutation->getItems());
        $this->assertEquals(3, $permutation->countItems());
    }

    public function testGetAndSetSelection()
    {
        $permutation = new Permutation();

        $this->assertEquals(0, $permutation->getSelection());

        $permutation->setSelection(2);

        $this->assertEquals(2, $permutation->getSelection());
    }

    public function testGetPossibilitiesWithoutItemsAndSelection()
    {
        $permutation = new Permutation();

        $this->assertIsArray($permutation->getPossibilities());
        $this->assertEmpty($permutation->getPossibilities());
        $this->assertEquals(0, $permutation->countPossibilities());

        $permutation->calculate();

        $this->assertIsArray($permutation->getPossibilities());
        $this->assertEmpty($permutation->getPossibilities());
        $this->assertEquals(0, $permutation->countPossibilities());
    }

    public function testGetPossibilitiesWithItemsAndWithoutSelection()
    {
        $permutation = new Permutation();
        $permutation->setItems([1, 2, 3]);

        $this->assertIsArray($permutation->getPossibilities());
        $this->assertEmpty($permutation->getPossibilities());
        $this->assertEquals(0, $permutation->countPossibilities());

        $permutation->calculate();

        $this->assertIsArray($permutation->getPossibilities());
        $this->assertCount(1, $permutation->getPossibilities());
        $this->assertEquals(1, $permutation->countPossibilities());
    }

    public function testGetPossibilitiesWithItemsAndSelection()
    {
        $permutation = new Permutation();
        $permutation->setItems([1, 2, 3]);
        $permutation->setSelection(2);
        $permutation->calculate();

        $this->assertIsArray($permutation->getPossibilities());
        $this->assertCount(6, $permutation->getPossibilities());
        $this->assertEquals(6, $permutation->countPossibilities());
    }

    public function testGetPossibilitiesWithItemsAndSelectionAndRepetitions()
    {
        $permutation = new Permutation();
        $permutation->setItems([1, 2, 3]);
        $permutation->setSelection(2);
        $permutation->setRepetitions(true);
        $permutation->calculate();

        $this->assertIsArray($permutation->getPossibilities());
        $this->assertCount(9, $permutation->getPossibilities());
        $this->assertEquals(9, $permutation->countPossibilities());
    }

    public function testGetPossibilitiesWithoutSave()
    {
        $permutation = new Permutation();
        $permutation->setItems([1, 2, 3]);
        $permutation->setSelection(2);
        $permutation->setRepetitions(true);
        $generator = $permutation->calculateWithoutSave();

        $this->assertInstanceOf(\Generator::class, $generator);

        $count = 0;
        foreach ($generator as $item) {
            $this->assertIsArray($item);
            $count++;
        }

        $this->assertEquals($count, $permutation->calculate()->countPossibilities());
        $this->assertInstanceOf(Permutation::class, $generator->getReturn());
    }
}
