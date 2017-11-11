<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Collection\SimpleCollection;

class I_want_to_view_the_items_in_the_collection extends TestCase
{
    /** @scenario */
    function viewing_the_collection_through_array_syntax()
    {
        $collection = new SimpleCollection(10, 20, 30);

        $this->assertSame(20, $collection[1]);
    }

    /** @scenario */
    function converting_the_collection_to_an_array()
    {
        $collection = new SimpleCollection(10, 20, 30);

        $this->assertSame([10, 20, 30], $collection->items());
    }
}
