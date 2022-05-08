<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

use NuernbergerA\SqlitePolyfill\SqliteFunction;

class Rpad extends SqliteFunction
{
    public function name(): string
    {
        return 'rpad';
    }

    public function implementation(string $string, int $length, string $pad_string = " "): string
    {
        if (mb_strlen($string) > $length) {
            return mb_substr($string, 0, $length);
        }

        return str_pad($string, $length, $pad_string);
    }
}
