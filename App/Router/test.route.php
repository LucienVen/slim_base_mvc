<?php
/**
 * test 路由
 */

// $app->get('/', function ($request, $response, $args) {
//     return $response->write("Hello, world");
// });

$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello " . $args['name']);
});


$app->get('/', '\App\Action\Test:test');