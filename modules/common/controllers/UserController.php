<?php
/**
 * Created by PhpStorm.
 * User: jaymie.huang
 * Date: 2017/1/11
 * Time: 14:54
 */

namespace app\modules\common\controllers;

use app\components\BaseWebController;
use app\filter\SessionFilter;
use app\models\common\UserInfoModel;
use yii\helpers\VarDumper;

class UserController extends BaseWebController
{

    public function behaviors()
    {
        return array_merge(parent::behaviors(),['session'=>[
            'class'=>'\app\filter\SessionFilter',
            'except'=>['login']
        ]]);
    }

    public function actionLogin()
    {
        if(\Yii::$app->request->getIsPost()){
            $data=\Yii::$app->request->post("UserInfoModel");
            SessionFilter::createSession($data);
            $this->redirect("/common/index");
        }
        $userInfo=new UserInfoModel("login");
        return $this->render("login",["userInfo"=>$userInfo]);
    }

    public function actionLogout()
    {
        SessionFilter::destroy();
        return $this->redirect("/common/user/login");
    }

}