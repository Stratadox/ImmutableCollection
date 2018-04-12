<?php
declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use Closure;
use Stratadox\Collection\ClosureSearchable;
use Stratadox\Collection\NotFound;

trait ClosureSearching
{
    /**
     * @see ClosureSearchable::findOneWith()
     * @throws NotFound
     * @param Closure $function
     * @return mixed|object
     */
    public function findOneWith(Closure $function)
    {
        foreach ($this->items() as $item) {
            if ($function->call($item, $item)) {
                return $item;
            }
        }
    }

    /**
     * @see ClosureSearchable::findOneWith()
     * @param Closure $function
     * @return bool
     */
    public function checkWith(Closure $function): bool
    {
        foreach ($this->items() as $item) {
            if ($function->call($item, $item)) {
                return true;
            }
        }
        return false;
    }

    /** @see Collection::items() */
    abstract public function items(): array;
}
