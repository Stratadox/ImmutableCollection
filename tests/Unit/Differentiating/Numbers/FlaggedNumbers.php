<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Differentiating\Numbers;


use Stratadox\Collection\Collection;
use Stratadox\Collection\Differentiable;
use Stratadox\ImmutableCollection\Differentiating;
use Stratadox\ImmutableCollection\ImmutableCollection;

class FlaggedNumbers extends ImmutableCollection implements Differentiable
{
    use Differentiating;

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
