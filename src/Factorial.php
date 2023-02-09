<?php

namespace Graphita\Mathematics;

use InvalidArgumentException;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class Factorial
{
    /**
     * @var int
     */
    private int $number;

    /**
     * @var ?int
     */
    private ?int $result = null;

    /**
     * @param int|null $number
     * @return Factorial
     */
    public static function instance(int $number = null): Factorial
    {
        $instance = new static();
        if (is_integer($number)) {
            $instance->setNumber($number);
        }
        return $instance;
    }

    /**
     * @param int $number
     * @return Factorial
     */
    public function setNumber(int $number): static
    {
        if ($number < 0) {
            throw new InvalidArgumentException('Number must be a Positive Integer to Calculate Factorial !');
        }
        $this->number = $number;

        return $this;
    }

    /**
     * @return $this
     */
    public function calculate(): static
    {
        $number = $this->number;
        $this->result = 1;
        while ($number > 1) {
            $this->result *= $number;
            $number--;
        }

        return $this;
    }

    /**
     * @return int|null
     */
    public function getResult(): ?int
    {
        return $this->result;
    }
}