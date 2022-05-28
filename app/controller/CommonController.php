<?php
/**
 * Created by PhpStorm.
 * User: sqtech
 * Date: 2018/11/22
 * Time: 6:08 PM
 */

namespace app\controller;

use vendor\base\BaseController;

class CommonController extends BaseController
{
    /*
     * 默认函数
     */
    public function actionCommon()
    {
        return "Hello Atomer";
    }

}