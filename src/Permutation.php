<?php

namespace Graphita\Mathematics;

class Permutation
{
    /**
     * @var bool
     */
    private bool $repetitions = false;

    /**
     * @var array
     */
    private array $items = [];

    /**
     * @var int
     */
    private int $selection = 0;

    /**
     * @var array
     */
    private array $possibilities = [];

    /**
     * @return bool
     */
    public function canRepetitions(): bool
    {
        return $this->repetitions;
    }

    /**
     * @param bool $repetitions
     * @return Permutation
     */
    public function setRepetitions(bool $repetitions): static
    {
        $this->repetitions = $repetitions;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function countItems(): int
    {
        return count( $this->getItems() );
    }

    /**
     * @param array $items
     * @return Permutation
     */
    public function setItems(array $items): static
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return int
     */
    public function getSelection(): int
    {
        return $this->selection;
    }

    /**
     * @param int $selection
     * @return Permutation
     */
    public function setSelection(int $selection): static
    {
        $this->selection = $selection;
        return $this;
    }

    /**
     * @return array
     */
    public function getPossibilities(): array
    {
        return $this->possibilities;
    }

    /**
     * @return int
     */
    public function countPossibilities(): int
    {
        return count( $this->getPossibilities() );
    }

    /**
     * @return $this
     */
    public function calculate(): static
    {
        $this->possibilities = [];

        return $this;
    }
}