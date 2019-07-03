<?php
/**
 * slim 容器
 */

$container = $app->getContainer();


$container['logger'] = function($c){
    $logger = new \Monolog\Logger('my_logger');
    // 日志按日记录
    $log_name = LOG_PATH . DIRECTORY_SEPARATOR . date('Ymd', time()) . '.log';
    $file_handler = new \Monolog\Handler\StreamHandler($log_name);
    $logger->pushHandler($file_handler);
    return $logger;
};