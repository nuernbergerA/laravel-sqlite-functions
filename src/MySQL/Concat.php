<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class Concat extends SqliteFunction
{
    public function name(): string
    {
        return 'concat';
    }

    public function implementation(...$strings): ?string
    {
        if (in_array(null, $strings, true)) {
            return null;
        }

        return implode('', $strings);
    }
}
