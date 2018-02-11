<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Purging\Numbers\Numbers;
use Stratadox\ImmutableCollection\Test\Unit\Purging\Numbers\FlaggedNumbers;

/**
 * @covers \Stratadox\ImmutableCollection\Purging
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class Purging_items_from_the_collection_by_index extends TestCase
{
    /** @test */
    function deleting_an_index_removes_the_item()
    {
        $collection = new Numbers(1, 2, 3, 4);
        $collection = $collection->delete(2);

        $this->assertSame([1, 2, 4], $collection->items());
    }

    /** @test */
    function deleting_an_index_does_not_mutate_the_original_collection()
    {
        $collection = new Numbers(1, 2, 3, 4);
        $collection->delete(2);

        $this->assertSame([1, 2, 3, 4], $collection->items());
    }

    /** @test */
    function deleting_an_index_preserves_my_boolean_flag()
    {
        $collection = new FlaggedNumbers(true, 0, 1, 2, 3);

        $collection = $collection->delete(1);

        $this->assertTrue($collection->flagged());
    }
}
