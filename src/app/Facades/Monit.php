<?php

namespace Laragopl\LaravelMonit\app\Facades;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;
use Laragopl\LaravelMonit\app\Services\MonitService;
use Throwable;

/**
 * @method static Response send(Throwable $throwable)
 *
 * @see MonitService
 */
class Monit extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return MonitService::class;
    }
}
