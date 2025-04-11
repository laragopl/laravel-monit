<?php

namespace Laragopl\LaravelMonit\app\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Throwable;

class MonitService
{
    /**
     * Sends a POST request to the Monit URL with predefined error data
     *
     * @param Throwable $throwable
     * @return Response
     * @throws ConnectionException
     */
    public function send(Throwable $throwable): Response
    {
        return Http::withHeaders(['Accept' => 'application/json'])
            ->withToken(config('monit.token'))
            ->post(config('monit.url'), [
                'app_name' => config('app.name'),
                'environment' => config('app.env'),
                'message' => $throwable->getMessage(),
                'file' => $throwable->getFile(),
                'line' => $throwable->getLine(),
                'trace' => $throwable->getTrace(),
                'url' => request()->fullUrl(),
                'method' => request()->method(),
                'http_user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null,
                'remote_addr' => $_SERVER['REMOTE_ADDR'] ?? null,
                'level' => 'Error',
            ]);
    }
}
