<?php

namespace Graphita\Mathematics\Tests;

use Graphita\Mathematics\Factorial;
use PHPUnit\Framework\TestCase;

class FactorialTest extends TestCase
{
    public function testWithNonIntegerNumber()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Number must be a Positive Integer to Calculate Factorial !');

        $result = (new Factorial(2.5))->calculate();
    }

    public function testWithNegativeNumber()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Number must be a Positive Integer to Calculate Factorial !');

        $result = (new Factorial(-2))->calculate();
    }

    public function testFactorialZero()
    {
        $result = (new Factorial(0))->calculate();

        $this->assertEquals(1, $result);
    }

    public function testFactorialOne()
    {
        $result = (new Factorial(1))->calculate();

        $this->assertEquals(1, $result);
    }

    public function testFactorialTwo()
    {
        $result = (new Factorial(2))->calculate();

        $this->assertEquals(2, $result);
    }

    public function testFactorialThree()
    {
        $result = (new Factorial(3))->calculate();

        $this->assertEquals(2 * 3, $result);
    }

    public function testFactorialTen()
    {
        $result = (new Factorial(10))->calculate();

        $this->assertEquals(2 * 3 * 4 * 5 * 6 * 7 * 8 * 9 * 10, $result);
    }
}
