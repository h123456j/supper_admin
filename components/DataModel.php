<?php
/**
 * 数据模型
 */
namespace app\components;

use yii\base\Model;

class DataModel extends Model
{
    public function __construct($config = [])
    {
        if(is_string($config)){
            $this->setScenario($config);
            $this->init();
        }elseif(is_array($config) || is_object($config)){
            $this->loadDatas($config);
            $this->init();
        }else{
            parent::__construct($config);
        }
    }

    public function canSetProperty($name, $checkVars = false, $checkBehaviors = false)
    {
        if(method_exists($this, 'set' . $name) || method_exists($this, 'set'.str_replace('_', '', $name))){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 增加下划线转驼峰式的setter
     * @param string $name
     * @param mixed $value
     * @throws \yii\base\UnknownPropertyException
     */
    public function __set($name, $value)
    {
        $setter = 'set'.str_replace('_', '', $name);
        if(method_exists($this, $setter)){
            $this->$setter($value);
            return;
        }

        parent::__set($name, $value);
    }

    /**
     * 增加下划线转驼峰式的getter
     * @param string $name
     * @return mixed
     * @throws \yii\base\UnknownPropertyException
     */
    public function __get($name)
    {
        $getter = 'get'.str_replace('_', '', $name);
        if(method_exists($this, $getter)){
            return $this->$getter();
        }

        return parent::__get($name);
    }

    /**
     * 装载数据到模型
     * @param array|object $data1
     * @param array $data2
     * @return $this
     */
    public function loadDatas($data1, $data2=null)
    {
        if(func_num_args()>0){
            foreach(func_get_args() as $data){
                if(is_array($data) || is_object($data)){
                    foreach($data as $name=>$value)
                    {
                        if($this->canSetProperty($name, false) || (new \ReflectionClass($this))->hasProperty($name) && (new \ReflectionClass($this))->getProperty($name)->isPublic()){
                            $this->$name = $value;
                        }
                    }
                }
            }
        }
        return $this;
    }

    /**
     * 基于场景的映射列表
     * return [
     *      'scenario1' => [
     *          '映射1' => '属性1',
     *          '映射2' => '属性2',
     *          '映射3' => function(){
     *               return $属性3*100;
     *          }
     *      ],
     *      'scenario2' => ...
     *      ...
     * ]
     * @return array
     * @see fields()
     */
    public function scenarioFields()
    {
        return [];
    }

    /*
     * 返回当前场景的映射列表，默认返回第一个场景的映射列表
     * @return array the list of field names or field definitions.
     * @see toArray()
     */
    public function fields()
    {
        $fields = $this->scenarioFields();
        if(empty($fields)){
            return parent::fields();
        }

        return isset($fields[$this->scenario]) ? $fields[$this->scenario] : array_shift($fields);
    }

    /**
     * Returns the list of fields that can be expanded further and returned by [[toArray()]].
     *
     * This method is similar to [[fields()]] except that the list of fields returned
     * by this method are not returned by default by [[toArray()]]. Only when field names
     * to be expanded are explicitly specified when calling [[toArray()]], will their values
     * be exported.
     *
     * The default implementation returns an empty array.
     *
     * You may override this method to return a list of expandable fields based on some context information
     * (e.g. the current application user).
     *
     * @return array the list of expandable field names or field definitions. Please refer
     * to [[fields()]] on the format of the return value.
     * @see toArray()
     * @see fields()
     */
    public function extraFields()
    {
        return [];
    }
}