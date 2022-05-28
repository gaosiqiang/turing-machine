<?php
/**
 * 基础配置
 * Created by PhpStorm.
 * User: sqtech
 * Date: 2018/11/15
 * Time: 2:58 PM
 */
$config = [
    //控制器路径
    'controller_path' => 'app\controller',
    //组件
    'components' => [
        'request' => 'vendor\request\HandleRquest',
    ],
];
return $config;