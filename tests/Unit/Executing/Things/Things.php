<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Executing\Things;

use Stratadox\Collection\Executable;
use Stratadox\ImmutableCollection\Executing;
use Stratadox\ImmutableCollection\ImmutableCollection;

class Things extends ImmutableCollection implements Executable
{
    use Executing;

    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
