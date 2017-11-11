<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator;

abstract class Event
{
    private $amount;

    protected function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public static function with(int $amount) : Event
    {
        return new static($amount);
    }

    protected function amount()
    {
        return $this->amount;
    }

    abstract public function applyTo(CalculationResult $calculation) : CalculationResult;
}
