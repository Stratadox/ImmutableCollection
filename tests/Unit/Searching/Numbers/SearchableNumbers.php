<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Searching\Numbers;

use Stratadox\Collection\Searchable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Searching;

class SearchableNumbers extends ImmutableCollection implements Searchable
{
    use Searching;

    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}
