<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Psr\SimpleCache\InvalidArgumentException;

class CachePageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param array|string ...$delay
     * @return Response|RedirectResponse
     * @throws InvalidArgumentException
     */
    public function handle(Request $request, Closure $next, array|string ...$delay)
    {
        $html = Cache::store("memcached")
            ->get(
                \Illuminate\Support\Facades\Request::fullUrlWithQuery(
                    \Illuminate\Support\Facades\Request::query()
                )
            );

        if ($html != null)
            return response($html);
        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     *
     * @param Request $request
     * @param Response $response
     * @return void
     */
    public function terminate(Request $request, Response $response, array|string ...$delay)
    {
        Cache::store("memcached")
            ->put(
                \Illuminate\Support\Facades\Request::fullUrlWithQuery(\Illuminate\Support\Facades\Request::query()),
                $response->getContent(),
                10);
    }
}
