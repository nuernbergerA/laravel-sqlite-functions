<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class Ascii extends SqliteFunction
{
    public function name(): string
    {
        return 'ascii';
    }

    public function implementation($string): int
    {
        return ord($string);
    }
}
