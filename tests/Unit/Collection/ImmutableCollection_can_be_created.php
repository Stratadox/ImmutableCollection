<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Stubs\SimpleCollection;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Stubs\Numbers;
use TypeError;

/**
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class ImmutableCollection_can_be_created extends TestCase
{
    /** @test */
    function creating_a_basic_collection_which_allows_any_value()
    {
        $collection = new SimpleCollection(1, 2, "3");

        $this->assertSame([1, 2, "3"], $collection->items());
    }

    /** @test */
    function collections_can_assert_types_in_their_constructors()
    {
        $this->expectException(TypeError::class);

        new Numbers(1, 2, "3");
    }

    /** @test */
    function creating_a_number_collection_which_allows_integer_values()
    {
        $collection = new Numbers(1, 2, 3);

        $this->assertSame([1, 2, 3], $collection->items());
    }
}
