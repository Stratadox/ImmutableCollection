<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Searching\Numbers;

use Stratadox\Collection\Searchable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Searching;

class SearchableNonRestrictiveNumbers extends ImmutableCollection implements Searchable
{
    use Searching;
}
