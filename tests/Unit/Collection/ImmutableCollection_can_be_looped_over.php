<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Collection\Stubs\SimpleCollection;

/**
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class ImmutableCollection_can_be_looped_over extends TestCase
{
    /** @test */
    function sum_the_collection_using_a_foreach_loop()
    {
        $sum = 0;

        foreach (new SimpleCollection(1, 2, 3, 4) as $item) {
            $sum += $item;
        }

        $this->assertSame(10, $sum);
    }

    /** @test */
    function concatenate_the_text_in_the_collection()
    {
        $message = '';

        foreach (new SimpleCollection('Hello', 'dear', 'world') as $item) {
            $message .= $item . ' ';
        }

        $this->assertSame('Hello dear world ', $message);
    }
}
