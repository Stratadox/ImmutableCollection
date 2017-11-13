# ImmutableCollection

[![Build Status](https://travis-ci.org/Stratadox/ImmutableCollection.svg?branch=master)](https://travis-ci.org/Stratadox/ImmutableCollection)
[![Coverage Status](https://coveralls.io/repos/github/Stratadox/ImmutableCollection/badge.svg?branch=master)](https://coveralls.io/github/Stratadox/ImmutableCollection?branch=master)

Immutable implementation of the Collection interface.

Provides an abstract ImmutableCollection class, which extends (and restricts)
the SplFixedArray class, as well as several traits with behavioural logic for
(derived) immutable collection classes.

## Why use this

Since the SplFixedArray class is considerably faster and more memory-efficient
than regular php "arrays", using an ImmutableCollection means a gain in speed
and memory compared to an array.

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

Similarly, multiple kinds of behaviour can be used simultaneously:

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

