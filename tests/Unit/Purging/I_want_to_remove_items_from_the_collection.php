<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Purging\Numbers\Numbers;
use Stratadox\ImmutableCollection\Test\Unit\Purging\Numbers\FlaggedNumbers;
use Stratadox\ImmutableCollection\Test\Unit\Purging\Thing\Things;
use Stratadox\ImmutableCollection\Test\Unit\Purging\Thing\Thing;

class I_want_to_remove_items_from_the_collection extends TestCase
{
    /** @scenario */
    function removing_an_item_goes_by_value()
    {
        $collection = new Numbers(3, 1, 3, 2, 3, 4);

        $collection = $collection->remove(3);

        $this->assertSame([1, 2, 4], $collection->items());
    }

    /** @scenario */
    function removing_an_object_goes_by_reference()
    {
        $firstThing = new Thing;
        $secondThing = new Thing;
        $collection = new Things($firstThing, $secondThing);

        $collection = $collection->remove($firstThing);

        $this->assertSame([$secondThing], $collection->items());
    }

    /** @scenario */
    function removing_an_item_does_not_mutate_the_original()
    {
        $collection = new Numbers(1, 2, 3, 4);

        $collection->remove(4);

        $this->assertSame([1, 2, 3, 4], $collection->items());
    }

    /** @scenario */
    function removing_an_item_preserves_my_boolean_flag()
    {
        $collection = new FlaggedNumbers(true, 0, 1, 2, 3);

        $collection = $collection->remove(1);

        $this->assertTrue($collection->flagged());
    }
}