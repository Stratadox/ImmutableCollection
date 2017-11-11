<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator;

class CalculationResult
{
    private $value = 0;

    public function __construct(int $value = 0)
    {
        $this->value = $value;
    }

    public static function startWith(int $value) : CalculationResult
    {
        return new static($value);
    }

    public function currentValue() : int
    {
        return $this->value;
    }

    public function add(int $amount) : CalculationResult
    {
        return new static($this->value + $amount);
    }

    public function subtract(int $amount) : CalculationResult
    {
        return new static($this->value - $amount);
    }

    public function multiply(int $amount) : CalculationResult
    {
        return new static($this->value * $amount);
    }
}
