<?php
/**
 * 入口文件
 * 定义常量
 */


// application path
define("APP_PATH", __DIR__ . "/../App");

// Framework core path
define("CORE_PATH", __DIR__ . "/../Core");

// config path
define("SETTING_PATH", APP_PATH . "/Settings.php");

// init Framework
require CORE_PATH . "/Init.php";


// get instance
$app = \Core\Start::getApp();

// start Framework
require __DIR__ . '/start.php';

