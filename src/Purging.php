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
 * @author  Stratadox
 */
trait Purging
{
    /**
     * @see Purgeable::delete()
     * @param int $index
     * @return static
     */
    public function delete(int $index)
    {
        $items = $this->items();
        unset($items[$index]);
        return $this->newCopy($items);
    }

    /**
     * @see Purgeable::remove()
     * @param mixed ...$itemsToRemove
     * @return static
     */
    public function remove(...$itemsToRemove)
    {
        return $this->newCopy(array_filter(
            $this->items(),
            function ($item) use ($itemsToRemove) {
                return !in_array($item, $itemsToRemove, true);
            }
        ));
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