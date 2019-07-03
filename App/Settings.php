<?php
/**
 * 配置文件类
 */
return [
    // slim 框架设置
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'determineRouteBeforeAppMiddleware' => true,

        // 数据库配置
        'db' => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'test',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],

        // monolog

    ],

];
