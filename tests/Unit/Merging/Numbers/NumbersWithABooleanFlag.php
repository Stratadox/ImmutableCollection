<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Merging\Numbers;

use Stratadox\Collection\Collection;
use Stratadox\Collection\Mergeable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Merging;

class NumbersWithABooleanFlag extends ImmutableCollection implements Mergeable
{
    use Merging;

    private $flag;

    public function __construct(bool $flag, int ...$items)
    {
        $this->flag = $flag;
        parent::__construct(...$items);
    }

    public function flagged() : bool
    {
        return $this->flag;
    }

    protected function newCopy(array $items) : Collection
    {
        return new static($this->flag, ...$items);
    }
}
