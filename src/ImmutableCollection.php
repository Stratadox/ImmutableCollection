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
 * @author Stratadox
 */
abstract class ImmutableCollection extends SplFixedArray implements Collection
{
    public function __construct(...$ofTheItems)
    {
        parent::__construct(count($ofTheItems));

        foreach ($ofTheItems as $thePosition => $theItem) {
            parent::offsetSet($thePosition, $theItem);
        }
    }

    final public static function fromArray($array, $save_indexes = null)
    {
        return new static(...$array);
    }

    /** @throws NotAllowed */
    final public function offsetSet($index, $value)
    {
        if (is_null($index)) {
            throw CannotAlterCollection::byAddingTo($this);
        }
        throw CannotAlterCollection::byOverWriting($this, $index);
    }

    /** @throws NotAllowed */
    final public function offsetUnset($index)
    {
        throw CannotAlterCollection::byRemoving($this, $index);
    }

    /** @throws NotAllowed */
    final public function setSize($size)
    {
        throw CannotAlterCollection::byResizingTo($this, $size);
    }

    public function items() : array
    {
        return $this->toArray();
    }

    protected function newCopy(array $items) : Collection
    {
        return new static(...$items);
    }
}
