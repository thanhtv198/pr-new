<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;
use Closure;

class Locale
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
        $language = \Session::get('website_language', config('app.locale'));

        // Chuyển ứng dụng sang ngôn ngữ được chọn
        config(['app.locale' => $language]);
        
        App::setLocale($language);
        
        return $next($request);
    }
}
