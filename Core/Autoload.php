<?php
/**
 * autoload class
 */

class Autoload
{
    public static function load($classname)
    {
        // use DIRECTORY_SEPARATOR install '\'
        $classname = str_replace(['\\', '-'], DIRECTORY_SEPARATOR, $classname);

        // 获取需要加载的php文件绝对路径
        $loadPath = ROOT_PATH . DIRECTORY_SEPARATOR . $classname . '.php';
        
        if (file_exists($loadPath)) {
            require $loadPath;
        } else {
            throw new \Exception('load: ' . $loadPath . ': file does not exist!', 404);
        }
    }
}
