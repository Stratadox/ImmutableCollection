<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Collection\Collection;
use Stratadox\ImmutableCollection\Test\Unit\Filtering\Numbers\AreLargerThan;
use Stratadox\ImmutableCollection\Test\Unit\Filtering\Numbers\Numbers;
use Stratadox\ImmutableCollection\Test\Unit\Filtering\Numbers\FlaggedNumbers;
use Stratadox\ImmutableCollection\Test\Unit\Filtering\Things\FilterableThings;
use Stratadox\ImmutableCollection\Test\Unit\Filtering\Things\HaveANameStartingWith;
use Stratadox\ImmutableCollection\Test\Unit\Filtering\Things\Thing;

class I_want_to_filter_the_collection extends TestCase
{
    /** @test */
    function filtering_numbers_larger_than_2()
    {
        $numbers = new Numbers(1, 2, 3, 4, 5);

        $this->assertEquals(
            new Numbers(3, 4, 5),
            $numbers->that(AreLargerThan::theNumber(2))
        );
    }

    /** @test */
    function filtering_numbers_preserves_my_boolean_flag()
    {
        $numbers = new FlaggedNumbers(true, 1, 2, 3, 4, 5);

        $numbers = $numbers->that(AreLargerThan::theNumber(2));

        $this->assertTrue($numbers->flagged());
    }

    /**
     * @dataProvider startingWith
     * @scenario
     */
    function filtering_by_HaveANameStartingWith_specification(
        string $filterText,
        Collection $thingsThatActuallyStartWithThatText
    ) {
        $things = new FilterableThings(
            new Thing('one'),
            new Thing('two'),
            new Thing('three')
        );

        $this->assertEquals(
            $thingsThatActuallyStartWithThatText,
            $things->that(HaveANameStartingWith::theText($filterText))
        );
    }

    public function startingWith() : array
    {
        return [
            'Starting with "h"' => ['h',
                new FilterableThings()
            ],
            'Starting with "o"' => ['o',
                new FilterableThings(
                    new Thing('one')
                )
            ],
            'Starting with "t"' => ['t',
                new FilterableThings(
                    new Thing('two'),
                    new Thing('three')
                )
            ],
        ];
    }
}
