<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use Stratadox\Collection\Implodable;

/**
 * Behaviour to implode the collection to a string.
 *
 * Provides access to serialisation behaviour in the form of a method that
 * serializes the collection to an imploded string.
 *
 * @package Stratadox\Collection
 * @author  Stratadox
 */
trait Imploding
{
    /**
     * @see Implodable::implode()
     * @return string
     */
    public function implode($glue = ', '): string
    {
        return implode($glue, $this->items());
    }

    /** @see Collection::items() */
    abstract public function items(): array;
}
