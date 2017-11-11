<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Collection\NotAllowed;
use Stratadox\ImmutableCollection\Test\Unit\Collection\SimpleCollection;

class I_want_my_collection_to_be_immutable extends TestCase
{
    /** @scenario */
    function cannot_set_item_through_array_syntax()
    {
        $collection = new SimpleCollection(1, 2, 3);

        $this->expectException(NotAllowed::class);

        $collection[0] = 4;
    }

    /** @scenario */
    function cannot_add_item_through_array_syntax()
    {
        $collection = new SimpleCollection(1, 2, 3);

        $this->expectException(NotAllowed::class);

        $collection[] = 4;
    }

    /** @scenario */
    function cannot_unset_directly()
    {
        $collection = new SimpleCollection(1, 2, 3, 4);

        $this->expectException(NotAllowed::class);

        unset($collection[2]);
    }

    /** @scenario */
    function cannot_remove_values_by_shortening_the_array()
    {
        $collection = new SimpleCollection(1, 2, 3, 4);

        $this->expectException(NotAllowed::class);

        $collection->setSize(3);
    }
}
