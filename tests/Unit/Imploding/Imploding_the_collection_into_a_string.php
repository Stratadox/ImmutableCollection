<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Imploding;

use PHPUnit\Framework\TestCase;
use Stratadox\Collection\ConversionFailed;
use Stratadox\ImmutableCollection\Test\Unit\Imploding\Things\NotStringConvertibleThing;
use Stratadox\ImmutableCollection\Test\Unit\Imploding\Things\StringConvertibleThing;
use Stratadox\ImmutableCollection\Test\Unit\Imploding\Things\Things;

/**
 * @covers \Stratadox\ImmutableCollection\Imploding
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 * @covers \Stratadox\ImmutableCollection\CouldNotImplode
 */
class Imploding_the_collection_into_a_string extends TestCase
{
    /** @test */
    function imploding_a_collection_of_Things()
    {
        $things = new Things(
            StringConvertibleThing::named('foo'),
            StringConvertibleThing::named('bar'),
            StringConvertibleThing::named('baz')
        );

        $this->assertEquals('foo, bar, baz', $things->implode());
    }

    /** @test */
    function imploding_a_collection_of_Things_with_a_custom_glue()
    {
        $things = new Things(
            StringConvertibleThing::named('foo'),
            StringConvertibleThing::named('bar'),
            StringConvertibleThing::named('baz')
        );

        $this->assertEquals('foo; bar; baz', $things->implode('; '));
    }

    /** @test */
    function getting_and_exception_when_trying_to_implode_the_unimplodable()
    {
        $things = new Things(
            StringConvertibleThing::named('foo'),
            StringConvertibleThing::named('bar'),
            NotStringConvertibleThing::named('baz')
        );

        $this->expectException(ConversionFailed::class);
        $this->expectExceptionMessage(
            'Could not implode the `'.Things::class.'` class: ' .
            'Object of class ' . NotStringConvertibleThing::class . ' could ' .
            'not be converted to string'
        );

        $things->implode('; ');
    }
}
