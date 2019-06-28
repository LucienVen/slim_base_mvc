<?php
require 'vendor/autoload.php';

// 创建并配置 Slim app
$app = new \Slim\App;

// 定义 app 路由
$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello " . $args['name']);
});

$app->get('/', function ($request, $response, $args) {
    return $response->write("Hello, world");
});

// 运行 app
$app->run();