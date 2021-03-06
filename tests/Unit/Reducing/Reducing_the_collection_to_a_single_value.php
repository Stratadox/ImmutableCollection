<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Reducing;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator\Increment;
use Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator\Event;
use Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator\Events;
use Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator\Multiply;
use Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator\CalculationResult;
use Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator\Decrement;
use Stratadox\ImmutableCollection\Test\Unit\Reducing\Numbers\Numbers;

/**
 * @covers \Stratadox\ImmutableCollection\Reducing
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class Reducing_the_collection_to_a_single_value extends TestCase
{
    /** @test */
    function summing_the_numbers_in_the_collection()
    {
        $numbers = new Numbers(1, 2, 3, 4);

        $this->assertEquals(
            10,
            $numbers->reduce(function (int $carry, int $number) : int {
                return $carry + $number;
            }, 0)
        );
    }

    /** @test */
    function applying_a_collection_of_events()
    {
        $events = new Events(
            Increment::with(10),
            Decrement::with(3),
            Multiply::by(2),
            Increment::with(2)
        );

        $calculator = $events->reduce(function (
            CalculationResult $theCalculation,
            Event $operation
        ) : CalculationResult
        {
            return $operation->applyTo($theCalculation);
        }, CalculationResult::startWith(0));

        $this->assertEquals(
            16,
            $calculator->currentValue()
        );
    }
}
