<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_reduce;
use Closure;

trait Reducing
{
    /**
     * @see Reducible::reduce()
     * @see array_reduce
     */
    public function reduce(Closure $function, $initial = null)
    {
        return array_reduce($this->items(), $function, $initial);
    }

    /**
     * @see Collection::items()
     */
    abstract public function items() : array;
}
