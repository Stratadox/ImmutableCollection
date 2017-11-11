<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Merging\Double;

use StdClass;
use Stratadox\Collection\Mergeable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Merging;

class StdCollection extends ImmutableCollection implements Mergeable
{
    use Merging;

    public function __construct(StdClass ...$items)
    {
        parent::__construct(...$items);
    }
}
