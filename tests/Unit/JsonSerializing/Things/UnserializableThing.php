<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\JsonSerializing\Things;

use Exception;

class UnserializableThing extends Thing
{
    function jsonSerialize()
    {
        throw new Exception('Exception message here.');
    }
}
