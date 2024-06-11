<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPrivacyCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->cookie('privacy_accepted')) {
//        dd($request->cookie('privacy_accepted'));
            // Se o cookie de privacidade não foi aceito, defina uma variável de sessão para exibir o alerta
            $request->session()->flash('show_privacy_alert', true);
        }else{
            $request->session()->flash('show_privacy_alert', false);
        }

        return $next($request);
    }
}
