<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Appending;


use Stratadox\Collection\Appendable;
use Stratadox\Collection\Collection;
use Stratadox\ImmutableCollection\Appending;
use Stratadox\ImmutableCollection\ImmutableCollection;

class NumbersWithABooleanFlag extends ImmutableCollection implements Appendable
{
    use Appending;

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
