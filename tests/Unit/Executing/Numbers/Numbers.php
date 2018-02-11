<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Executing\Numbers;

use Stratadox\Collection\Executable;
use Stratadox\ImmutableCollection\Executing;
use Stratadox\ImmutableCollection\ImmutableCollection;

class Numbers extends ImmutableCollection implements Executable
{
    use Executing;

    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}
