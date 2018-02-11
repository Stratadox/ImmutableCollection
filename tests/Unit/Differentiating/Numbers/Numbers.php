<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Differentiating\Numbers;

use Stratadox\Collection\Differentiable;
use Stratadox\ImmutableCollection\Differentiating;
use Stratadox\ImmutableCollection\ImmutableCollection;

class Numbers extends ImmutableCollection implements Differentiable
{
    use Differentiating;

    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}
