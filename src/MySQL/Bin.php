<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class Bin extends SqliteFunction
{
    public function name(): string
    {
        return 'bin';
    }

    public function implementation($string): string
    {
        return decbin($string);
    }
}
