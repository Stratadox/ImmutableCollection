<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Imploding\Things;

use Stratadox\Collection\Implodable;
use Stratadox\ImmutableCollection\Imploding;
use Stratadox\ImmutableCollection\ImmutableCollection;

class Things extends ImmutableCollection implements Implodable
{
    use Imploding;

    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
