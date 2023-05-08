<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Collection;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Stubs\SimpleCollection;

/**
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class ImmutableCollection_can_use_isset extends TestCase
{
    /** @test */
    function using_isset_to_check_if_a_position_is_filled()
    {
        $collection = new SimpleCollection(0, 1, 2);

        $this->assertTrue(isset($collection[0]));
        $this->assertTrue(isset($collection[1]));
        $this->assertTrue(isset($collection[2]));
        $this->assertFalse(isset($collection[3]));
    }

    /** @test */
    function null_values_are_considered_unset()
    {
        $collection = new SimpleCollection(null, 1, 2);

        $this->assertFalse(isset($collection[0]));
        $this->assertTrue(isset($collection[1]));
        $this->assertTrue(isset($collection[2]));
        $this->assertFalse(isset($collection[3]));
    }
}
