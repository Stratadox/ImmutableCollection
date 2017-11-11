<?php

namespace Stratadox\ImmutableCollection;

use function array_filter;
use function in_array;
use Stratadox\Collection\Collection;
use Stratadox\Collection\Purgeable;

/**
 * Behaviour to allow "purging" the immutable collection.
 *
 * Provides access to purging behaviour in the form of methods that
 * return a modified copy of the original (immutable) collection.
 *
 * @package Stratadox\Collection
 * @author Stratadox
 */
trait Purging
{
    /**
     * @return Purgeable|static
     * @see Purgeable::delete()
     */
    public function delete(int $index) : Purgeable
    {
        $items = $this->items();
        unset($items[$index]);
        return $this->newCopy($items);
    }

    /**
     * @return Purgeable|static
     * @see Purgeable::remove()
     */
    public function remove(...$itemsToRemove) : Purgeable
    {
        return $this->newCopy(array_filter(
            $this->items(),
            function ($item) use ($itemsToRemove) {
                return !in_array($item, $itemsToRemove, true);
            }
        ));
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