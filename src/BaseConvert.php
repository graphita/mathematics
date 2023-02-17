<?php

namespace Graphita\Mathematics;

class BaseConvert
{
    /**
     * Default Base for Source & Destination Base
     */
    const DEFAULT_BASE = 10;


    /**
     * @var int|string|null
     */
    private int|string|null $sourceNumber = null;

    /**
     * @var int
     */
    private int $sourceBase = self::DEFAULT_BASE;

    /**
     * @var int
     */
    private int $destinationBase = self::DEFAULT_BASE;

    /**
     * @var array
     */
    private array $sourceCharactersMap = [];

    /**
     * @var array
     */
    private array $destinationCharactersMap = [];

    /**
     * @var array
     */
    private array $resultArray = [];

    /**
     * @var int|null
     */
    private int|null $minDigits = null;

    /**
     * @param int|string $sourceNumber
     * @param int $sourceBase
     * @param array|string $sourceCharactersMap
     * @return BaseConvert
     */
    public static function convert(int|string $sourceNumber, int $sourceBase = self::DEFAULT_BASE, array|string $sourceCharactersMap = []): BaseConvert
    {
        return (new static())->from($sourceNumber, $sourceBase, $sourceCharactersMap);
    }

    /**
     * @param int|string $sourceNumber
     * @param int $sourceBase
     * @param array|string $sourceCharactersMap
     * @return $this
     */
    public function from(int|string $sourceNumber, int $sourceBase = self::DEFAULT_BASE, array|string $sourceCharactersMap = []): static
    {
        $this->sourceNumber = $sourceNumber;
        $this->sourceBase = $sourceBase;
        $this->fromCharacters($sourceCharactersMap);
        return $this;
    }

    /**
     * @param array|string $sourceCharactersMap
     * @return $this
     */
    public function fromCharacters(array|string $sourceCharactersMap = []): static
    {
        if (is_string($sourceCharactersMap)) {
            $this->sourceCharactersMap = str_split($sourceCharactersMap);
        } else {
            $this->sourceCharactersMap = $sourceCharactersMap;
        }
        return $this;
    }

    /**
     * @param int $destinationBase
     * @param array|string $destinationCharactersMap
     * @return $this
     */
    public function to(int $destinationBase, array|string $destinationCharactersMap = []): static
    {
        $this->destinationBase = $destinationBase;
        $this->toCharacters($destinationCharactersMap);
        return $this;
    }

    /**
     * @param array|string $destinationCharactersMap
     * @return $this
     */
    public function toCharacters(array|string $destinationCharactersMap = []): static
    {
        if (is_string($destinationCharactersMap)) {
            $this->destinationCharactersMap = str_split($destinationCharactersMap);
        } else {
            $this->destinationCharactersMap = $destinationCharactersMap;
        }
        return $this;
    }

    /**
     * @return int|string|null
     */
    public function getSourceNumber(): int|string|null
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
     * @return array
     */
    public function getSourceCharactersMap(): array
    {
        return $this->sourceCharactersMap;
    }

    /**
     * @return int
     */
    public function getDestinationBase(): int
    {
        return $this->destinationBase;
    }

    /**
     * @return array
     */
    public function getDestinationCharactersMap(): array
    {
        return $this->destinationCharactersMap;
    }

    /**
     * @param int|string $character
     * @param array $characters
     * @return false|int|string|null
     */
    private function getDigit(int|string $character, array $characters = []): false|int|string|null
    {
        return array_search($character, $characters) ?? $character;
    }

    /**
     * @param int $digit
     * @param array $characters
     * @return mixed
     */
    private function getCharacter(int $digit, array $characters = []): mixed
    {
        return $characters[$digit] ?? $digit;
    }

    /**
     * @return int|null
     */
    public function getMinDigits(): ?int
    {
        return $this->minDigits;
    }

    /**
     * @param int $minDigits
     * @return BaseConvert
     */
    public function setMinDigits(int $minDigits): static
    {
        $this->minDigits = $minDigits;
        return $this;
    }

    /**
     * @return array
     */
    public function getResultArray(): array
    {
        return $this->resultArray;
    }

    /**
     * @return int|string|null
     */
    public function getResult(): int|string|null
    {
        if( count( $this->getResultArray() ) )
            return implode('', $this->getResultArray());
        return null;
    }

    /**
     * @return $this
     */
    public function calculate(): static
    {
        $sourceNumber = $this->getSourceNumber();
        if (count($this->getSourceCharactersMap())) {
            $sourceArray = array_reverse(str_split($this->getSourceNumber()));
            $sourceNumber = 0;
            foreach ($sourceArray as $sourceIndex => $sourceDigit) {
                $sourceNumber += $this->getDigit($sourceDigit, $this->getSourceCharactersMap()) * pow($this->getSourceBase(), $sourceIndex);
            }
        }

        $resultArray = [];
        $destinationBase = $this->getDestinationBase();
        while ($sourceNumber >= $destinationBase) {
            $resultArray[] = $this->getCharacter($sourceNumber % $destinationBase, $this->getDestinationCharactersMap());
            $sourceNumber = floor($sourceNumber / $destinationBase);
        }
        $resultArray[] = $this->getCharacter($sourceNumber, $this->getDestinationCharactersMap());

        if ($this->getMinDigits() && count($resultArray) < $this->getMinDigits() ) {
            $prefixArray = array_fill(0, $this->getMinDigits() - count($resultArray), $this->getCharacter(0, $this->getDestinationCharactersMap()));
            $resultArray = array_merge($resultArray, $prefixArray);
        }

        $this->resultArray = array_reverse($resultArray);

        return $this;
    }
}