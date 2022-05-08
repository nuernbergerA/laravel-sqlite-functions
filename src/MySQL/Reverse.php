<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class Reverse extends SqliteFunction
{
    public function name(): string
    {
        return 'reverse';
    }

    public function implementation($string): string
    {
        return strrev($string);
    }
}
