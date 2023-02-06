<?php

namespace Graphita\Mathematics;

class BaseConvert
{
    /**
     * Default Base for Source & Destination Base
     */
    const DEFAULT_BASE = 10;

    /**
     * @var int|null
     */
    private ?int $sourceNumber = null;

    /**
     * @var int
     */
    private int $sourceBase = self::DEFAULT_BASE;

    /**
     * @var int
     */
    private int $destinationBase = self::DEFAULT_BASE;

    /**
     * @var ?string
     */
    private ?string $sourceCharacters = null;

    /**
     * @var ?string
     */
    private ?string $destinationCharacters = null;

    /**
     * @var array
     */
    private array $resultArray = [];

    /**
     * @param int $sourceNumber
     * @param int $sourceBase
     * @param string|null $sourceCharacters
     * @return BaseConvert
     */
    public static function convert(int $sourceNumber, int $sourceBase = self::DEFAULT_BASE, string $sourceCharacters = null)
    {
        return (new static())->from($sourceNumber, $sourceBase, $sourceCharacters);
    }

    /**
     * @param int $sourceNumber
     * @param int $sourceBase
     * @param string|null $sourceCharacters
     * @return $this
     */
    public function from(int $sourceNumber, int $sourceBase = self::DEFAULT_BASE, string $sourceCharacters = null)
    {
        $this->sourceNumber = $sourceNumber;
        $this->sourceBase = $sourceBase;
        if ($sourceCharacters) {
            $this->sourceCharacters = $sourceCharacters;
        }
        return $this;
    }

    /**
     * @param string|null $sourceCharacters
     * @return $this
     */
    public function fromCharacters(string $sourceCharacters = null)
    {
        if ($sourceCharacters) {
            $this->sourceCharacters = $sourceCharacters;
        }
        return $this;
    }

    /**
     * @param int $destinationBase
     * @param string|null $destinationCharacters
     * @return $this
     */
    public function to(int $destinationBase, string $destinationCharacters = null)
    {
        $this->destinationBase = $destinationBase;
        if ($destinationCharacters) {
            $this->destinationCharacters = $destinationCharacters;
        }
        return $this;
    }

    /**
     * @param string|null $destinationCharacters
     * @return $this
     */
    public function toCharacters(string $destinationCharacters = null)
    {
        if ($destinationCharacters) {
            $this->destinationCharacters = $destinationCharacters;
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function calculate()
    {
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSourceNumber(): ?int
    {
        return $this->sourceNumber;
    }

    /**
     * @return int
     */
    public function getSourceBase(): int
    {
        return $this->sourceBase;
    }

    /**
     * @return string|null
     */
    public function getSourceCharacters(): ?string
    {
        return $this->sourceCharacters;
    }

    /**
     * @return int
     */
    public function getDestinationBase(): int
    {
        return $this->destinationBase;
    }

    /**
     * @return string|null
     */
    public function getDestinationCharacters(): ?string
    {
        return $this->destinationCharacters;
    }

    /**
     * @return array
     */
    public function getResultArray(): array
    {
        return $this->resultArray;
    }

    /**
     * @return string
     */
    public function getResult(): string
    {
        return implode('', $this->resultArray);
    }
}