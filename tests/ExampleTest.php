<?php

use Illuminate\Database\SQLiteConnection;
use Illuminate\Support\Facades\DB;

it('uses sqlite', function () {
    expect(DB::connection())->toBeInstanceOf(SQLiteConnection::class);
});

test('ascii', function (string $input, $output) {
    $this->expectQuery("ascii('{$input}')")
         ->toBe($output);
})->with([
    ['a', 97],
    ['A', 65],
    ['ABC', 65],
    ['ü', 195],
]);

test('char_length', function (string $input, $output) {
    $this->expectQuery("char_length('{$input}')")
        ->toBe($output);

    $this->expectQuery("character_length('{$input}')")
         ->toBe($output);
})->with([
    ['a', 1],
    ['ab', 2],
    ['abü', 3],
    ['abü😋', 4],
]);

test('concat', function () {
    $this->expectQuery("concat('A','B','C')")
        ->toBe('ABC');
});

test('ws_concat', function () {
    $this->expectQuery("ws_concat('-', 'A','B','C')")
        ->toBe('A-B-C');
});
