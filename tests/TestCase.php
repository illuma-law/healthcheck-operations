<?php

declare(strict_types=1);

namespace IllumaLaw\HealthCheckOperations\Tests;

use IllumaLaw\HealthCheckOperations\HealthcheckOperationsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\Health\HealthServiceProvider;
use TimoKoerber\LaravelOneTimeOperations\Providers\OneTimeOperationsServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            HealthServiceProvider::class,
            OneTimeOperationsServiceProvider::class,
            HealthcheckOperationsServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../vendor/timokoerber/laravel-one-time-operations/database/migrations');
    }
}
