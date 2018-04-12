<?php

declare(strict_types=1);

namespace Stratadox\ImmutableCollection;

use Closure;
use function is_object;
use Stratadox\Collection\Executable;

/**
 * Behaviour to execute a closure on each item in the collection.
 *
 * Provides access to execution behaviour in the form of a method that
 * executes an anonymous function on each item in the collection.
 *
 * @package Stratadox\Collection
 * @author  Stratadox
 */
trait Executing
{
    /**
     * @see Executable::execute()
     * @param Closure $function
     */
    public function execute(Closure $function): void
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
