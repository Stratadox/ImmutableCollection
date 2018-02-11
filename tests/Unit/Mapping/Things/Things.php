<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Mapping\Thing;

use Stratadox\Collection\Mappable;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Mapping;

class Things extends ImmutableCollection implements Mappable
{
    use Mapping;

    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
