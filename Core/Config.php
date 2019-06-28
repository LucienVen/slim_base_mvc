<?php
/**
 * 读取配置文件
 */

namespace Core;

class Config
{
    private static $config = [];
    private static $path = SETTING_PATH;

    // 加载用户配置
    public static function load($path = null)
    {
        if (!is_null($path)) {
            self::$path = file_exists($path) ? $path : self::$path;
        }

        self::$config = require self::$path;
    }

    // 返回用户配置
    public static function get($field = null)
    {
        // 判断配置是否已加载
        if (!is_null(self::$config)) {
            self::load();
        }

        // 判断用户需要加载的配置范围
        if (!is_null($field)) {
            foreach (self::$config as $first_key => $first_value) {
                // 如果第一层遍历找到对应的配置信息，则返回
                if ($first_key == $field) {
                    return $first_value;
                }

                // 在第二层结构上遍历
                if (is_array($first_value)) {
                    foreach ($first_value as $second_key => $second_value) {
                        if ($second_key == $field) {
                            return $second_value;
                        }
                    }
                }
            }
        }

        return self::$config;
    }
}
