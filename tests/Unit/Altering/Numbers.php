<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Altering;

use Stratadox\Collection\Alterable;
use Stratadox\ImmutableCollection\Altering;
use Stratadox\ImmutableCollection\ImmutableCollection;

class Numbers extends ImmutableCollection implements Alterable
{
    use Altering;

    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}
