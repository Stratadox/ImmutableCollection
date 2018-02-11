<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use Closure;
use Stratadox\Collection\Executable;

trait Executing
{
    /**
     * @see Executable::execute()
     * @param Closure $function
     */
    public function execute(Closure $function) : void
    {
        foreach ($this as $position => $item) {
            if (is_object($item)) {
                $function->call($item, $position, $item);
            } else {
                $function($position, $item);
            }
        }
    }
}
