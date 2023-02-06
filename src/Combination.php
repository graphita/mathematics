<?php

namespace Graphita\Mathematics;

class Combination
{
    /**
     * @var bool
     */
    private bool $repetitions = false;

    /**
     * @return bool
     */
    public function canRepetitions(): bool
    {
        return $this->repetitions;
    }

    /**
     * @param bool $repetitions
     */
    public function setRepetitions(bool $repetitions): void
    {
        $this->repetitions = $repetitions;
    }
}