<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator;

class Increment extends Event
{
    public function applyTo(CalculationResult $calculation) : CalculationResult
    {
        return $calculation->add($this->amount());
    }
}
