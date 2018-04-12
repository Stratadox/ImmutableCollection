<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use function count;
use function is_null;
use SplFixedArray;
use Stratadox\Collection\Collection;
use Stratadox\Collection\NotAllowed;

/**
 * Immutable implementation of the @see Collection interface.
 *
 * Extends the SplFixedArray class (rather than keeping a private array property)
 * because it is faster, less memory consuming and truly immutable.
 * Methods that would have provided mutability to the SplFixedArray class are
 * overwritten and finalised, thus prohibiting set, unset and resize operations.
 * This way, neither an inheritance nor reflection can mutate the data.
 *
 * @package Stratadox\Collection
 * @author  Stratadox
 */
abstract class ImmutableCollection extends SplFixedArray implements Collection
{
    /**
     * Make a new immutable collection.
     *
     * @param array ...$ofTheItems The items to use.
     */
    public function __construct(...$ofTheItems)
    {
        parent::__construct(count($ofTheItems));

        foreach ($ofTheItems as $thePosition => $theItem) {
            parent::offsetSet($thePosition, $theItem);
        }
    }

    /**
     * Imports a collection from an array.
     *
     * @param array     $array        The array to import.
     * @param bool|null $save_indexes Ignored parameter.
     * @return self|static
     */
    final public static function fromArray($array, $save_indexes = null): self
    {
        return new static(...$array);
    }

    /**
     * Disallows use of the offsetSet method.
     *
     * @param int|mixed $index The index that may not be mutated.
     * @param mixed     $value The value that will not be written.
     * @throws NotAllowed      Whenever called upon.
     */
    final public function offsetSet($index, $value): void
    {
        if (is_null($index)) {
            throw CannotAlterCollection::byAddingTo($this);
        }
        throw CannotAlterCollection::byOverWriting($this, $index);
    }

    /**
     * Disallows use of the offsetUnset method.
     *
     * @param int|mixed $index The index that may not be unset.
     * @throws NotAllowed      Whenever called upon.
     */
    final public function offsetUnset($index): void
    {
        throw CannotAlterCollection::byRemoving($this, $index);
    }

    /**
     * Disallows use of the setSize method.
     *
     * @param int $size   The new size that will not be assigned.
     * @return bool       In case false === true.
     * @throws NotAllowed Whenever called upon.
     */
    final public function setSize($size): bool
    {
        throw CannotAlterCollection::byResizingTo($this, $size);
    }

    /**
     * Yields an array copy of the collection.
     *
     * @return array An array representation of the items in the collection.
     */
    public function items(): array
    {
        return $this->toArray();
    }

    /**
     * Produces a new copy of this collection, using a new set of values.
     *
     * @param array $items       The items to include in the new copy.
     * @return Collection|static The altered copy.
     */
    protected function newCopy(array $items): Collection
    {
        return new static(...$items);
    }
}
