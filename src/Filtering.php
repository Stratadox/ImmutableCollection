<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_filter;
use Stratadox\Collection\Collection;
use Stratadox\Collection\Filterable;
use Stratadox\Specification\Contract\Satisfiable;

trait Filtering
{
    /**
     * @return Filterable|static
     * @see Filterable::that
     */
    public function that(Satisfiable $condition) : Filterable
    {
        return $this->newCopy(array_filter(
            $this->items(), [$condition, 'isSatisfiedBy']
        ));
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
