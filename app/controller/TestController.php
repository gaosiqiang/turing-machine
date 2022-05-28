<?php
namespace app\controller;

use vendor\base\Application;
use app\controller\CommonController;

class TestController extends CommonController{

    public function actionTest()
    {
        $a = Application::$app->request->get('a', 1);
        return $a;
        //return "NameSpace = ".__NAMESPACE__."<br/> ClassName = ".__CLASS__."<br/> Method = ".__METHOD__;
    }

}