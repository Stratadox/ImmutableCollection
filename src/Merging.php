<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_merge;
use Stratadox\Collection\Collection;
use Stratadox\Collection\Mergeable;

/**
 * Behaviour to allow "merging" the immutable collection.
 *
 * Provides access to merging behaviour in the form of a method that
 * returns a modified copy of the original (immutable) collection.
 *
 * @package Stratadox\Collection
 * @author Stratadox
 */
trait Merging
{
    /**
     * @return Mergeable|static
     * @see Mergeable::merge()
     */
    public function merge(Collection $other) : Mergeable
    {
        return $this->newCopy(array_merge($this->items(), $other->items()));
    }

    /**
     * @see Collection::items()
     */
    abstract public function items() : array;

    /**
     * @return Collection|static
     * @see ImmutableCollection::newCopy()
     */
    abstract protected function newCopy(array $items) : Collection;
}
