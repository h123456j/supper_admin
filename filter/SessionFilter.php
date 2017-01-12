<?php
/**
 * Created by PhpStorm.
 * User: jaymie.huang
 * Date: 2017/1/11
 * Time: 16:50
 */

namespace app\filter;


use yii\base\ActionFilter;

/**
 * 登陆态过滤器
 * Class SessionFilter
 * @package app\filter
 */
class SessionFilter extends ActionFilter
{

    private $session;

    public function __construct()
    {
        if(!$this->session)
            $this->session=\Yii::$app->session;
    }

    public function beforeAction()
    {
        $userName=\Yii::$app->session->get("userName",null);
        $pwd=\Yii::$app->session->get("pwd",null);
        if($userName==null || $pwd==null)
            \Yii::$app->response->redirect("/common/user/login");
        return true;
    }

    public static function getUserInfo()
    {

    }

    public static function getUserName()
    {
        return \Yii::$app->session->get("userName",null);
    }

    public static function destroy()
    {
        return \Yii::$app->session->destroy();
    }

    public static function createSession($data)
    {
        \Yii::$app->session->set("userName",$data['uName']);
        \Yii::$app->session->set("pwd",$data['pwd']);
    }


}