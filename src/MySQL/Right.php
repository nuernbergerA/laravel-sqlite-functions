<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class Right extends SqliteFunction
{
    public function name(): string
    {
        return 'right';
    }

    public function implementation(string $string, int $length): string
    {
        return mb_substr($string, (-1 * $length));
    }
}
