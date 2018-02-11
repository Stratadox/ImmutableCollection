<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Differentiating\Things;

use Stratadox\Collection\Differentiable;
use Stratadox\ImmutableCollection\Differentiating;
use Stratadox\ImmutableCollection\ImmutableCollection;

class Things extends ImmutableCollection implements Differentiable
{
    use Differentiating;

    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
