<?php
/**
 * start framework
 */

namespace Core;

class Start
{
    // 本类实例？
    private static $instance;

    // 初始化应用实例
    private static $app;

    private function __construct()
    {
        self::$app = new \Slim\App(\Core\Config::get());
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            // 实例化自身
            $s = __CLASS__;
            self::$instance = new $s;
        }

        return self::$instance;
    }

    /**
     * 获取应用实例
     */
    public static function getApp()
    {
        if (!isset(self::$app)) {
            self::getInstance();
        }

        return self::$app;
    }

    /**
     * run slim
     */
    public static function run()
    {
        // print('slim app running...');
        self::$app->run();
    }
}
