<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_reduce;
use Closure;

/**
 * Behaviour to allow "reducing" the immutable collection.
 *
 * Provides access to reduction behaviour in the form of a method that
 * returns a reduced value based on the original collection.
 *
 * @package Stratadox\Collection
 * @author Stratadox
 */
trait Reducing
{
    /**
     * @see Reducible::reduce()
     * @param Closure $function
     * @param mixed   $initial
     * @return mixed
     */
    public function reduce(Closure $function, $initial = null)
    {
        return array_reduce($this->items(), $function, $initial);
    }

    /** @see Collection::items() */
    abstract public function items() : array;
}
