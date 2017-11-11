<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection\Test\Unit\Filtering\Numbers;

use Stratadox\Specification\Contract\Satisfiable;

class AreLargerThan implements Satisfiable
{
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public static function theNumber(int $input) : AreLargerThan
    {
        return new static($input);
    }

    public function isSatisfiedBy($number) : bool
    {
        return is_int($number)
            && $number > $this->number;
    }
}
