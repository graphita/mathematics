<?php

namespace Graphita\Mathematics\Tests;

use Graphita\Mathematics\BaseConvert;
use PHPUnit\Framework\TestCase;

class BaseConvertTest extends TestCase
{
    public function testDefaultBaseAndCharacters()
    {
        $converter = BaseConvert::convert(20);

        $this->assertEquals(10, $converter->getSourceBase());
        $this->assertEquals(10, $converter->getDestinationBase());
        $this->assertEmpty($converter->getSourceCharactersMap());
        $this->assertEmpty($converter->getDestinationCharactersMap());
    }

    public function testSetAndGetSourceNumber()
    {
        $converter = BaseConvert::convert(20);

        $this->assertInstanceOf(BaseConvert::class, $converter);
        $this->assertEquals(20, $converter->getSourceNumber());
    }

    public function testSetAndGetSourceNumberAndSourceBase()
    {
        $converter = BaseConvert::convert(20, 16);

        $this->assertInstanceOf(BaseConvert::class, $converter);
        $this->assertEquals(20, $converter->getSourceNumber());
        $this->assertEquals(16, $converter->getSourceBase());
    }

    public function testSetAndGetSourceNumberAndSourceBaseAndSourceCharactersMap()
    {
        $converter = BaseConvert::convert(20, 16, '0123456789abcdef');

        $this->assertInstanceOf(BaseConvert::class, $converter);
        $this->assertEquals(20, $converter->getSourceNumber());
        $this->assertEquals(16, $converter->getSourceBase());
        $this->assertIsArray($converter->getSourceCharactersMap());
        $this->assertCount(16, $converter->getSourceCharactersMap());
        $this->assertEquals('0123456789abcdef', implode('', $converter->getSourceCharactersMap()));
    }

    public function testSetAndGetSourceNumberWithFrom()
    {
        $converter = new BaseConvert();
        $converter->from(20);
        $this->assertEquals(20, $converter->getSourceNumber());
    }

    public function testSetAndGetSourceNumberAndSourceBaseWithFrom()
    {
        $converter = new BaseConvert();
        $converter->from(20, 16);
        $this->assertEquals(20, $converter->getSourceNumber());
        $this->assertEquals(16, $converter->getSourceBase());
    }

    public function testSetAndGetSourceNumberAndSourceBaseAndSourceCharactersMapWithFrom()
    {
        $converter = new BaseConvert();
        $converter->from(20, 16, '0123456789abcdef');
        $this->assertEquals(20, $converter->getSourceNumber());
        $this->assertEquals(16, $converter->getSourceBase());
        $this->assertIsArray($converter->getSourceCharactersMap());
        $this->assertCount(16, $converter->getSourceCharactersMap());
        $this->assertEquals('0123456789abcdef', implode('', $converter->getSourceCharactersMap()));
    }

    public function testSetAndGetSourceCharactersMap()
    {
        $converter = new BaseConvert();
        $converter->fromCharacters('0123456789abcdef');

        $this->assertIsArray($converter->getSourceCharactersMap());
        $this->assertCount(16, $converter->getSourceCharactersMap());
        $this->assertEquals('0123456789abcdef', implode('', $converter->getSourceCharactersMap()));
    }

    public function testSetAndGetDestinationBase()
    {
        $converter = BaseConvert::convert(20);
        $converter->to(16);

        $this->assertEquals(16, $converter->getDestinationBase());
    }

    public function testSetAndGetDestinationBaseAndDestinationCharactersMap()
    {
        $converter = BaseConvert::convert(20);
        $converter->to(16, '0123456789abcdef');

        $this->assertEquals(16, $converter->getDestinationBase());
        $this->assertIsArray($converter->getDestinationCharactersMap());
        $this->assertCount(16, $converter->getDestinationCharactersMap());
        $this->assertEquals('0123456789abcdef', implode('', $converter->getDestinationCharactersMap()));
    }

    public function testSetAndGetDestinationCharactersMap()
    {
        $converter = new BaseConvert();
        $converter->toCharacters('0123456789abcdef');

        $this->assertIsArray($converter->getDestinationCharactersMap());
        $this->assertCount(16, $converter->getDestinationCharactersMap());
        $this->assertEquals('0123456789abcdef', implode('', $converter->getDestinationCharactersMap()));
    }

    public function testGetEmptyResult()
    {
        $converter = new BaseConvert;

        $this->assertIsArray($converter->getResultArray());
        $this->assertEmpty($converter->getResultArray());
        $this->assertEmpty($converter->getResult());
    }

    public function testCalculateAndGetResultWithoutCharacters()
    {
        $converter = BaseConvert::convert(20)->to(4)->calculate();

        $this->assertIsArray($converter->getResultArray());
        $this->assertCount(3, $converter->getResultArray());
        $this->assertEquals([1, 1, 0], $converter->getResultArray());
        $this->assertEquals('110', $converter->getResult());
    }

    public function testCalculateAndGetResultWithMinimumDigits()
    {
        $converter = BaseConvert::convert(20)->to(4)->setMinDigits(5)->calculate();

        $this->assertIsArray($converter->getResultArray());
        $this->assertCount(5, $converter->getResultArray());
        $this->assertEquals([0, 0, 1, 1, 0], $converter->getResultArray());
        $this->assertEquals('00110', $converter->getResult());
    }

    public function testCalculateAndGetResultFromCharacters()
    {
        $converter = BaseConvert::convert('FF', 16, '0123456789ABCDEF')->to(10)->calculate();

        $this->assertIsArray($converter->getResultArray());
        $this->assertCount(3, $converter->getResultArray());
        $this->assertEquals([2, 5, 5], $converter->getResultArray());
        $this->assertEquals('255', $converter->getResult());
    }

    public function testCalculateAndGetResultFromCharactersAndToCharacters()
    {
        $converter = BaseConvert::convert('FF', 16, '0123456789ABCDEF')->to(10, 'ZYXWVUTSRQ')->calculate();

        $this->assertIsArray($converter->getResultArray());
        $this->assertCount(3, $converter->getResultArray());
        $this->assertEquals(['X', 'U', 'U'], $converter->getResultArray());
        $this->assertEquals('XUU', $converter->getResult());
    }
}
