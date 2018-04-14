<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use Stratadox\Collection\Collection;
use Stratadox\Collection\ConversionFailed;
use Stratadox\Collection\Implodable;
use Throwable;

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
     * @throws ConversionFailed
     */
    public function implode($glue = ', '): string
    {
        try {
            return implode($glue, $this->items());
        } catch (Throwable $exception) {
            /** @var Collection $this */
            throw CouldNotImplode::encountered($this, $exception);
        }
    }

    /** @see Collection::items() */
    abstract public function items(): array;
}
