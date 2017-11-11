<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Collection\NotFound;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Numbers\LooselyTypedNumbers;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Numbers\Numbers;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Things\Things;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Things\Thing;

class I_want_to_find_the_position_of_an_item_in_the_collection extends TestCase
{
    /** @scenario */
    function finding_the_position_of_a_number()
    {
        $collection = new Numbers(1, 2, 25);

        $this->assertSame(2, $collection->find(25));
    }

    /** @scenario */
    function value_finding_uses_strict_typing()
    {
        $collection = new LooselyTypedNumbers(1, 2, 3, '2');

        $this->assertSame(3, $collection->find('2'));
    }

    /** @scenario */
    function searching_for_something_that_does_not_exist_throws_an_exception()
    {
        $collection = new Numbers(1, 2, 3);

        $this->expectException(NotFound::class);

        $collection->find(4);
    }

    /** @scenario */
    function finding_objects_goes_by_value_by_default()
    {
        $collection = new Things(
            Thing::named('Foo'),
            Thing::named('Bar')
        );

        $this->assertSame(0, $collection->find(Thing::named('Foo')));
        $this->assertSame(1, $collection->find(Thing::named('Bar')));
    }

    /** @scenario */
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

    /** @scenario */
    function searching_by_reference_for_a_non_contained_object_throws_an_exception()
    {
        $collection = new Things(Thing::named('Foo'));

        $this->expectException(NotFound::class);

        $collection->findThe(Thing::named('Bar'));
    }
}
