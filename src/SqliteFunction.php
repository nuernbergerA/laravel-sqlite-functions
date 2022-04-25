<?php

namespace NuernbergerA\SqlitePolyfill;

use BadMethodCallException;

abstract class SqliteFunction
{
    abstract public function name(): string;

    public function handle(): callable
    {
        if(! method_exists($this, 'implementation')) {
            throw new BadMethodCallException($this->name().' is not implemented');
        }

        return fn(...$args) => $this->implementation(...$args);
    }
}
