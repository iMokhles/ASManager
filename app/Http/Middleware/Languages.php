<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Languages
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $localKey = 'applocale';

        if (Session::has($localKey)
            && array_key_exists(
                Session::get($localKey),
                Config::get('langs')
            )) {
            App::setLocale(Session::get($localKey));
        } else { // This is optional as Laravel will automatically set the fallback language if there is none specified
            Session::put($localKey, Config::get('app.fallback_locale'));
            App::setLocale(Config::get('app.fallback_locale'));
        }
        return $next($request);
    }
}
