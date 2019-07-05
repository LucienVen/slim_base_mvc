<?php

namespace App\Middleware;

class SecondMiddleware
{
    public function __invoke($request, $response, $next)
    {
        
        $response->getBody()->write("---SecondBefore---");
        $response = $next($request, $response);
        $response->getBody()->write("---SecondAfter---");

        return $response;
    }
}
