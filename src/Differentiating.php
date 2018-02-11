<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use Stratadox\Collection\Collection;
use Stratadox\Collection\Differentiable;

/**
 * Behaviour to find the difference between multiple collections.
 *
 * Provides access to differentiating behaviour in the form of a method that
 * returns a modified copy of the original (immutable) collection with all
 * values omitted that also appear in one of the other collections.
 *
 * @package Stratadox\Collection
 * @author Stratadox
 */
trait Differentiating
{
    /**
     * @param Collection[] ...$others
     * @return Differentiable|static
     */
    public function differenceBetween(Collection ...$others) : Differentiable
    {
        return $this->newCopy(array_filter(
            $this->items(),
            function ($item) use ($others) : bool
            {
                foreach ($others as $otherCollection) {
                    if (in_array($item, $otherCollection->items())) {
                        return false;
                    }
                }
                return true;
            }
        ));
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