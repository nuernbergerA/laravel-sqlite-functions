<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class Repeat extends SqliteFunction
{
    public function name(): string
    {
        return 'Repeat';
    }

    public function implementation(string $string, int $times): string
    {
        return str_repeat($string, $times);
    }
}
