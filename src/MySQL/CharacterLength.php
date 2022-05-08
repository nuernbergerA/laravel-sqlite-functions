<?php

namespace NuernbergerA\SqlitePolyfill\MySQL;

class CharacterLength extends CharLength
{
    public function name(): string
    {
        return 'character_length';
    }
}
