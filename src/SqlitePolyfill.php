<?php

namespace NuernbergerA\SqlitePolyfill;

use Illuminate\Support\Facades\DB;
use PDO;

class SqlitePolyfill
{
    public static function mysql(): void
    {
        (new static(static::functions('MySQL')))
            ->register();
    }

    public function __construct(
        protected array $functions,
        protected ?PDO $pdo = null,
    )
    {
        $this->pdo ??= DB::connection()->getPdo();
    }

    protected function register(): void
    {
        foreach ($this->functions as $functionClass) {
            $function = new $functionClass;
            $this->pdo->sqliteCreateFunction($function->name(), $function->handle());
        }
    }

    protected static function functions(string $directory): array
    {
        return array_map(
            fn(string $path) => __NAMESPACE__.'\\'.$directory.'\\'.basename($path, '.php'),
            glob(__DIR__.'/'.$directory.'/*.php')
        );
    }
}
