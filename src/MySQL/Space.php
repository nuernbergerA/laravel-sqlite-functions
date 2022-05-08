<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class Space extends SqliteFunction
{
    public function name(): string
    {
        return 'space';
    }

    public function implementation($times): ?string
    {
        return str_repeat(' ', $times);
    }
}
