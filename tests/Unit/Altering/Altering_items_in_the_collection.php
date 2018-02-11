<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Altering\Numbers\Numbers;
use Stratadox\ImmutableCollection\Test\Unit\Altering\Numbers\FlaggedNumbers;

/**
 * @covers \Stratadox\ImmutableCollection\Altering
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class Altering_items_in_the_collection extends TestCase
{
    /** @test */
    function changing_an_item_in_the_collection()
    {
        $collection = new Numbers(1, 2, 3);

        $collection = $collection->change(1, 10);

        $this->assertSame([1, 10, 3], $collection->items());
    }

    /** @test */
    function changing_items_does_not_mutate_the_original_collection()
    {
        $collection = new Numbers(1, 2, 3);

        $collection->change(1, 10);

        $this->assertSame([1, 2, 3], $collection->items());
    }

    /** @test */
    function changing_items_preserves_my_boolean_flag()
    {
        $numbers = new FlaggedNumbers(true, 1, 2, 3);

        $numbers = $numbers->change(1, 10);

        $this->assertTrue($numbers->flagged());
    }
}
