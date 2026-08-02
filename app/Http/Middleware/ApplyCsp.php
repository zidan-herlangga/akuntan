<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vite;
use Spatie\Csp\Policy;
use Symfony\Component\HttpFoundation\Response;

class ApplyCsp
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (! config('csp.enabled')) {
            return $response;
        }

        // Skip CSP middleware when Laravel is rendering an exception
        if (config('app.debug') && $response->isServerError()) {
            return $response;
        }

        // Skip CSP middleware when Vite is hot reloading
        if (config('app.debug') && ! config('csp.enabled_while_hot_reloading') && Vite::isRunningHot()) {
            return $response;
        }

        $directives = $this->isProtectedArea($request)
            ? config('csp.admin.directives')
            : config('csp.public.directives');

        $policy = Policy::create(directives: $directives);

        $response->headers->set('Content-Security-Policy', $policy->getContents());

        return $response;
    }

    /**
     * Admin panel, API, and signed-document routes get the strict policy.
     */
    private function isProtectedArea(Request $request): bool
    {
        return $request->is('admin*', 'api/*', 'booking/*');
    }
}
