<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_map;
use Closure;
use Stratadox\Collection\Collection;
use Stratadox\Collection\Mappable;

/**
 * Behaviour to map the collection according to a closure.
 *
 * Provides access to mapping behaviour in the form of a method that maps the
 * collection according to an anonymous function.
 *
 * @package Stratadox\Collection
 * @author  Stratadox
 */
trait Mapping
{
    /**
     * @see Mappable::map()
     * @param Closure $function
     * @return static
     */
    public function map(Closure $function)
    {
        return $this->newCopy(array_map($function, $this->items()));
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
