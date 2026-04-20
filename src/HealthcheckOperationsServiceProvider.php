<?php

declare(strict_types=1);

namespace IllumaLaw\HealthCheckOperations;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class HealthcheckOperationsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('healthcheck-operations')
            ->hasConfigFile()
            ->hasTranslations();
    }
}
