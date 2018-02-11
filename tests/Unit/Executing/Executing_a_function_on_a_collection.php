<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Executing;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Executing\Things\Thing;
use Stratadox\ImmutableCollection\Test\Unit\Executing\Things\Things;

/**
 * @covers \Stratadox\ImmutableCollection\Executing
 */
class Executing_a_function_on_a_collection extends TestCase
{
    private $names;

    /** @test */
    function having_each_item_execute_the_function()
    {
        $things = new Things(
            Thing::named('Foo'),
            Thing::named('Bar')
        );

        $test = $this;

        $things->execute(function () use ($test) {
            /** @var Thing $this */
            $test->addName($this->name());
        });

        $this->assertSame(
            ['Foo', 'Bar'],
            $this->names
        );
    }

    /** @test */
    function passing_the_index_and_value_to_each_function_call()
    {
        $things = new Things(
            Thing::named('Foo'),
            Thing::named('Bar'),
            Thing::named('Baz')
        );

        $test = $this;

        $things->execute(function (int $position, Thing $thing) use ($test) {
            $test->addName($position . ') ' .$thing->name());
        });

        $this->assertSame(
            ['0) Foo', '1) Bar', '2) Baz'],
            $this->names
        );
    }

    public function addName(string $name) : void
    {
        $this->names[] = $name;
    }
}
