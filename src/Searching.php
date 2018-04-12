<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function array_search;
use function in_array;
use function is_object;
use Stratadox\Collection\Collection;
use Stratadox\Collection\NotFound;

/**
 * Behaviour to allow "searching" the immutable collection.
 *
 * Provides access to searching behaviour in the form of methods that
 * return information on the existence or position of the items in the
 * original collection.
 *
 * @package Stratadox\Collection
 * @author  Stratadox
 */
trait Searching
{
    /**
     * @see Searchable::has()
     * @param mixed $item
     * @return bool
     */
    public function has($item): bool
    {
        return $this->positionOf($item) !== false;
    }

    /**
     * @see Searchable::hasThe()
     * @param object $object
     * @return bool
     */
    public function hasThe($object): bool
    {
        return in_array($object, $this->items(), true);
    }

    /**
     * @see Searchable::find()
     * @param mixed $item
     * @return int
     * @throws NotFound
     */
    public function find($item): int
    {
        $position = $this->positionOf($item);
        $this->mustBeValid($position, $item);
        return $position;
    }

    /**
     * @see Searchable::findThe()
     * @param object $object
     * @return int
     * @throws NotFound
     */
    public function findThe($object): int
    {
        $position = array_search($object, $this->items(), true);
        $this->mustBeValid($position, $object);
        return $position;
    }

    /**
     * @param mixed $item The item we're looking for.
     * @return int|bool   The position or false.
     */
    private function positionOf($item)
    {
        if (is_object($item)) {
            return array_search($item, $this->items(), false);
        }
        return array_search($item, $this->items(), true);
    }

    /**
     * @param int|bool $position            The position or false.
     * @param mixed    $whatWeAreLookingFor The item we're looking for.
     * @throws NotFound                     When the position is false.
     */
    private function mustBeValid($position, $whatWeAreLookingFor): void
    {
        if ($position === false) {
            /** @var Collection $this */
            throw NoSuchValue::couldNotFind($this, $whatWeAreLookingFor);
        }
    }

    /** @see Collection::items() */
    abstract public function items(): array;
}
