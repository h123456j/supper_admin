<?php

namespace app\modules\common;

/**
 * Created by PhpStorm.
 * User: jaymie.huang
 * Date: 2016/12/29
 * Time: 11:15
 */
class Module extends \yii\base\Module
{
    public $controllerNamespace='app\modules\common\controllers';

    public function init()
    {
        parent::init();
    }

}