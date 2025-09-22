<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SunsetMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $dateString): Response
    {
        $isDeprecated = now()->gte($dateString);

        /** @var Response $response */
        $response = $next($request);
        $response->headers->set('Sunset', $dateString ?: now());
        $response->headers->set('Deprecated', json_encode($isDeprecated)); // jumping between languages its easy to forget PHP bool->string isn't great

        return $response;
    }
}
