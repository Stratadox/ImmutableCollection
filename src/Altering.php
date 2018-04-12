<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use Stratadox\Collection\Alterable;
use Stratadox\Collection\Collection;

/**
 * Behaviour to allow "altering" the immutable collection.
 *
 * Provides access to update and delete behaviour in the form of methods that
 * return a modified copy of the original (immutable) collection.
 *
 * @package Stratadox\Collection
 * @author  Stratadox
 */
trait Altering
{
    /**
     * @see Alterable::change()
     * @param int   $index
     * @param mixed $newItem
     * @return Alterable|static
     */
    public function change(int $index, $newItem): Alterable
    {
        $items = $this->items();
        $items[$index] = $newItem;
        return $this->newCopy($items);
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
