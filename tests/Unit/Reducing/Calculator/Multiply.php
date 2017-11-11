<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator;

class Multiply extends Event
{
    public static function by(int $amount)
    {
        return new static($amount);
    }

    public function applyTo(CalculationResult $calculation) : CalculationResult
    {
        return $calculation->multiply($this->amount());
    }
}
