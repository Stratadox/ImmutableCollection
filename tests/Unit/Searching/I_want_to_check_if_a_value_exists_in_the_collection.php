<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Numbers\SearchableNumbers;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Things\SearchableThings;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Things\Thing;

class I_want_to_check_if_a_value_exists_in_the_collection extends TestCase
{
    /** @scenario */
    function checking_if_a_value_exists()
    {
        $collection = new SearchableNumbers(1, 2, 25);

        $this->assertTrue($collection->has(2));
        $this->assertFalse($collection->has(3));
    }

    /** @scenario */
    function value_checking_uses_strict_typing()
    {
        $collection = new SearchableNumbers(1, 2, 25);

        $this->assertFalse($collection->has('2'));
    }

    /** @scenario */
    function checking_for_objects_goes_by_value_by_default()
    {
        $foo = Thing::named('Foo');
        $collection = new SearchableThings($foo);

        $this->assertTrue($collection->has($foo));
        $this->assertTrue($collection->has(Thing::named('Foo')));
        $this->assertFalse($collection->has(Thing::named('Bar')));
    }

    /** @scenario */
    function checking_for_objects_goes_by_reference_if_desired()
    {
        $foo = Thing::named('Foo');
        $collection = new SearchableThings($foo);

        $this->assertTrue($collection->hasThe($foo));
        $this->assertFalse($collection->hasThe(Thing::named('Foo')));
        $this->assertFalse($collection->hasThe(Thing::named('Bar')));
    }
}
