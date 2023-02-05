<?php

namespace Graphita\Mathematics;

class BaseConvert
{
    /**
     * @var int|null
     */
    private ?int $sourceNumber = null;

    /**
     * @var int
     */
    private int $sourceBase = 10;

    /**
     * @var int
     */
    private int $destinationBase = 10;

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
     * @param $sourceNumber
     */
    public function __construct($sourceNumber = null)
    {
        $this->from($sourceNumber);
    }

    /**
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        return (new static)->$method(...$parameters);
    }

    /**
     * @param int $sourceNumber
     * @return $this
     */
    public function from(int $sourceNumber): static
    {
        $this->sourceNumber = $sourceNumber;
        return $this;
    }

    /**
     * @param int $sourceBase
     * @return $this
     */
    public function fromBase(int $sourceBase): static
    {
        $this->sourceBase = $sourceBase;
        return $this;
    }

    /**
     * @param string $sourceCharacters
     * @return $this
     */
    public function fromCharacters(string $sourceCharacters): static
    {
        $this->sourceCharacters = $sourceCharacters;
        return $this;
    }

    /**
     * @param int $destinationBase
     * @return $this
     */
    public function toBase(int $destinationBase): static
    {
        $this->destinationBase = $destinationBase;
        return $this;
    }

    /**
     * @param string $destinationCharacters
     * @return $this
     */
    public function toCharacters(string $destinationCharacters): static
    {
        $this->destinationCharacters = $destinationCharacters;
        return $this;
    }

    /**
     * @return $this
     */
    public function calculate(): static
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
     * @return int
     */
    public function getDestinationBase(): int
    {
        return $this->destinationBase;
    }

    /**
     * @return string|null
     */
    public function getSourceCharacters(): ?string
    {
        return $this->sourceCharacters;
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