<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Padding\Thing;

class Thing
{
    private $name;

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }

    public static function named(string $name) : Thing
    {
        return new static($name);
    }

    public function name() : string
    {
        return $this->name;
    }
}
