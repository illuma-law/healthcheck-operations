<?php

declare(strict_types=1);

namespace IllumaLaw\HealthCheckOperations;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use TimoKoerber\LaravelOneTimeOperations\OneTimeOperationManager;

final class OperationsBacklogCheck extends Check
{
    public function run(): Result
    {
        $pending = OneTimeOperationManager::getUnprocessedFiles();
        $count = $pending->count();

        if ($count === 0) {
            return Result::make()
                ->meta(['pending_count' => 0])
                ->shortSummary('None')
                ->ok('No pending one-time operations.');
        }

        $oldestMtime = $pending->min(fn (\SplFileInfo $file): int => $file->getMTime());
        $oldestAgeHours = $oldestMtime ? max(0, (now()->timestamp - (int) $oldestMtime) / 3600) : 0.0;

        $names = $pending->map(fn (\SplFileInfo $file): string => $file->getBasename('.php'))->take(12)->values()->all();

        $result = Result::make()
            ->meta([
                'pending_count' => $count,
                'oldest_pending_hours' => round($oldestAgeHours, 2),
                'sample' => $names,
            ])
            ->shortSummary("{$count} pending");

        if ($oldestAgeHours >= 24) {
            return $result->failed('Pending one-time operations are older than 24 hours.');
        }

        return $result->warning('There are pending one-time operations waiting for `operations:process`.');
    }
}
