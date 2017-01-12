<?php

namespace app\modules\common\controllers;
use app\components\BaseWebController;
use app\models\common\Param;

/**
 * Created by PhpStorm.
 * User: jaymie.huang
 * Date: 2016/12/29
 * Time: 11:30
 */
class IndexController extends BaseWebController
{

    public function actionIndex()
    {
        $param=new Param();
        return $this->render("index",['param'=>$param]);
    }

}