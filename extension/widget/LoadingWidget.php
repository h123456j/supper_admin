<?php
/**
 * Created by PhpStorm.
 * User: jaymie.huang
 * Date: 2017/1/12
 * Time: 10:01
 */

namespace app\extension\widget;

use yii\bootstrap\Widget;

/**
 * 加载动画组件
 * Class LoadingWidget
 * @package app\extension\widget
 */
class LoadingWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("load",[]);
    }

}