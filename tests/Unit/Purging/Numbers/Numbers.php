<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Purging\Numbers;

use Stratadox\Collection\Purgeable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Purging;

class Numbers extends ImmutableCollection implements Purgeable
{
    use Purging;

    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}
