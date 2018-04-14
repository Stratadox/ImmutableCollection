<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\JsonSerializing;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Imploding\Things\StringConvertibleThing;
use Stratadox\ImmutableCollection\Test\Unit\Imploding\Things\Things;

/**
 * @covers \Stratadox\ImmutableCollection\Imploding
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
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
}
