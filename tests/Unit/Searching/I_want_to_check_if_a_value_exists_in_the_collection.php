<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Numbers\Numbers;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Things\Things;
use Stratadox\ImmutableCollection\Test\Unit\Searching\Things\Thing;

class I_want_to_check_if_a_value_exists_in_the_collection extends TestCase
{
    /** @test */
    function checking_if_a_value_exists()
    {
        $collection = new Numbers(1, 2, 25);

        $this->assertTrue($collection->has(2));
        $this->assertFalse($collection->has(3));
    }

    /** @test */
    function value_checking_uses_strict_typing()
    {
        $collection = new Numbers(1, 2, 25);

        $this->assertFalse($collection->has('2'));
    }

    /** @test */
    function checking_for_objects_goes_by_value_by_default()
    {
        $foo = Thing::named('Foo');
        $collection = new Things($foo);

        $this->assertTrue($collection->has($foo));
        $this->assertTrue($collection->has(Thing::named('Foo')));
        $this->assertFalse($collection->has(Thing::named('Bar')));
    }

    /** @test */
    function checking_for_objects_goes_by_reference_if_desired()
    {
        $foo = Thing::named('Foo');
        $collection = new Things($foo);

        $this->assertTrue($collection->hasThe($foo));
        $this->assertFalse($collection->hasThe(Thing::named('Foo')));
        $this->assertFalse($collection->hasThe(Thing::named('Bar')));
    }
}
