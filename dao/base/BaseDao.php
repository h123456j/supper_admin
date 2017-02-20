<?php
/**
 * Created by PhpStorm.
 * User: jaymie.huang
 * Date: 2017/2/20
 * Time: 16:33
 */

namespace app\dao\base;


abstract class BaseDao
{

    public $cacheComponent='cache';

    private $userCache=false;
    private $duration=1800;
    private $dependence;

    private $errorCode;
    private $errorMsg;

    public function getKeyProfix()
    {
        return "supper_admin_db";
    }

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param mixed $errorCode
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return mixed
     */
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }

    /**
     * @param mixed $errorMsg
     */
    public function setErrorMsg($errorMsg)
    {
        $this->errorMsg = $errorMsg;
    }

    /**
     * @return mixed
     */
    public function getDependence()
    {
        return $this->dependence;
    }

    /**
     * @param mixed $dependence
     */
    public function setDependence($dependence)
    {
        $this->dependence = $dependence;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return boolean
     */
    public function getUserCache()
    {
        return $this->userCache;
    }

    /**
     * @param boolean $userCache
     */
    public function setUserCache($userCache)
    {
        $this->userCache = $userCache;
    }

    protected function handleException(\Exception $e)
    {
        $this->setErrorCode($e->getCode());
        $this->setErrorMsg($e->getMessage());
    }

    public function getCacheComponent()
    {
        return \Yii::$app->{$this->cacheComponent};
    }

    protected  function cache($duration=1800,$dependence=null)
    {
        if($duration>0){
            $this->duration=$duration;
            $this->userCache=true;
            $this->dependence=$dependence;
        }else{
            $this->initCache();
        }
        return $this;
    }

    protected function initCache()
    {
        $this->duration=0;
        $this->userCache=false;
        $this->dependence=null;
    }

    protected function cacheData($key,$value)
    {
        if($this->userCache && $value && $this->duration>0){
            $this->getCacheComponent()->set($key, $value, $this->duration, $this->dependence);
            $this->initCache();
            return true;
        }
        return false;
    }


}