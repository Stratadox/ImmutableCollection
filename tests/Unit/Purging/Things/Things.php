<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Purging\Thing;

use Stratadox\Collection\Purgeable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Purging;

class Things extends ImmutableCollection implements Purgeable
{
    use Purging;

    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
