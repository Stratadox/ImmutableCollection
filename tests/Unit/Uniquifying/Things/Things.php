<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Uniquifying\Things;

use Stratadox\Collection\Uniquifiable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Uniquifying;

class Things extends ImmutableCollection implements Uniquifiable
{
    use Uniquifying;

    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
