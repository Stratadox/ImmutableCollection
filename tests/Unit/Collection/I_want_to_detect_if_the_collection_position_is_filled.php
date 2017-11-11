<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Stubs\SimpleCollection;

class I_want_to_detect_if_the_collection_position_is_filled extends TestCase
{
    /** @scenario */
    function using_isset_to_check_if_a_position_is_filled()
    {
        $collection = new SimpleCollection(0, 1, 2);

        $this->assertTrue(isset($collection[0]));
        $this->assertTrue(isset($collection[1]));
        $this->assertTrue(isset($collection[2]));
        $this->assertFalse(isset($collection[3]));
    }

    /** @scenario */
    function null_values_are_considered_filled()
    {
        $collection = new SimpleCollection(null, 1, 2);

        $this->assertTrue(isset($collection[0]));
        $this->assertTrue(isset($collection[1]));
        $this->assertTrue(isset($collection[2]));
        $this->assertFalse(isset($collection[3]));
    }
}
