<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Session;
use App;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $languageSession = Session::get('language');

        if(in_array($languageSession, Config::get('app.locales'))) {
            $locale = $languageSession;
        }
        else {
            $locale = Config::get('app.locale');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
