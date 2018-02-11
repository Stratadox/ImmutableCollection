<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use BadMethodCallException;
use function count;
use function get_class;
use function sprintf;
use Stratadox\Collection\Collection;
use Stratadox\Collection\NotAllowed;

/**
 * Exception to notify the client code that the collection may not be mutated.
 *
 * Although an immutable collection may provide functions to allow altering its
 * state, such methods will yield an altered copy instead of mutating the
 * original.
 * Some built-in syntax, ie.
 * ```php
 * unset($collection[$position])
 * ```
 * or
 * ```php
 * $collection[$position] = $newValue;
 * ```
 * would mutate the internal state if allowed. This exception is thrown to
 * prevent such mutating behaviour.
 *
 * @package Stratadox\Collection
 * @author Stratadox
 */
class CannotAlterCollection extends BadMethodCallException implements NotAllowed
{
    /**
     * Indicates that this append operation is not allowed.
     *
     * @param Collection $collection The collection that may not be mutated.
     * @return NotAllowed            The exception object.
     */
    public static function byAddingTo(Collection $collection) : NotAllowed
    {
        return new static(sprintf(
            'Cannot add to the immutable collection `%s`. ',
            get_class($collection)
        ));
    }

    /**
     * Indicates that this write operation is not allowed.
     *
     * @param Collection $collection The collection that may not be mutated.
     * @param int        $index      The index that will not be overwritten.
     * @return NotAllowed            The exception object.
     */
    public static function byOverWriting(Collection $collection, int $index) : NotAllowed
    {
        return new static(sprintf(
            'Cannot write to the immutable collection `%s`. '.
            '(Tried writing to position %d).',
            get_class($collection),
            $index
        ));
    }

    /**
     * Indicates that this unset operation is not allowed.
     *
     * @param Collection $collection The collection that may not be mutated.
     * @param int        $index      The index that will not be removed.
     * @return NotAllowed            The exception object.
     */
    public static function byRemoving(Collection $collection, int $index) : NotAllowed
    {
        return new static(sprintf(
            'Cannot alter the immutable collection `%s`. '.
            '(Tried to unset position %d).',
            get_class($collection),
            $index
        ));
    }

    /**
     * Indicates that this resize operation is not allowed.
     *
     * @param Collection $collection The collection that may not be mutated.
     * @param int        $size       The size that will not be assigned.
     * @return NotAllowed            The exception object.
     */
    public static function byResizingTo(Collection $collection, int $size) : NotAllowed
    {
        return new static(sprintf(
            'Cannot directly resize the immutable collection `%s`. '.
            '(Tried to resize from %d to %d).',
            get_class($collection),
            count($collection),
            $size
        ));
    }
}
