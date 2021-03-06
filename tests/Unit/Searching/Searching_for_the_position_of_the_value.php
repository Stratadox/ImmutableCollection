<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Searching;

use PHPUnit\Framework\TestCase;
use Stratadox\Collection\NotFound;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Numbers\LooselyTypedNumbers;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Numbers\Numbers;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Things\Things;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Things\Thing;

/**
 * @covers \Stratadox\ImmutableCollection\Searching
 * @covers \Stratadox\ImmutableCollection\NoSuchValue
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class Searching_for_the_position_of_the_value extends TestCase
{
    /** @test */
    function finding_the_position_of_a_number()
    {
        $collection = new Numbers(1, 2, 25);

        $this->assertSame(2, $collection->find(25));
    }

    /** @test */
    function value_finding_uses_strict_typing()
    {
        $collection = new LooselyTypedNumbers(1, 2, 3, '2');

        $this->assertSame(3, $collection->find('2'));
    }

    /** @test */
    function searching_for_something_that_does_not_exist_throws_an_exception()
    {
        $collection = new Numbers(1, 2, 3);

        $this->expectException(NotFound::class);

        $collection->find(4);
    }

    /** @test */
    function finding_objects_goes_by_value_by_default()
    {
        $collection = new Things(
            Thing::named('Foo'),
            Thing::named('Bar')
        );

        $this->assertSame(0, $collection->find(Thing::named('Foo')));
        $this->assertSame(1, $collection->find(Thing::named('Bar')));
    }

    /** @test */
    function finding_objects_goes_by_reference_if_desired()
    {
        $foo = Thing::named('Foo');
        $collection = new Things(
            Thing::named('Foo'),
            Thing::named('Bar'),
            $foo
        );

        $this->assertSame(2, $collection->findThe($foo));
    }

    /** @test */
    function searching_by_reference_for_a_non_contained_object_throws_an_exception()
    {
        $collection = new Things(Thing::named('Foo'));

        $this->expectException(NotFound::class);

        $collection->findThe(Thing::named('Bar'));
    }
}
