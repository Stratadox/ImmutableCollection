<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Reducing\Calculator;

use Stratadox\Collection\Reducible;
use Stratadox\ImmutableCollection\ImmutableCollection;
use Stratadox\ImmutableCollection\Reducing;

class Events extends ImmutableCollection implements Reducible
{
    use Reducing;

    public function __construct(Event ...$events)
    {
        parent::__construct(...$events);
    }
}
