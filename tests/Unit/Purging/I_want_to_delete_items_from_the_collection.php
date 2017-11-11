<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Purging\Numbers\Numbers;
use Stratadox\ImmutableCollection\Test\Unit\Purging\Numbers\FlaggedNumbers;

class I_want_to_delete_items_from_the_collection extends TestCase
{
    /** @scenario */
    function deleting_an_index_removes_the_item()
    {
        $collection = new Numbers(1, 2, 3, 4);
        $collection = $collection->delete(2);

        $this->assertSame([1, 2, 4], $collection->items());
    }

    /** @scenario */
    function deleting_an_index_does_not_mutate_the_original_collection()
    {
        $collection = new Numbers(1, 2, 3, 4);
        $collection->delete(2);

        $this->assertSame([1, 2, 3, 4], $collection->items());
    }

    /** @scenario */
    function deleting_an_index_preserves_my_boolean_flag()
    {
        $collection = new FlaggedNumbers(true, 0, 1, 2, 3);

        $collection = $collection->delete(1);

        $this->assertTrue($collection->flagged());
    }
}
