<?php

namespace Graphita\Mathematics;

use InvalidArgumentException;

class Factorial
{
    /**
     * @var int
     */
    private int $number;

    /**
     * @param $number
     */
    public function __construct($number)
    {
        if (!is_integer($number)) {
            throw new InvalidArgumentException('Number must be a Positive Integer to Calculate Factorial !');
        }
        if ($number < 0) {
            throw new InvalidArgumentException('Number must be a Positive Integer to Calculate Factorial !');
        }
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function calculate(): int
    {
        $result = 1;
        while ($this->number > 1) {
            $result *= $this->number;
            $this->number--;
        }
        return $result;
    }
}