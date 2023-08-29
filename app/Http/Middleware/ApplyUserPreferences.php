<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApplyUserPreferences
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $langs = $request->header('accept-language');
        $locale = substr($langs, 0, 2);
        $user = Auth::user();
        if ($user) {
            App::setlocale($user->locale);
        } elseif ($locale) {
            App::setlocale($locale);
        }
        return $next($request);
    }
}
