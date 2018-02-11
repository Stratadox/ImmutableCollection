<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use Closure;
use Stratadox\Collection\Collection;
use Stratadox\Collection\Mappable;

trait Mapping
{
    /**
     * @see Mappable::map()
     * @param Closure $function
     * @return Mappable|static
     */
    public function map(Closure $function) : Mappable
    {
        return $this->newCopy(array_map($function, $this->items()));
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
