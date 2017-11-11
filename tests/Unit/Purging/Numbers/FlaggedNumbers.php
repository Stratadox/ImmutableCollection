<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Purging\Numbers;

use Stratadox\Collection\Collection;
use Stratadox\Collection\Purgeable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Purging;

class FlaggedNumbers extends ImmutableCollection implements Purgeable
{
    use Purging;

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
