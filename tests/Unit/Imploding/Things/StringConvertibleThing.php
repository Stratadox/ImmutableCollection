<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Imploding\Things;

class StringConvertibleThing extends Thing
{
    public function __toString(): string
    {
        return $this->name();
    }
}
