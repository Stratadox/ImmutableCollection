<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Merging\Numbers;

use Stratadox\Collection\Mergeable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Merging;

class MergeableNumbers extends ImmutableCollection implements Mergeable
{
    use Merging;

    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}
