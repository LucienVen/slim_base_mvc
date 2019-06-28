<?php


// session 设置
// ini_set('session.save_handler', 'redis');
// ini_set('session.save_path', 'tcp://127.0.0.1:6379');


// 启动session
session_start();


/**
 * 检索当前路由（http://45.63.120.39/docs/cookbook/retrieving-current-route.html）
 * 在应用程序中获取当前的路由
 */
\Core\Start::getApp()->add(function ($request, $response, $next){
    $route = $request->getAttribute('route');
    $this['args'] = $route ? $route->getArguments() : '';
    // print_r($this['args']);
    return $next($request, $response);
});

/**
 * 注册slim容器
 */
if (file_exists(APP_PATH . DIRECTORY_SEPARATOR .'Dependencies.php')) {
    require APP_PATH . DIRECTORY_SEPARATOR . 'Dependencies.php';
}


/**
 * 注册路由
 */
foreach (glob(APP_PATH . '/Router/*.route.php') as $path) {
    require $path;
}


// 运行应用实例
\Core\Start::run();