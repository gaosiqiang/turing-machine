<?php
/**
 * Created by PhpStorm.
 * User: sqtech
 * Date: 2018/11/16
 * Time: 11:37 AM
 */

namespace vendor\base;

use vendor\base\Application;

class BaseComponent
{
    /**
     * @param array $component
     * @param \vendor\base\Application $app
     * @return \vendor\base\Application
     */
    public static function init(array $component, Application $app)
    {
        foreach ($component as $item => $value) {
            $app->$item = new $value();
        }
        return $app;
    }

}