<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Filtering\Numbers;

use Stratadox\Collection\Filterable;
use Stratadox\ImmutableCollection\Filtering;
use Stratadox\ImmutableCollection\ImmutableCollection;

class Numbers extends ImmutableCollection implements Filterable
{
    use Filtering;

    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}
