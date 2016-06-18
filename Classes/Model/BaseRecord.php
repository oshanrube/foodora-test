<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/17/2016
 * Time: 09:38 PM
 */

namespace Classes\Model;

/**
 * Class BaseRecord
 * @package Classes\Model
 */
class BaseRecord
{
    /**
     * @param $column_name
     * @return string
     */
    private function getMethod($column_name)
    {
        return 'get' . str_replace(' ', '', ucwords(strtolower(str_replace('_', ' ', $column_name))));
    }

    /**
     * @param $column_name
     * @return string
     */
    private function getSetMethod($column_name)
    {
        return 'set' . str_replace(' ', '', ucwords(strtolower(str_replace('_', ' ', $column_name))));
    }

    /**
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    public function __get($name)
    {
        $getMethod = $this->getMethod($name);
        if (method_exists($this, $getMethod))
        {
            return $this->$getMethod();
        }
        else
        {
            throw new \Exception(sprintf('Invalid parameter: %s', $name));
        }
    }

    /**
     * @param $name
     * @param $value
     * @return mixed
     * @throws \Exception
     */
    public function __set($name, $value)
    {
        $setMethod = $this->getSetMethod($name);
        if (method_exists($this, $setMethod))
        {
            return $this->$setMethod($value);
        }
        else
        {
            throw new \Exception(sprintf('Invalid parameter: %s', $name));
        }
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return array();
    }
}