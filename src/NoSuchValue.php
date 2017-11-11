<?php

namespace Stratadox\ImmutableCollection;

use function get_class;
use function sprintf;
use Stratadox\Collection\Collection;
use Stratadox\Collection\NotFound;
use UnexpectedValueException;
use function var_export;

class NoSuchValue extends UnexpectedValueException implements NotFound
{
    public static function couldNotFind(Collection $collection, $theValue) : NotFound
    {
        return new static(sprintf(
            'Could not find %s in %s',
            var_export($theValue, true),
            get_class($collection)
        ));
    }
}
