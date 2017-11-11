<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Reducing\Numbers;

use Stratadox\Collection\Reducible;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Reducing;

class Numbers extends ImmutableCollection implements Reducible
{
    use Reducing;

    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}
