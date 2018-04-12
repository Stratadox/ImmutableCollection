<?php
declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\ClosureSearching;

use PHPUnit\Framework\TestCase;
use Stratadox\ImmutableCollection\Test\Unit\ClosureSearching\Things\Thing;
use Stratadox\ImmutableCollection\Test\Unit\ClosureSearching\Things\Things;
use function strpos;

/**
 * @covers \Stratadox\ImmutableCollection\ClosureSearching
 * @covers \Stratadox\ImmutableCollection\NoSuchValue
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class Searching_for_values_using_a_Closure extends TestCase
{
    /** @var Things */
    private $things;

    protected function setUp(): void
    {
        $this->things = new Things(
            Thing::named('Foo'),
            Thing::named('Bar'),
            Thing::named('Baz')
        );
    }

    /** @test */
    function finding_the_first_item_for_which_the_closure_returns_true()
    {
        $this->assertEquals(
            Thing::named('Bar'),
            $this->things->findOneWith(function (Thing $toCheck): bool {
                return strpos($toCheck->name(), 'Ba') === 0;
            })
        );
    }

    /** @test */
    function checking_that_the_closure_returns_true_for_at_least_one_of_the_items()
    {
        $this->assertTrue(
            $this->things->checkWith(function (): bool {
                return true;
            })
        );
    }

    /** @test */
    function checking_that_the_closure_returns_true_for_none_of_the_items()
    {
        $this->assertFalse(
            $this->things->checkWith(function (): bool {
                return false;
            })
        );
    }
}
