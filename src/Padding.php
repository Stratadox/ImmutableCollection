<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_pad;
use Stratadox\Collection\Collection;
use Stratadox\Collection\Paddable;

/**
 * Behaviour to pad the collection to match a certain size.
 *
 * Provides access to padding behaviour in the form of two methods that pad the
 * collection on either the left or the right side.
 *
 * @package Stratadox\Collection
 * @author  Stratadox
 */
trait Padding
{
    /**
     * @see Paddable::padRight()
     * @param int   $amount
     * @param mixed $value
     * @return static
     */
    public function padRight(int $amount, $value)
    {
        return $this->newCopy(array_pad($this->items(), $amount, $value));
    }

    /**
     * @see Paddable::padLeft()
     * @param int   $amount
     * @param mixed $value
     * @return static
     */
    public function padLeft(int $amount, $value)
    {
        return $this->newCopy(array_pad($this->items(), -$amount, $value));
    }

    /** @see Collection::items() */
    abstract public function items(): array;

    /**
     * @see ImmutableCollection::newCopy()
     * @param array $items
     * @return Collection|static
     */
    abstract protected function newCopy(array $items): Collection;
}
