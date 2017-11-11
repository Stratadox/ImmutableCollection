<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use BadMethodCallException;
use function count;
use function get_class;
use function sprintf;
use Stratadox\Collection\Collection;
use Stratadox\Collection\NotAllowed;

class CannotAlterCollection extends BadMethodCallException implements NotAllowed
{
    public static function byAddingTo(Collection $collection) : NotAllowed
    {
        return new static(sprintf(
            'Cannot add to the immutable collection `%s`. ',
            get_class($collection)
        ));
    }

    public static function byOverWriting(Collection $collection, int $index) : NotAllowed
    {
        return new static(sprintf(
            'Cannot write to the immutable collection `%s`. '.
            '(Tried writing to position %d).',
            get_class($collection),
            $index
        ));
    }

    public static function byRemoving(Collection $collection, int $index) : NotAllowed
    {
        return new static(sprintf(
            'Cannot alter the immutable collection `%s`. '.
            '(Tried to unset position %d).',
            get_class($collection),
            $index
        ));
    }

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
