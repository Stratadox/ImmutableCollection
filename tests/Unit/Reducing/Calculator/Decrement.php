<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator;

class Decrement extends Event
{
    public function applyTo(CalculationResult $calculation) : CalculationResult
    {
        return $calculation->subtract($this->amount());
    }
}
