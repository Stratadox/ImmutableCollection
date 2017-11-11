<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Merging\Stubs;

use Stratadox\Collection\Mergeable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Merging;

class ExtCollection extends ImmutableCollection implements Mergeable
{
    use Merging;

    public function __construct(ExtClass ...$items)
    {
        parent::__construct(...$items);
    }
}
