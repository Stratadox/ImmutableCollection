<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\JsonSerializing\Things;

use Exception;

class NonSerializableThing extends Thing
{
    function jsonSerialize(): array
    {
        throw new Exception('Exception message here.');
    }
}
