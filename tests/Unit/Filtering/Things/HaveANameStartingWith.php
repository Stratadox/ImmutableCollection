<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Filtering\Things;

use Stratadox\Specification\Contract\Satisfiable;

class HaveANameStartingWith implements Satisfiable
{
    private $startWith;

    public function __construct(string $startWith)
    {
        $this->startWith = $startWith;
    }

    public static function theText(string $input) : HaveANameStartingWith
    {
        return new static($input);
    }

    public function isSatisfiedBy($thing) : bool
    {
        return $thing instanceof Thing
            && strpos($thing->name(), $this->startWith) === 0;
    }
}
