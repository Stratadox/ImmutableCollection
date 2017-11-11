<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Collection;

use Stratadox\ImmutableCollection\ImmutableCollection;

class Numbers extends ImmutableCollection
{
    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}
