<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use Stratadox\Collection\Collection;
use Stratadox\Collection\Differentiable;

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

    /**
     * @see Collection::items()
     * @return array The items in the collection.
     */
    abstract public function items() : array;

    /**
     * @see ImmutableCollection::newCopy()
     * @param array $items       The items to include in the new copy.
     * @return Collection|static The altered copy.
     */
    abstract protected function newCopy(array $items) : Collection;
}