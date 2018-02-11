<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\JsonSerializing;

use PHPUnit\Framework\TestCase;
use Stratadox\Collection\ConversionFailed;
use Stratadox\ImmutableCollection\Test\Unit\JsonSerializing\Things\Thing;
use Stratadox\ImmutableCollection\Test\Unit\JsonSerializing\Things\Things;
use Stratadox\ImmutableCollection\Test\Unit\JsonSerializing\Things\NonSerializableThing;

/**
 * @covers \Stratadox\ImmutableCollection\JsonSerializing
 * @covers \Stratadox\ImmutableCollection\CouldNotConvertToJson
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class JsonSerializing_the_collection_to_a_json_string extends TestCase
{
    /** @test */
    function serializing_a_collection_of_things()
    {
        $things = new Things(
            Thing::named('Foo'),
            Thing::named('Bar')
        );

        $this->assertSame(
            '[{"name":"Foo"},{"name":"Bar"}]',
            $things->json()
        );
    }

    /** @test */
    function serializing_a_collection_of_unserializable_things()
    {
        $things = new Things(
            NonSerializableThing::named('Foo'),
            NonSerializableThing::named('Bar')
        );

        $this->expectException(ConversionFailed::class);
        $this->expectExceptionMessage(
            'Could not convert the `'.Things::class.'` class to json: ' .
            'Exception message here.'
        );

        $things->json();
    }
}
