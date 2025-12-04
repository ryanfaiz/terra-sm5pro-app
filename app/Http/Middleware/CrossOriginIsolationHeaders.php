<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CrossOriginIsolationHeaders
{
    /**
     * Handle an incoming request and add cross-origin isolation headers.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Required to enable SharedArrayBuffer and WebAssembly threads in browsers.
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin');
        $response->headers->set('Cross-Origin-Embedder-Policy', 'require-corp');

        return $response;
    }
}
