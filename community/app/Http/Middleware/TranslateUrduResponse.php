<?php

namespace App\Http\Middleware;

use App\Services\UrduTranslationService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TranslateUrduResponse
{
    public function __construct(private UrduTranslationService $translator)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        if (session('language', 'en') !== 'ur') return $response;

        $type = $response->headers->get('Content-Type', '');
        if (!str_contains($type, 'text/html')) return $response;
        $content = $response->getContent();
        if ($content === false || $content === '') return $response;
        $response->setContent($this->translator->translateHtml($content));
        return $response;
    }
}
