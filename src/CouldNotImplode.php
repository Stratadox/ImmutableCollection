<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function get_class as theClassOf;
use RuntimeException;
use function sprintf as withMessage;
use Stratadox\Collection\Collection;
use Stratadox\Collection\ConversionFailed;
use Throwable;

final class CouldNotImplode extends RuntimeException implements ConversionFailed
{
    public static function encountered(
        Collection $theCollection,
        Throwable $exception
    ): ConversionFailed {
        return new CouldNotImplode(withMessage(
            'Could not implode the `%s` class: %s',
            theClassOf($theCollection),
            $exception->getMessage()
        ));
    }
}
