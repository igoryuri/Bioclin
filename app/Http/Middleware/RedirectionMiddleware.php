<?php

namespace App\Http\Middleware;

use App\Models\Redirection;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $oldUrl = $request->path();

        $redirection = Redirection::where('old_url', $oldUrl)->first();

        if ($redirection) {
            return redirect()->away($redirection->new_url);
        }

        return $next($request);
    }
}
