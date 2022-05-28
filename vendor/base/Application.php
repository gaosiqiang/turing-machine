<?php
/**
 * Created by PhpStorm.
 * User: sqtech
 * Date: 2018/11/14
 * Time: 5:02 PM
 */

namespace vendor\base;

use vendor\request\HandleRquest;
use vendor\base\BaseComponent;

class Application
{
    public static $app = null;

    public $response = null;

    public $config = [];

    public function __construct()
    {
    }

    public function run($config)
    {
        $this->config = $config;
        // TODO 错误处理机制，显示错误，目前不显示具体的错误很难调试
        static::$app = $this;
        //注册组件
//        static::$app->request = new HandleRquest();
        static::$app = BaseComponent::init($config['components'], static::$app);
        //组织处理对象
        $controller = static::$app->request->getController();
        $controller = $controller ? $controller : 'common'; //如果请求没有任何参数，默认commonController
        $controller = ucfirst($controller).'Controller';
        $controller = $this->config['controller_path'] ."\\". $controller;
        $action = static::$app->request->getAction();
        $action = 'action'.ucfirst($action);
        $controllerClass = new $controller();
        // before函数判断权限
        //$controllerClass->before($this->config);
        //回调资源
        $this->response = call_user_func_array([$controllerClass, $action], []); //调用对象里的方法并传参
        // 回调after函数处理action返回的数据
        //$controllerClass->after($this->response);
        $controllerClass->output($this->response, 'json');
        exit();
    }

}