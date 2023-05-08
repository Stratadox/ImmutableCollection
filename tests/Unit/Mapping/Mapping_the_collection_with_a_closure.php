<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Mapping;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Mapping\Thing\Thing;
use Stratadox\ImmutableCollection\Test\Unit\Mapping\Thing\Things;

/**
 * @covers \Stratadox\ImmutableCollection\Mapping
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class Mapping_the_collection_with_a_closure extends TestCase
{
    /** @test */
    function applying_a_closure_to_map_the_collection_of_things()
    {
        $things = new Things(
            Thing::named('Foo'),
            Thing::named('Bar')
        );

        $mapped = $things->map(function (Thing $thing) {
            return Thing::named('The '.$thing->name());
        });

        $this->assertEquals(
            [
                Thing::named('The Foo'),
                Thing::named('The Bar')
            ],
            $mapped
        );
    }
}
