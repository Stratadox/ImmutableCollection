<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Appending;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Appending\Numbers\Numbers;
use Stratadox\ImmutableCollection\Test\Unit\Appending\Numbers\FlaggedNumbers;
use TypeError;

/**
 * @covers \Stratadox\ImmutableCollection\Appending
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class Appending_items_to_the_collection extends TestCase
{
    /** @test */
    function adding_an_item_to_a_collection()
    {
        $collection = new Numbers(1, 2, 3);

        $collection = $collection->add(4);

        $this->assertSame([1, 2, 3, 4], $collection->items());
    }

    /** @test */
    function adding_multiple_items_to_a_collection()
    {
        $collection = new Numbers(1, 2, 3);

        $collection = $collection->add(4, 5);

        $this->assertSame([1, 2, 3, 4, 5], $collection->items());
    }

    /** @test */
    function adding_items_does_not_mutate_the_original_collection()
    {
        $collection = new Numbers(1, 2, 3);

        $collection->add(4);

        $this->assertSame([1, 2, 3], $collection->items());
    }

    /** @test */
    function adding_items_preserves_my_boolean_flag()
    {
        $numbers = new FlaggedNumbers(true, 1, 2, 3);

        $numbers = $numbers->add(4);

        $this->assertTrue($numbers->flagged());
    }

    /** @test */
    function cannot_add_items_that_are_not_compatible_with_the_collection()
    {
        $collection = new Numbers(1, 2, 3);

        $this->expectException(TypeError::class);

        $collection->add('Not a number');
    }
}
