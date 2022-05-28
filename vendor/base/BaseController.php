<?php
/**
 * Created by PhpStorm.
 * User: sqtech
 * Date: 2018/11/22
 * Time: 5:37 PM
 */

namespace vendor\base;

use vendor\base\BaseObject;

class BaseController extends BaseObject
{
    public function before()
    {

    }

    public function after()
    {

    }

    public function output($response)
    {
        echo json_encode($response);
    }
}