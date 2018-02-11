<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use Stratadox\Collection\JsonSerializable;

trait JsonSerializing
{
    /**
     * @see JsonSerializable::json()
     * @return string
     */
    public function json() : string
    {
        return json_encode($this->items());
    }

    /** @see Collection::items() */
    abstract public function items() : array;
}
