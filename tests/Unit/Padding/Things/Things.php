<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Padding\Thing;

use Stratadox\Collection\Paddable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Padding;

class Things extends ImmutableCollection implements Paddable
{
    use Padding;

    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
