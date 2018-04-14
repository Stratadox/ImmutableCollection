<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Collection;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Stubs\SimpleCollection;

/**
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class ImmutableCollection_can_be_viewed extends TestCase
{
    /** @test */
    function viewing_the_collection_through_array_syntax()
    {
        $collection = new SimpleCollection(10, 20, 30);

        $this->assertSame(20, $collection[1]);
    }

    /** @test */
    function converting_the_collection_to_an_array()
    {
        $collection = new SimpleCollection(10, 20, 30);

        $this->assertSame([10, 20, 30], $collection->items());
    }
}
