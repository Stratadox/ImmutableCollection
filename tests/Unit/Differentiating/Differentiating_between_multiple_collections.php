<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Differentiating;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\Differentiating\Numbers\FlaggedNumbers;
use Stratadox\ImmutableCollection\Test\Unit\Differentiating\Numbers\Numbers;
use Stratadox\ImmutableCollection\Test\Unit\Differentiating\Things\Thing;
use Stratadox\ImmutableCollection\Test\Unit\Differentiating\Things\Things;

/**
 * @covers \Stratadox\ImmutableCollection\Differentiating
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class Differentiating_between_multiple_collections extends TestCase
{
    /** @test */
    function difference_between_two_sets_of_numbers()
    {
        $numbers = new Numbers(1, 2, 3);
        $otherNumbers = new Numbers(3, 4, 5);

        $this->assertEquals(
            new Numbers(1, 2),
            $numbers->differenceBetween($otherNumbers)
        );
    }

    /** @test */
    function difference_between_three_sets_of_numbers()
    {
        $numbers = new Numbers(1, 2, 3, 10);
        $otherNumbers = new Numbers(3, 4, 5);
        $moreNumbers = new Numbers(-1, 0, 1);

        $this->assertEquals(
            new Numbers(2, 10),
            $numbers->differenceBetween($otherNumbers, $moreNumbers)
        );
    }

    /** @test */
    function difference_between_two_sets_of_things()
    {
        $things = new Things(
            Thing::named('Foo'),
            Thing::named('Bar'),
            Thing::named('Baz')
        );
        $otherThings = new Things(
            Thing::named('Foo'),
            Thing::named('Qux')
        );

        $this->assertEquals(
            new Things(
                Thing::named('Bar'),
                Thing::named('Baz')
            ),
            $things->differenceBetween($otherThings)
        );
    }

    /** @test */
    function keeping_the_flag_of_the_first_collection()
    {
        $numbers = new FlaggedNumbers(true, 1, 2, 3);
        $otherNumbers = new Numbers(3, 4, 5);

        $difference = $numbers->differenceBetween($otherNumbers);

        $this->assertTrue($difference->flagged());
    }
}
