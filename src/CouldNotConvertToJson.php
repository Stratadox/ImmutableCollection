<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use RuntimeException;
use function sprintf;
use Stratadox\Collection\ConversionFailed;
use Throwable;

final class CouldNotConvertToJson extends RuntimeException implements ConversionFailed
{
    public static function encountered(Throwable $exception) : self
    {
        return new self(sprintf('Could not '));
    }
}
