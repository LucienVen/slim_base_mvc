<?php

namespace App\Middleware;

class FirstMiddleware
{
    public function __invoke($request, $response, $next)
    {
        $response->getBody()->write("---FirstBefore---");
        $response = $next($request, $response);
        $response->getBody()->write("---FirstAfter---");
        return $response;
    }
}
