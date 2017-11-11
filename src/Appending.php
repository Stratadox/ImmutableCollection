<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_merge;
use Stratadox\Collection\Appendable;
use Stratadox\Collection\Collection;

trait Appending
{
    /**
     * @return Appendable|static
     * @see Appendable::add()
     */
    public function add(...$newItems) : Appendable
    {
        return $this->newCopy(array_merge($this->items(), $newItems));
    }

    /**
     * @see Collection::items()
     */
    abstract public function items() : array;

    /**
     * @return Collection|static
     * @see ImmutableCollection::newCopy()
     */
    abstract protected function newCopy(array $items) : Collection;
}
