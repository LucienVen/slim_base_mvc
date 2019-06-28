<?php
/**
 * Action 基类
 */

namespace Core;

class Action
{
    /**
     * 请求类
     *
     * @var RequestInterface
     */
    protected $_request;

    /**
     * 响应类
     *
     * @var ResponseInterface
     */
    protected $_response;

    /**
     * 路由参数
     *
     * @var array
     */
    protected $_args;

    /**
     * 容器实例
     *
     * @var \Slim\Container
     */
    protected $_container;

    /**
     * 初始化函数
     */
    public function __construct(\Slim\Container $container)
    {
        $this->_container = $container;
        $this->_request = $this->_container->get('request');
        $this->_response = $this->_container->get('response');
        // 获取路由参数
        $this->_args = $this->_container->get('args');
    }

    /**
     * 请求成功返回函数
     */
    public function success($code = 200, $msg = 'success', $data = [])
    {
        $return_data = [
            'code' => $code,
            'msg' => $msg,
        ];

        if (!empty($data)) {
            $return_data['data'] = $data;
        }

        return $this->_response->withJson($return_data, 200);
    }

    /**
     * 请求失败返回函数
     */
    public function error($code = 200, $msg = '')
    {
        $return_data = [
            'code' => $code,
        ];

        if (!(empty($msg))) {
            $return_data['msg'] = $msg;
        } elseif (\Core\Config::get('status')[$code] != null) {
            $return_data['msg'] = \Core\Config::get('status')[$code];
        }else {
            $return_data['msg'] = 'error';
        }

        return $this->_response->withJson($return_data, 400);
        
    }
}
