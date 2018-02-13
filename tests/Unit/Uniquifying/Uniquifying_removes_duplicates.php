<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Uniquifying;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Uniquifying\Things\Thing;
use Stratadox\ImmutableCollection\Test\Unit\Uniquifying\Things\Things;

/**
 * @covers \Stratadox\ImmutableCollection\Uniquifying
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class Uniquifying_removes_duplicates extends TestCase
{
    /** @test */
    function uniquifying_a_collection_removes_duplicates()
    {
        $thingsWithDuplicates = new Things(
            Thing::named('foo'),
            Thing::named('bar'),
            Thing::named('foo'),
            Thing::named('baz'),
            Thing::named('bar')
        );

        $thingsWithoutDuplicates = $thingsWithDuplicates->unique();

        $this->assertEquals(
            new Things(
                Thing::named('foo'),
                Thing::named('bar'),
                Thing::named('baz')
            ),
            $thingsWithoutDuplicates
        );
    }

    /** @test */
    function uniquifying_an_already_unique_collection_changes_nothing()
    {
        $original = new Things(
            Thing::named('foo'),
            Thing::named('bar'),
            Thing::named('baz')
        );

        $uniquified = $original->unique();

        $this->assertEquals(
            $original,
            $uniquified
        );
    }
}
