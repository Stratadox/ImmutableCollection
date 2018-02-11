<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\JsonSerializing\Things;

use Stratadox\Collection\JsonSerializable;
use Stratadox\ImmutableCollection\JsonSerializing;
use Stratadox\ImmutableCollection\ImmutableCollection;

class Things extends ImmutableCollection implements JsonSerializable
{
    use JsonSerializing;

    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
