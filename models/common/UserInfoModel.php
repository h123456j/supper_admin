<?php
/**
 * Created by PhpStorm.
 * User: jaymie.huang
 * Date: 2017/1/11
 * Time: 14:56
 */

namespace app\models\common;


use app\components\DataModel;

class UserInfoModel extends DataModel
{

    private $uid;
    private $pwd;
    private $uName;
    private $phone;

    public function rules()
    {
        return [
            [["uName"],'required','on'=>'login','message'=>'请输入用户名'],
            [["pwd"],'required','on'=>'login','message'=>'请输入密码']
        ];
    }

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    /**
     * @return mixed
     */
    public function getUName()
    {
        return $this->uName;
    }

    /**
     * @param mixed $uName
     */
    public function setUName($uName)
    {
        $this->uName = $uName;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

}