---
description: Laravel One-Time Operations backlog health check for Spatie Laravel Health
---

# healthcheck-operations

One-Time Operations backlog health check for `spatie/laravel-health`. Monitors pending `laravel-one-time-operations` (TimoKoerber/laravel-one-time-operations).

## Namespace

`IllumaLaw\HealthCheckOperations`

## Key Check

- `OperationsBacklogCheck` — detects pending one-time operations; fails if oldest is > 24 hours old

## Registration

```php
use IllumaLaw\HealthCheckOperations\OperationsBacklogCheck;
use Spatie\Health\Facades\Health;

Health::checks([
    OperationsBacklogCheck::new(),
]);
```

## Notes

- Reports count of pending operations and age of the oldest in health meta data.
- Returns `failed` (not `warning`) when operations have been pending > 24 hours.
- Lists a sample of operation filenames for easier debugging.
