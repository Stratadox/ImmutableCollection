<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Collection\SimpleCollection;

class I_want_to_count_the_items_in_the_collection extends TestCase
{
    /** @scenario */
    function counting_the_number_of_items_in_the_collection()
    {
        $this->assertSame(3, count(new SimpleCollection(10, 20, 30)));
    }
}
