<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function json_encode;
use Stratadox\Collection\Collection;
use Stratadox\Collection\ConversionFailed;
use Stratadox\Collection\JsonSerializable;
use Throwable;

/**
 * Behaviour to serialize the collection to json.
 *
 * Provides access to serialisation behaviour in the form of a method that
 * serializes the collection to a json-encoded string.
 *
 * @package Stratadox\Collection
 * @author  Stratadox
 */
trait JsonSerializing
{
    /**
     * @see JsonSerializable::json()
     * @return string
     * @throws ConversionFailed
     */
    public function json(): string
    {
        try {
            return json_encode($this->items());
        } catch (Throwable $exception) {
            /** @var Collection $this */
            throw CouldNotConvertToJson::encountered($this, $exception);
        }
    }

    /** @see Collection::items() */
    abstract public function items(): array;
}
