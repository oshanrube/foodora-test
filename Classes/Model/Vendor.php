<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/18/2016
 * Time: 09:34 AM
 */

namespace Classes\Model;

/**
 * Class Vendor
 * @package Classes\Model
 */
class Vendor extends BaseRecord
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}