<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function in_array;
use Stratadox\Collection\Collection;
use Stratadox\Collection\Uniquifiable;

trait Uniquifying
{
    /**
     * @see Uniquifiable::unique()
     * @return Uniquifiable|static
     */
    public function unique() : Uniquifiable
    {
        $items = [];
        foreach ($this as $item) {
            if (!in_array($item, $items)) {
                $items[] = $item;
            }
        }
        return new static(...$items);
    }

    /** @see Collection::items() */
    abstract public function items() : array;
}
