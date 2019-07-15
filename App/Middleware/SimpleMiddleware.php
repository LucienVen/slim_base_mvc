<?php
namespace App\Middleware;

class SimpleMiddleware
{
    public function __invoke($request, $response, $next)
    {
        $response->getBody()->write("---Eample---");
        $response = $next($request, $response);
        return $response;
    }
}
