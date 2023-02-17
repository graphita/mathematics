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
     * @param $itemIndex
     * @return mixed|null
     */
    public function getItem($itemIndex): mixed
    {
        return $this->items[$itemIndex] ?? null;
    }

    /**
     * @return int
     */
    public function countItems(): int
    {
        return count($this->getItems());
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
        return count($this->getPossibilities());
    }

    /**
     * @return $this
     */
    public function calculate(): static
    {
        $this->possibilities = [];
        if ($this->countItems()) {
            $totalPossibilities = pow($this->countItems(), $this->getSelection());
            $baseConverter = new BaseConvert();
            $baseConverter->to($this->countItems())->setMinDigits($this->getSelection())->toCharacters($this->getItems());
            for ($possibilityId = 0; $possibilityId < $totalPossibilities; $possibilityId++) {
                if (!$this->canRepetitions()) {
                    $possibilityArray = $baseConverter->from($possibilityId)->calculate()->getResultArray();
                    if( count($possibilityArray) != count(array_unique($possibilityArray)) ){
                        continue;
                    }
                }
                $this->possibilities[] = $baseConverter->from($possibilityId)->calculate()->getResult();
            }
        }
        return $this;
    }
}