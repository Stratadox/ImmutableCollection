<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Collection\NotAllowed;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Stubs\SimpleCollection;

/**
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 * @covers \Stratadox\ImmutableCollection\CannotAlterCollection
 */
class ImmutableCollection_is_immutable extends TestCase
{
    /** @test */
    function cannot_set_item_through_array_syntax()
    {
        $collection = new SimpleCollection(1, 2, 3);

        $this->expectException(NotAllowed::class);

        $collection[0] = 4;
    }

    /** @test */
    function cannot_add_item_through_array_syntax()
    {
        $collection = new SimpleCollection(1, 2, 3);

        $this->expectException(NotAllowed::class);

        $collection[] = 4;
    }

    /** @test */
    function cannot_unset_directly()
    {
        $collection = new SimpleCollection(1, 2, 3, 4);

        $this->expectException(NotAllowed::class);

        unset($collection[2]);
    }

    /** @test */
    function cannot_remove_values_by_shortening_the_array()
    {
        $collection = new SimpleCollection(1, 2, 3, 4);

        $this->expectException(NotAllowed::class);

        $collection->setSize(3);
    }
}
