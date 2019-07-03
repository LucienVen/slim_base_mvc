<?php
/**
 * 模型类基类
 */
namespace Core;

use Illuminate\Database\Eloquent\Model as EloquentModel;


class Model extends EloquentModel
{
    public function __construct()
    {
        $capsule = new \Illuminate\Database\Capsule\Manager;
        $capsule->addConnection(\Core\Config::get('settings')['db']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

}