<?php

/**
 * Test Action
 */

 namespace App\Action;
 
 use Core\Action;

 class Test extends Action
 {
     /**
      * hello world 测试
      */
      public function test()
      {
          return $this->success(200, 'success');
      }
 }
 