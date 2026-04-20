<?php

declare(strict_types=1);

return [
    /*
     * Whether the operations backlog is required.
     * If true, the check will fail if there are pending operations older than 24h.
     * If false, it will only result in a warning.
     */
    'required' => env('HEALTH_OPERATIONS_REQUIRED', false),
];
