<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class Soundex extends SqliteFunction
{
    public function name(): string
    {
        return 'soundex';
    }

    public function implementation($string): ?string
    {
        return soundex($string);
    }
}
