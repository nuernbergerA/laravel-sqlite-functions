<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class Quote extends SqliteFunction
{
    public function name(): string
    {
        return 'quote';
    }

    public function implementation($string): ?string
    {
        if ($string === null) {
            return null;
        }

        return addslashes($string);
    }
}
