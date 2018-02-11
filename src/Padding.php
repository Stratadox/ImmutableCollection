<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_pad;
use Stratadox\Collection\Collection;
use Stratadox\Collection\Paddable;

trait Padding
{
    /**
     * @see Paddable::padRight()
     * @param int $amount
     * @param mixed $value
     * @return Paddable|static
     */
    public function padRight(int $amount, $value) : Paddable
    {
        return $this->newCopy(array_pad($this->items(), $amount, $value));
    }

    /**
     * @see Paddable::padLeft()
     * @param int $amount
     * @param mixed $value
     * @return Paddable|static
     */
    public function padLeft(int $amount, $value) : Paddable
    {
        return $this->newCopy(array_pad($this->items(), -$amount, $value));
    }

    /** @see Collection::items() */
    abstract public function items() : array;

    /**
     * @see ImmutableCollection::newCopy()
     * @param array $items
     * @return Collection|static
     */
    abstract protected function newCopy(array $items) : Collection;
}
