<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Filtering\Things;

use Stratadox\Collection\Filterable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Filtering;

class FilterableThings extends ImmutableCollection implements Filterable
{
    use Filtering;

    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
