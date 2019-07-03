<?php
/**
 * slim 容器
 */

$container = $app->getContainer();


$container['logger'] = function($c){
    $logger = new \Monolog\Logger('my_logger');
};