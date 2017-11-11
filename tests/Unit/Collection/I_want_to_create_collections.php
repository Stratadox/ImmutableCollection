<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Stubs\SimpleCollection;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Stubs\Numbers;
use TypeError;

class I_want_to_create_collections extends TestCase
{
    /** @scenario */
    function creating_a_basic_collection_which_allows_any_value()
    {
        $collection = new SimpleCollection(1, 2, "3");

        $this->assertSame([1, 2, "3"], $collection->items());
    }

    /** @scenario */
    function collections_can_assert_types_in_their_constructors()
    {
        $this->expectException(TypeError::class);

        new Numbers(1, 2, "3");
    }

    /** @scenario */
    function creating_a_number_collection_which_allows_integer_values()
    {
        $collection = new Numbers(1, 2, 3);

        $this->assertSame([1, 2, 3], $collection->items());
    }
}
