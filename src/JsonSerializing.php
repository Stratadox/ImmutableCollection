<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use Stratadox\Collection\Collection;
use Stratadox\Collection\ConversionFailed;
use Stratadox\Collection\JsonSerializable;
use Throwable;

trait JsonSerializing
{
    /**
     * @see JsonSerializable::json()
     * @return string
     * @throws ConversionFailed
     */
    public function json() : string
    {
        try {
            return json_encode($this->items());
        } catch (Throwable $exception) {
            /** @var Collection $this */
            throw CouldNotConvertToJson::encountered($this, $exception);
        }
    }

    /** @see Collection::items() */
    abstract public function items() : array;
}
