<?php

namespace app\extension\widget;
use app\models\common\Param;
use yii\base\Exception;
use yii\bootstrap\Widget;

/**
 * 弹窗组件
 * Created by PhpStorm.
 * User: jaymie.huang
 * Date: 2016/12/29
 * Time: 14:33
 */
class TopWidget extends Widget
{

    public $param;
    public $system=[];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if(!$this->param instanceof Param)
            throw new Exception("param must be instanceof Param");
        $system=array_merge(['0'=>'请选择'],$this->system);
        return $this->render("top",['param'=>$this->param,'system'=>$system]);
    }

}