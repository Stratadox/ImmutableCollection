<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Numbers;
use TypeError;

class I_want_to_import_collections extends TestCase
{
    /** @scenario */
    function importing_through_fromArray()
    {
        $collection = Numbers::fromArray([1, 2, 3]);

        $this->assertSame([1, 2, 3], $collection->items());
    }

    /** @scenario */
    function imported_items_must_be_compatible()
    {
        $this->expectException(TypeError::class);

        Numbers::fromArray(['Not', 'a', 'Number']);
    }
}
