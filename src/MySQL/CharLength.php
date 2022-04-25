<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class CharLength extends SqliteFunction
{
    public function name(): string
    {
        return 'char_length';
    }

    public function implementation($string): int
    {
        return mb_strlen($string);
    }
}
