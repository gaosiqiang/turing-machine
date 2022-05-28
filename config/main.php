<?php
/**
 * 环境置文件
 * Created by PhpStorm.
 * User: sqtech
 * Date: 2018/11/15
 * Time: 2:34 PM
 */

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

defined('ENV') or define('ENV', 'prod');
defined('DEBUG') or define('DEBUG', true);

$env = '';
switch (ENV) {
    case 'online':
       $env = 'online';
       break;
    case 'dev':
        $env = 'dev';
        break;
    case 'prod':
        $env = 'prod';
        break;
    case 'local':
        $env = 'dev';
        break;
    default :
        $env = 'dev';
        break;
}

$config = [
    //env params require
    require __DIR__ . DIRECTORY_SEPARATOR . $env . '/prarms.php',
    //common params require
    require __DIR__ . '/common/prarms.php'
];
return $config;