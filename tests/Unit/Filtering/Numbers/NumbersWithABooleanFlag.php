<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Filtering\Numbers;

use Stratadox\Collection\Collection;
use Stratadox\Collection\Filterable;
use Stratadox\ImmutableCollection\Filtering;
use Stratadox\ImmutableCollection\ImmutableCollection;

class NumbersWithABooleanFlag extends ImmutableCollection implements Filterable
{
    use Filtering;

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
