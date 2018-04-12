<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_filter;
use Closure;
use Stratadox\Collection\Collection;
use Stratadox\Collection\Filterable;
use Stratadox\Specification\Contract\Satisfiable;

/**
 * Behaviour to allow "filtering" the immutable collection.
 *
 * Provides access to filtering behaviour in the form of a method that
 * returns a modified copy of the original (immutable) collection.
 *
 * @package Stratadox\Collection
 * @author  Stratadox
 */
trait Filtering
{
    /**
     * @see Filterable::that
     * @param Satisfiable $condition
     * @return Filterable|static
     */
    public function that(Satisfiable $condition): Filterable
    {
        return $this->newCopy(array_filter(
            $this->items(), [$condition, 'isSatisfiedBy']
        ));
    }

    /**
     * @see Filterable::filterWith
     * @param Closure $function
     * @return Filterable|static
     */
    public function filterWith(Closure $function): Filterable
    {
        return $this->newCopy(array_filter(
            $this->items(), $function
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
