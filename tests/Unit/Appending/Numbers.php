<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Appending;

use Stratadox\Collection\Appendable;
use Stratadox\ImmutableCollection\Appending;
use Stratadox\ImmutableCollection\ImmutableCollection;

class Numbers extends ImmutableCollection implements Appendable
{
    use Appending;

    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}
