<?php
/**
 * Created by PhpStorm.
 * User: jaymie.huang
 * Date: 2017/2/20
 * Time: 16:44
 */

namespace app\dao\base;


use yii\base\InvalidConfigException;
use yii\db\Query;

class DbDao extends BaseDao
{
    private $db;
    protected $dbName='db';

    public function __construct()
    {
        if(!\Yii::$app->has($this->dbName))
            throw new InvalidConfigException('错误数据库配置');
        $this->db=\Yii::$app->get($this->dbName);
    }

    protected function getCount(Query $quey,$index="*")
    {
        $data=null;
        try{
            $data=$quey->count($index,$this->db);
        }catch (\Exception $e){
            \Yii::error($e->getCode().":".$e->getMessage(),'database:'.get_class($this));
            $this->handleException($e);
        }
        return $data;
    }

    public function getCacheKey(Query $query)
    {
        $cmd=$query->createCommand();
        \Yii::info($cmd->getSql().json_encode($cmd->params));
        return $this->getKeyProfix().md5($cmd->getSql().json_decode($cmd->params));
    }

    protected function getAll(Query $query)
    {
        $data=null;
        $key=$this->getCacheKey($query);
        if($this->getUserCache()){
            $data=$this->getCacheComponent()->get($key);
            if($data){
                $this->initCache();
                return $data;
            }
        }

        try{
            $data=$query->all($this->db);
        }catch (\Exception $e){
            \Yii::error($e->getCode().":".$e->getMessage(),'database:'.get_class($this));
            $this->handleException($e);
        }
        $this->cacheData($key,$data);
        return $data;
    }

    protected function getOne(Query $query)
    {
        $data = null;
        $key = $this->getCacheKey($query);
        if($this->getUserCache()){
            $data = $this->getCacheComponent()->get($key);
            if($data){
                $this->initCache();
                return $data;
            }
        }

        try {
            $data = $query->one($this->db);
        }catch (\Exception $e){
            \Yii::error($e->getCode().':'.$e->getMessage(), 'database.'.get_class($this));
            $this->handleException($e);
        }
        $this->cacheData($key, $data);
        return $data;
    }

    protected function insert($sql,$params=[])
    {
        $this->executeCommand($sql,$params);
        return $this->db->getLastInsertID();
    }

    protected function delete($sql,$params=[])
    {
        return $this->executeCommand($sql,$params);
    }

    protected function update($sql,$params=[])
    {
        return $this->executeCommand($sql,$params);
    }

    private  function executeCommand($sql,$param=[])
    {
        try{
            return $this->createCommand($sql,$param)->execute();
        }catch (\Exception $e){
            \Yii::error($e->getCode().':'.$e->getMessage(), 'database.'.get_class($this));
            throw $e;
        }
    }

    private function createCommand($sql,$params=[])
    {
        $command=$this->db->createCommand($sql);
        if(!empty($params)){
            foreach($params as $key=>$value){
                $command->bindParam($key,$value);
            }
        }
        return $command;
    }

}