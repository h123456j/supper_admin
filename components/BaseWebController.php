<?php


namespace app\components;
use app\models\common\Param;

/**
 * Created by PhpStorm.
 * User: jaymie.huang
 * Date: 2016/12/29
 * Time: 11:27
 */
class BaseWebController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'session'=>[
                'class'=>'\app\filter\SessionFilter'
            ]
        ];
    }
}