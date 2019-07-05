<?php
/**
 * test 路由
 */

// $app->get('/', function ($request, $response, $args) {
//     return $response->write("Hello, world");
// });
// $app->add(function ($request, $response, $next) {
//     $response->getBody()->write('BEFORE');
//     $response = $next($request, $response);
//     $response->getBody()->write('AFTER');

//     return $response;
// });

$app->get('/hello', function ($request, $response, $args) {
    // $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, name");
    return $response;
});


// $app->get('/hello/{name}', function ($request, $response, $args) {
//     return $response->write("Hello " . $args['name']);
// });


$app->get('/', '\App\Action\Test:test');

$app->get('/db', '\App\Action\Test:db');

$app->get('/log', '\App\Action\Test:log');


$app->get('/testMiddleware', '\App\Action\Test:testMiddleware')
    ->add(new App\Middleware\FirstMiddleware())
    ->add(new App\Middleware\SecondMiddleware());


// $app->get('/middleware', function($request, $response, $args){
//     $response->getBody()->write('middleware, testing');
// })->add(new App\Middleware\FirstMiddleware());