<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/18/2016
 * Time: 12:54 PM
 */

namespace Classes\Helper;
/**
 * Class Where
 * @package Clasess\Helper
 */
class Where
{
    /**
     * @var
     */
    private $column_name;
    /**
     * @var
     */
    private $where_column;
    /**
     * @var
     */
    private $value;
    /**
     * @var string
     */
    private $comparison;

    /**
     * Where constructor.
     * @param        $column_name
     * @param        $value
     * @param        $where_column
     * @param string $comparison
     */
    public function __construct($column_name, $value, $where_column = '', $comparison = '=')
    {
        $this->column_name  = $column_name;
        $this->value        = $value;
        $this->where_column = ($where_column === '' ? $column_name : $where_column);
        $this->comparison   = $comparison;
    }

    /**
     * @return mixed
     */
    public function getColumnName()
    {
        return $this->column_name;
    }

    /**
     * @return mixed
     */
    public function getWhereColumn()
    {
        return $this->where_column;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getComparison()
    {
        return $this->comparison;
    }
}