<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\ClosureSearching\Things;

use Stratadox\Collection\ClosureSearchable;
use Stratadox\ImmutableCollection\ClosureSearching;
use Stratadox\ImmutableCollection\ImmutableCollection;

class Things extends ImmutableCollection implements ClosureSearchable
{
    use ClosureSearching;

    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
