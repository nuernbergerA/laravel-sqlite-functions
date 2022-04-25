<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class WsConcat extends SqliteFunction
{
    public function name(): string
    {
        return 'ws_concat';
    }

    public function implementation(string $sperator, ...$strings): string
    {
        return implode($sperator, $strings);
    }

    public function handle(): callable
    {
        return fn (string $sperator, ...$args) => $this->implementation($sperator, ...$args);
    }
}
