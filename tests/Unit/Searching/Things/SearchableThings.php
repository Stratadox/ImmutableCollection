<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Searching\Things;

use Stratadox\Collection\Searchable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Searching;

class SearchableThings extends ImmutableCollection implements Searchable
{
    use Searching;

    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
