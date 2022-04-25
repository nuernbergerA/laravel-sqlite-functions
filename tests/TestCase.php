<?php

namespace NuernbergerA\SqlitePolyfill\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as Orchestra;
use NuernbergerA\SqlitePolyfill\SqlitePolyfillServiceProvider;
use Pest\Expectation;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            SqlitePolyfillServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
        //
        //Schema::create('users', function (Blueprint $table) {
        //    $table->id();
        //    $table->string('name');
        //    $table->timestamps();
        //});
    }

    public function expectQuery(string $query): Expectation
    {
        return expect(DB::query()->selectRaw($query)->value('*'));
    }
}
