<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_merge;
use Stratadox\Collection\Appendable;
use Stratadox\Collection\Collection;

/**
 * Behaviour to allow "appending" the immutable collection.
 *
 * Provides access to appending behaviour in the form of a method that
 * returns a modified copy of the original (immutable) collection.
 *
 * @package Stratadox\Collection
 * @author Stratadox
 */
trait Appending
{
    /**
     * @return Appendable|static
     * @see Appendable::add()
     */
    public function add(...$newItems) : Appendable
    {
        return $this->newCopy(array_merge($this->items(), $newItems));
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
