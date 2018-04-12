<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function get_class as theClassOf;
use RuntimeException;
use function sprintf as withMessage;
use Stratadox\Collection\Collection;
use Stratadox\Collection\ConversionFailed;
use Throwable;

final class CouldNotConvertToJson extends RuntimeException implements ConversionFailed
{
    public static function encountered(
        Collection $theCollection,
        Throwable $exception
    ): ConversionFailed {
        return new CouldNotConvertToJson(withMessage(
            'Could not convert the `%s` class to json: %s',
            theClassOf($theCollection),
            $exception->getMessage()
        ), 0, $exception);
    }
}
