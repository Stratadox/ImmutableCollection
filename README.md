# ImmutableCollection

[![Build Status](https://travis-ci.org/Stratadox/ImmutableCollection.svg?branch=master)](https://travis-ci.org/Stratadox/ImmutableCollection)
[![Coverage Status](https://coveralls.io/repos/github/Stratadox/ImmutableCollection/badge.svg?branch=master)](https://coveralls.io/github/Stratadox/ImmutableCollection?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Stratadox/ImmutableCollection/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Stratadox/ImmutableCollection/?branch=master)

Immutable implementation of the Collection interface.

Provides an abstract ImmutableCollection class, which extends (and restricts)
the SplFixedArray class, as well as several traits with behavioural logic for
(derived) immutable collection classes.

## Why use this

Regular php "arrays" are not really arrays at all, but sorted hash maps.
They are not objects, they are not thread safe and they cannot guard their own 
invariants.

Although sorted hash maps are a versatile data structure that can be used in 
many different scenarios, they aren't always *good* data structures for the
situation.

When dealing with a collection of objects, for instance, you probably want
dedicated collection objects, on which you can call methods.

Many frameworks provide some sort of collection class.
They rarely provide immutability, though, and are therefore not thread safe.
Additionally, they are usually implementing a bloated interface with all of the 
methods you might some day need - but probably won't.

Due to the many optional expansions which can be applied at will, this package
enables powerful typesafe collections that can be fine-tunes for use in any
project, without getting distracted by a bloated collection interface.

The immutability of the collection means they can be used in projects that care
about reducing state changes.

## Installation

Install using composer:

```
composer require stratadox/immutable-collection
```

## Basic usage

The most basic implementation of the immutable collection might look something 
like the following:

```php
<?php

class Numbers extends ImmutableCollection
{
    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}
```

Or:

```php
<?php

class Things extends ImmutableCollection
{
    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }
}
```

## Advanced usage

Additional behaviour can be added by implementing the relevant interfaces and/or 
traits for the particular concrete collection:

```php
<?php

class Numbers extends ImmutableCollection implements Appendable
{
    use Appending;

    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}

$numbers = new Numbers(1, 2, 3);
$numbers = $numbers->add(4);

assert($numbers == new Numbers(1, 2, 3, 4));
```

Multiple kinds of behaviour can be used simultaneously:

```php
<?php

class Numbers extends ImmutableCollection implements Mergeable, Purgeable
{
    use Merging, Purging;

    public function __construct(int ...$items)
    {
        parent::__construct(...$items);
    }
}

$numbers = new Numbers(1, 2, 3);
$numbers = $numbers->merge(new Numbers(4, 5, 6));
$numbers = $numbers->remove(3);

assert($numbers == new Numbers(1, 2, 4, 5, 6));
```

The shorthand for which is:

```php
<?php

$numbers = (new Numbers(1, 2, 3))
    ->merge(new Numbers(4, 5, 6))
    ->remove(3);

assert($numbers == new Numbers(1, 2, 4, 5, 6));
```

If desired, the methods `current` and `offsetGet` may be implemented with a 
return type hint, in order to (further) increase type safety and to allow
IDE's like PhpStorm to provide code completion in loops and array-like access:

```php
<?php

class Things extends ImmutableCollection
{
    public function __construct(Thing ...$things)
    {
        parent::__construct(...$things);
    }

    public function current(): Thing
    {
        return parent::current();
    }

    public function offsetGet($index): Thing
    {
        return parent::offsetGet($index);
    }
}
```
