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
        $this->assertNull($converter->getSourceCharacters());
        $this->assertNull($converter->getDestinationCharacters());
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

    public function testSetAndGetSourceNumberAndSourceBaseAndSourceCharacters()
    {
        $converter = BaseConvert::convert(20, 16, '0123456789abcdef');

        $this->assertInstanceOf(BaseConvert::class, $converter);
        $this->assertEquals(20, $converter->getSourceNumber());
        $this->assertEquals(16, $converter->getSourceBase());
        $this->assertEquals('0123456789abcdef', $converter->getSourceCharacters());
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

    public function testSetAndGetSourceNumberAndSourceBaseAndSourceCharactersWithFrom()
    {
        $converter = new BaseConvert();
        $converter->from(20, 16, '0123456789abcdef');
        $this->assertEquals(20, $converter->getSourceNumber());
        $this->assertEquals(16, $converter->getSourceBase());
        $this->assertEquals('0123456789abcdef', $converter->getSourceCharacters());
    }

    public function testSetAndGetSourceCharacters()
    {
        $converter = new BaseConvert();
        $converter->fromCharacters('0123456789abcdef');

        $this->assertEquals('0123456789abcdef', $converter->getSourceCharacters());
    }

    public function testSetAndGetDestinationBase()
    {
        $converter = BaseConvert::convert(20);
        $converter->to(16);

        $this->assertEquals(16, $converter->getDestinationBase());
    }

    public function testSetAndGetDestinationBaseAndDestinationCharacters()
    {
        $converter = BaseConvert::convert(20);
        $converter->to(16, '0123456789abcdef');

        $this->assertEquals(16, $converter->getDestinationBase());
        $this->assertEquals('0123456789abcdef', $converter->getDestinationCharacters());
    }

    public function testSetAndGetDestinationCharacters()
    {
        $converter = new BaseConvert();
        $converter->toCharacters('0123456789abcdef');

        $this->assertEquals('0123456789abcdef', $converter->getDestinationCharacters());
    }
}