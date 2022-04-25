<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class Concat extends SqliteFunction
{
    public function name(): string
    {
        return 'concat';
    }

    public function implementation(...$strings): string
    {
        return implode('', $strings);
    }
}
