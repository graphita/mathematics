<?php

namespace Graphita\Mathematics\Tests;

use Graphita\Mathematics\Combination;
use PHPUnit\Framework\TestCase;

class CombinationTest extends TestCase
{
    public function testGetAndSetRepetitions()
    {
        $combination = new Combination();

        $this->assertFalse($combination->canRepetitions());

        $combination->setRepetitions(true);

        $this->assertTrue($combination->canRepetitions());
    }

    public function testGetAndSetItems()
    {
        $combination = new Combination();

        $this->assertIsArray($combination->getItems());
        $this->assertEmpty($combination->getItems());
        $this->assertEquals(0, $combination->countItems());

        $combination->setItems([1, 2, 3]);

        $this->assertIsArray($combination->getItems());
        $this->assertCount(3, $combination->getItems());
        $this->assertEquals(3, $combination->countItems());
    }

    public function testGetAndSetSelection()
    {
        $combination = new Combination();

        $this->assertEquals(0, $combination->getSelection());

        $combination->setSelection(2);

        $this->assertEquals(2, $combination->getSelection());
    }

    public function testGetPossibilitiesWithoutItemsAndSelection()
    {
        $combination = new Combination();

        $this->assertIsArray($combination->getPossibilities());
        $this->assertEmpty($combination->getPossibilities());
        $this->assertEquals(0, $combination->countPossibilities());

        $combination->calculate();

        $this->assertIsArray($combination->getPossibilities());
        $this->assertEmpty($combination->getPossibilities());
        $this->assertEquals(0, $combination->countPossibilities());
    }

    public function testGetPossibilitiesWithItemsAndWithoutSelection()
    {
        $combination = new Combination();
        $combination->setItems([1, 2, 3]);

        $this->assertIsArray($combination->getPossibilities());
        $this->assertEmpty($combination->getPossibilities());
        $this->assertEquals(0, $combination->countPossibilities());

        $combination->calculate();

        $this->assertIsArray($combination->getPossibilities());
        $this->assertCount(1, $combination->getPossibilities());
        $this->assertEquals(1, $combination->countPossibilities());
    }

    public function testGetPossibilitiesWithItemsAndSelection()
    {
        $combination = new Combination();
        $combination->setItems([1, 2, 3]);
        $combination->setSelection(2);
        $combination->calculate();

        $this->assertIsArray($combination->getPossibilities());
        $this->assertCount(3, $combination->getPossibilities());
        $this->assertEquals(3, $combination->countPossibilities());
    }

    public function testGetPossibilitiesWithItemsAndSelectionAndRepetitions()
    {
        $combination = new Combination();
        $combination->setItems([1, 2, 3]);
        $combination->setSelection(2);
        $combination->setRepetitions(true);
        $combination->calculate();

        $this->assertIsArray($combination->getPossibilities());
        $this->assertCount(6, $combination->getPossibilities());
        $this->assertEquals(6, $combination->countPossibilities());
    }

    public function testGetPossibilitiesWithoutSave()
    {
        $combination = new Combination();
        $combination->setItems([1, 2, 3]);
        $combination->setSelection(2);
        $combination->setRepetitions(true);
        $generator = $combination->calculateWithoutSave();

        $this->assertInstanceOf(\Generator::class, $generator);

        $count = 0;
        foreach ($generator as $item) {
            $this->assertIsArray($item);
            $count++;
        }

        $this->assertEquals($count, $combination->calculate()->countPossibilities());
        $this->assertInstanceOf(Combination::class, $generator->getReturn());
    }
}
