<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (! $token) {
            return response()->json(['error' => 'API token required.'], 401);
        }

        $site = \App\Models\Site::where('api_token', $token)->where('is_active', true)->first();

        if (! $site) {
            return response()->json(['error' => 'Invalid or inactive API token.'], 401);
        }

        $request->attributes->set('api_site', $site);

        return $next($request);
    }
}
