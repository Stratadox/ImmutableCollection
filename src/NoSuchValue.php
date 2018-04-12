<?php

namespace Stratadox\ImmutableCollection;

use function get_class;
use function sprintf;
use Stratadox\Collection\Collection;
use Stratadox\Collection\NotFound;
use Stratadox\Collection\Searchable;
use UnexpectedValueException;
use function var_export;

/**
 * Exception to notify the client code that the requested value does not exist.
 *
 * In order to prevent this exception from being thrown, client code can usually
 * implement a method like @see Searchable::has() to be certain that the value
 * actually exists.
 * When looking for an object by reference, use @see Searchable::hasThe() instead.
 *
 * @package Stratadox\Collection
 * @author  Stratadox
 */
class NoSuchValue extends UnexpectedValueException implements NotFound
{
    /**
     * @param Collection $collection The collection that does not have the item.
     * @param mixed      $theValue   The value that was not found.
     * @return NotFound              The exception object to throw.
     */
    public static function couldNotFind(Collection $collection, $theValue): NotFound
    {
        return new static(sprintf(
            'Could not find %s in %s',
            var_export($theValue, true),
            get_class($collection)
        ));
    }
}
