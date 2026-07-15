<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    public function handle(Request $request, Closure $next): Response
    {
        $language = $request->query('lang', session('language', 'en'));

        if ($request->has('lang') && in_array($language, ['en', 'ur'])) {
            session(['language' => $language]);
        }

        if (!in_array($language, ['en', 'ur'])) {
            $language = 'en';
        }

        app()->setLocale($language);

        return $next($request);
    }
}
