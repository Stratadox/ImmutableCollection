<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\JsonSerializing;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\JsonSerializing\Things\Thing;
use Stratadox\ImmutableCollection\Test\Unit\JsonSerializing\Things\Things;

/**
 * @covers \Stratadox\ImmutableCollection\Differentiating
 * @covers \Stratadox\ImmutableCollection\JsonSerializing
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
}
