<?php

namespace NuernbergerA\SqlitePolyfill;

use Illuminate\Database\SQLiteConnection;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SqlitePolyfillServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-sqlite-functions')
        ->hasMigrations();
    }

    public function packageBooted(): void
    {
        if (! DB::connection() instanceof SQLiteConnection) {
            return;
        }

        SqlitePolyfill::mysql();
    }
}
