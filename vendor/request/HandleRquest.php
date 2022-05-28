<?php
namespace vendor\request;

use vendor\base\BaseException;

/**
 * 简单php 路由解析
 * Class HandleRquest
 * @package app\request
 */
class HandleRquest
{

    public $request = [];
    public $request_method = '';
    public $request_errors = [];
    public $request_method_map = [
        'POST' => 'post',
        'GET' => 'get',
    ];

    /**
     * HandleRquest constructor.
     */
    public function __construct()
    {
        $this->request = $_SERVER;
        $this->request_method = $this->request['REQUEST_METHOD'];
        if ($this->request['REQUEST_URI']) {
            $this->request['REQUEST_URI'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $request_url = explode('/', trim($this->request['REQUEST_URI'], '/'));
            array_map(function ($n) use(&$request_url){
                //是否会有脚本
                if (strpos($n, '.') !== false) {
                    array_shift($request_url);
                    if (strpos($n, '.php') !== false) {
                        //不属于php脚本
                        $this->request_errors[] = ['code' => 100001, 'msg' => '非php脚本'];
                    }
                }
            }, $request_url);
        }
        $this->request = $request_url;
    }

    /**
     * 获取控制器
     * @return mixed
     */
    public function getController()
    {
        return isset($this->request[0]) ? $this->request[0] : 'common';
    }

    /**
     * 获取action
     * @return mixed
     */
    public function getAction()
    {
        return isset($this->request[1]) ? $this->request[1] : 'common';
    }

    /**
     * 获取get参数
     * @param $key
     * @param $value
     * @return mixed
     */
    public function get($key, $value)
    {
        return isset($_GET[$key]) ? $_GET[$key] : $value;
    }

    /**
     * 获取post参数
     * @param $key
     * @param $value
     * @return mixed
     */
    public function post($key, $value)
    {
        return isset($_POST[$key]) ? $_POST[$key] : $value;
    }
}