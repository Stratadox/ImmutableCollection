<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Stubs\Numbers;
use TypeError;

/**
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class ImmutableCollection_can_be_imported extends TestCase
{
    /** @test */
    function importing_through_fromArray()
    {
        $collection = Numbers::fromArray([1, 2, 3]);

        $this->assertSame([1, 2, 3], $collection->items());
    }

    /** @test */
    function imported_items_must_be_compatible()
    {
        $this->expectException(TypeError::class);

        Numbers::fromArray(['Not', 'a', 'Number']);
    }
}
