<?php

namespace app\models\common;
use app\components\DataModel;

/**
 * Created by PhpStorm.
 * User: jaymie.huang
 * Date: 2016/12/29
 * Time: 15:10
 */
class Param extends DataModel
{
    private $system;

    public function scenarioFields()
    {

    }

    /**
     * @return mixed
     */
    public function getSystem()
    {
        return $this->system;
    }

    /**
     * @param mixed $system
     */
    public function setSystem($system)
    {
        $this->system = $system;
    }

}