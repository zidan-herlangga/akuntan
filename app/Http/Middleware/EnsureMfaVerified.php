<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureMfaVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user !== null && $user->mfa_enabled && ! $this->isVerified($user)) {
            return redirect()->route('mfa.verify');
        }

        return $next($request);
    }

    private function isVerified(mixed $user): bool
    {
        return session("mfa_verified_{$user->id}") === true;
    }
}
