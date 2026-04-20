<?php

declare(strict_types=1);

arch('it will not use debugging functions')
    ->expect(['dd', 'dump', 'ray'])
    ->each->not->toBeUsed();

arch('source classes use strict types')
    ->expect('IllumaLaw\HealthCheckOperations')
    ->toUseStrictTypes();

arch('check class extends Spatie Check')
    ->expect('IllumaLaw\HealthCheckOperations\OperationsBacklogCheck')
    ->toExtend('Spatie\Health\Checks\Check');

arch('service provider extends PackageServiceProvider')
    ->expect('IllumaLaw\HealthCheckOperations\HealthcheckOperationsServiceProvider')
    ->toExtend('Spatie\LaravelPackageTools\PackageServiceProvider');
