<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Padding;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Padding\Thing\Thing;
use Stratadox\ImmutableCollection\Test\Unit\Padding\Thing\Things;

/**
 * @covers \Stratadox\ImmutableCollection\Padding
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class Padding_the_collection_with_default_items extends TestCase
{
    /** @test */
    function padding_the_collection_with_items_on_the_left()
    {
        $collection = new Things(
            Thing::named('Foo'),
            Thing::named('Bar')
        );

        $padded = $collection->padLeft(5, Thing::named('N/A'));

        $this->assertEquals(
            new Things(
                Thing::named('N/A'),
                Thing::named('N/A'),
                Thing::named('N/A'),
                Thing::named('Foo'),
                Thing::named('Bar')
            ),
            $padded
        );
    }

    /** @test */
    function padding_the_collection_with_items_on_the_right()
    {
        $collection = new Things(
            Thing::named('Foo'),
            Thing::named('Bar'),
            Thing::named('Baz')
        );

        $padded = $collection->padRight(5, Thing::named('N/A'));

        $this->assertEquals(
            new Things(
                Thing::named('Foo'),
                Thing::named('Bar'),
                Thing::named('Baz'),
                Thing::named('N/A'),
                Thing::named('N/A')
            ),
            $padded
        );
    }
}
