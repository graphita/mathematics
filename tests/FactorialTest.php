<?php

namespace Graphita\Mathematics\Tests;

use Graphita\Mathematics\Factorial;
use PHPUnit\Framework\TestCase;

class FactorialTest extends TestCase
{
    public function testWithNegativeNumber()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Number must be a Positive Integer to Calculate Factorial !');

        $result = Factorial::instance(-2)->calculate()->getResult();
    }

    public function testFactorialZero()
    {
        $result = Factorial::instance(0)->calculate()->getResult();

        $this->assertEquals(1, $result);
    }

    public function testFactorialOne()
    {
        $result = Factorial::instance(1)->calculate()->getResult();

        $this->assertEquals(1, $result);
    }

    public function testFactorialTwo()
    {
        $result = Factorial::instance(2)->calculate()->getResult();

        $this->assertEquals(2, $result);
    }

    public function testFactorialThree()
    {
        $result = Factorial::instance(3)->calculate()->getResult();

        $this->assertEquals(2 * 3, $result);
    }

    public function testFactorialTen()
    {
        $result = Factorial::instance(10)->calculate()->getResult();

        $this->assertEquals(2 * 3 * 4 * 5 * 6 * 7 * 8 * 9 * 10, $result);
    }

    public function testSetNumber()
    {
        $factorial = new Factorial();
        $factorial->setNumber(4);
        $factorial->calculate();
        $result = $factorial->getResult();

        $this->assertEquals(2 * 3 * 4, $result);
    }

    public function testGetResultBeforeCalculate()
    {
        $result = Factorial::instance(3)->getResult();

        $this->assertNull($result);
    }
}
