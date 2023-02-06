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
     * @var array
     */
    private array $sourceNumberArray = [];

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
     * @var int|string|null
     */
    private int|string|null $result = null;

    /**
     * @var int|null
     */
    private int|null $minDigits = null;

    /**
     * @param int|string $sourceNumber
     * @param int $sourceBase
     * @param string|null $sourceCharacters
     * @return BaseConvert
     */
    public static function convert(int|string $sourceNumber, int $sourceBase = self::DEFAULT_BASE, string $sourceCharacters = null): BaseConvert
    {
        return (new static())->from($sourceNumber, $sourceBase, $sourceCharacters);
    }

    /**
     * @param int|string $sourceNumber
     * @param int $sourceBase
     * @param string|null $sourceCharacters
     * @return $this
     */
    public function from(int|string $sourceNumber, int $sourceBase = self::DEFAULT_BASE, string $sourceCharacters = null): static
    {
        $this->sourceNumber = $sourceNumber;
        $this->sourceNumberArray = str_split($sourceNumber);
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
    public function fromCharacters(string $sourceCharacters = null): static
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
    public function to(int $destinationBase, string $destinationCharacters = null): static
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
    public function toCharacters(string $destinationCharacters = null): static
    {
        if ($destinationCharacters) {
            $this->destinationCharacters = $destinationCharacters;
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
     * @return array
     */
    public function getSourceNumberArray(): array
    {
        return $this->sourceNumberArray;
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
     * @param int|string $character
     * @param string|null $characters
     * @return false|int|string|null
     */
    private function getDigit(int|string $character, string $characters = null): false|int|string|null
    {
        if (!empty($characters)) {
            $charactersArray = str_split($characters);
            return array_search($character, $charactersArray) ?? null;
        }
        return $character;
    }

    /**
     * @param int $digit
     * @param string|null $characters
     * @return mixed
     */
    private function getCharacter(int $digit, string $characters = null): mixed
    {
        if (!empty($characters)) {
            $charactersArray = str_split($characters);
            return $charactersArray[$digit] ?? null;
        }
        return $digit;
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
        return $this->result;
    }

    /**
     * @return $this
     */
    public function calculate(): static
    {
        $sourceArray = array_reverse($this->getSourceNumberArray());
        $sourceNumber = 0;
        foreach ($sourceArray as $sourceIndex => $sourceDigit) {
            $sourceNumber += $this->getDigit($sourceDigit, $this->getSourceCharacters()) * pow($this->getSourceBase(), $sourceIndex);
        }

        $resultArray = [];
        while ($sourceNumber >= $this->getDestinationBase()) {
            $resultDigit = $sourceNumber % $this->getDestinationBase();
            $resultArray[] = $this->getCharacter($resultDigit, $this->getDestinationCharacters());

            $sourceNumber = floor($sourceNumber / $this->getDestinationBase());
        }
        $resultArray[] = $this->getCharacter($sourceNumber, $this->getDestinationCharacters());

        if( $this->getMinDigits() ){
            while( count($resultArray) < $this->getMinDigits() ){
                $resultArray[] = $this->getCharacter(0, $this->getDestinationCharacters());
            }
        }

        $this->resultArray = array_reverse($resultArray);
        $this->result = implode('', $this->resultArray);

        return $this;
    }
}