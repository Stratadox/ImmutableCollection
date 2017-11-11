<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_search;
use Stratadox\Collection\Collection;
use Stratadox\Collection\NotFound;

trait Searching
{
    /** @see Searchable::has() */
    public function has($item) : bool
    {
        return $this->positionOf($item) !== false;
    }

    /** @see Searchable::hasThe() */
    public function hasThe($object) : bool
    {
        return array_search($object, $this->items(), true) !== false;
    }

    /** @see Searchable::find() */
    public function find($item) : int
    {
        $position = $this->positionOf($item);
        $this->mustBeValid($position, $item);
        return $position;
    }

    /** @see Searchable::findThe() */
    public function findThe($object) : int
    {
        $position = array_search($object, $this->items(), true);
        $this->mustBeValid($position, $object);
        return $position;
    }

    /** @return int|bool */
    private function positionOf($item)
    {
        if (is_object($item)) {
            return array_search($item, $this->items());
        }
        return array_search($item, $this->items(), true);
    }

    /** @throws NotFound */
    private function mustBeValid($position, $whatWeAreLookingFor) : void
    {
        if ($position === false) {
            /** @var Collection $this */
            throw NoSuchValue::couldNotFind($this, $whatWeAreLookingFor);
        }
    }

    /** @see Collection::items() */
    abstract public function items() : array;
}
