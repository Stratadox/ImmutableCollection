<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Collection;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Stubs\SimpleCollection;

/**
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class ImmutableCollection_is_countable extends TestCase
{
    /** @test */
    function counting_the_number_of_items_in_the_collection()
    {
        $this->assertSame(3, count(new SimpleCollection(10, 20, 30)));
    }
}
