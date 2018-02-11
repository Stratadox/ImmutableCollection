<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test;

use PHPUnit\Framework\TestCase;
use StdClass;
use Stratadox\ImmutableCollection\Test\Unit\Merging\Stubs\ExtClass;
use Stratadox\ImmutableCollection\Test\Unit\Merging\Stubs\ExtCollection;
use Stratadox\ImmutableCollection\Test\Unit\Merging\Stubs\StdCollection;
use Stratadox\ImmutableCollection\Test\Unit\Merging\Numbers\MergeableNumbers;
use Stratadox\ImmutableCollection\Test\Unit\Merging\Numbers\FlaggedNumbers;
use TypeError;

/**
 * @covers \Stratadox\ImmutableCollection\Merging
 * @covers \Stratadox\ImmutableCollection\ImmutableCollection
 */
class Merging_multiple_collections extends TestCase
{
    /** @test */
    function merging_different_collections_of_compatible_types()
    {
        $stdObject = new StdClass;
        $extObject = new ExtClass;

        $stdObjects = new StdCollection($stdObject);
        $extObjects = new ExtCollection($extObject);

        $merged = $stdObjects->merge($extObjects);

        $this->assertSame([$stdObject, $extObject], $merged->items());
    }

    /** @test */
    function the_merging_class_defines_the_compatibility_rules()
    {
        $stdObject = new StdClass;
        $extObject = new ExtClass;

        $stdObjects = new StdCollection($stdObject);
        $extObjects = new ExtCollection($extObject);

        $this->expectException(TypeError::class);

        $extObjects->merge($stdObjects);
    }

    /** @test */
    function merging_collections_does_not_mutate_the_original_collections()
    {
        $original = new MergeableNumbers(1, 2, 3);
        $other = new MergeableNumbers(4, 5, 6);

        $merged = $original->merge($other);

        $this->assertSame([1, 2, 3, 4, 5, 6], $merged->items());
        $this->assertSame([1, 2, 3], $original->items());
        $this->assertSame([4, 5, 6], $other->items());
    }

    /** @test */
    function merging_collections_preserves_the_boolean_flag_of_the_merging_collection()
    {
        $numbers = new FlaggedNumbers(true, 1, 2, 3);
        $otherNumbers = new FlaggedNumbers(false, 4, 5, 6);

        $numbers = $numbers->merge($otherNumbers);

        $this->assertTrue($numbers->flagged());
    }

    /** @test */
    function cannot_merge_collections_of_incompatible_types()
    {
        $original = new MergeableNumbers(1, 2, 3);
        $other = new StdCollection(new StdClass, new StdClass);

        $this->expectException(TypeError::class);

        $original->merge($other);
    }
}
