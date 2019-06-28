<?php
/**
 * init framework
 */

//  define const value
//  查找项目根目录，也就是slim_base_mvc在本机的绝对路径
define('ROOT_PATH', substr(__DIR__, 0, strrpos(__DIR__, DIRECTORY_SEPARATOR)));

// load composer vender
require __DIR__ . '/../vendor/autoload.php';

// load application autoload class
require CORE_PATH . '/Autoload.php';

// 注册自动加载
spl_autoload_register("Autoload::load");

// 读取配置文件
\Core\Config::load(SETTING_PATH);
