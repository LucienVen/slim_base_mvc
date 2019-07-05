<?php

/**
 * Test Action
 */

namespace App\Action;

use Core\Action;
// use Illuminate\Support\Facades\Config;
use App\Model\Test as TestModel;

class Test extends Action
{
    /**
     * hello world 测试
     */
    public function test()
    {
        return $this->success(200, 'success', "hello, world");
    }

    /**
     * 测试数据库连接
     */
    public function db()
    {
        // $a = 111;
        // $capsule = $this->_container->get('db');
        // $res = $capsule->table('user')->find(1);
        // return $this->success(200, 'success', $res);
        // $testModel = new TestModel();

        // $db = $this->_container->get('db');
        // $db->bootEloquent();
        $testModel = new TestModel();
        $res = $testModel->get();
        return $this->success(200, 'success', $res);
    }

    /**
     * 测试monolog 日志记录
     */
    public function log()
    {
        $this->_container->get('logger')->addInfo('test logger');
        echo 'logger runing';
    }

    /**
     * 测试路由中间件
     */
    public function testMiddleware()
    {
        $this->_response->getBody()->write("[testing! testMiddleware]");
    }

    
}
