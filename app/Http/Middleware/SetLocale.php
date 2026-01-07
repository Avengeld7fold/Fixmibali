<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $cookieName = config('fixmi.locale.cookie', 'fixmi_locale');
        $defaultLocale = config('fixmi.locale.default', config('app.locale', 'id'));
        $locale = $request->cookie($cookieName);
        if (! in_array($locale, ['id', 'en'], true)) {
            $locale = $defaultLocale;
        }

        App::setLocale($locale);

        return $next($request);
    }
}
