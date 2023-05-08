<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\JsonSerializing\Things;

use JsonSerializable;

class Thing implements JsonSerializable
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

    function jsonSerialize(): array
    {
        return ['name' => $this->name];
    }
}
