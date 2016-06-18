<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/17/2016
 * Time: 09:17 PM
 */

namespace Classes\Model;

/**
 * Class Schedule
 * @package Classes\Model
 */
class Schedule extends BaseRecord
{

    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $vendor_id;
    /**
     * @var
     */
    private $weekday;
    /**
     * @var bool
     */
    private $all_day = false;
    /**
     * @var
     */
    private $start_hour;
    /**
     * @var
     */
    private $stop_hour;

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
    public function getVendorId()
    {
        return $this->vendor_id;
    }

    /**
     * @param mixed $vendor_id
     */
    public function setVendorId($vendor_id)
    {
        $this->vendor_id = $vendor_id;
    }

    /**
     * @return mixed
     */
    public function getWeekday()
    {
        return $this->weekday;
    }

    /**
     * @param mixed $weekday
     */
    public function setWeekday($weekday)
    {
        $this->weekday = $weekday;
    }

    /**
     * @return mixed
     */
    public function getAllDay()
    {
        return $this->all_day;
    }

    /**
     * @param mixed $all_day
     */
    public function setAllDay($all_day)
    {
        $this->all_day = $all_day;
    }

    /**
     * @return mixed
     */
    public function getStartHour()
    {
        return $this->start_hour;
    }

    /**
     * @param mixed $start_hour
     */
    public function setStartHour($start_hour)
    {
        $this->start_hour = $start_hour;
    }

    /**
     * @return mixed
     */
    public function getStopHour()
    {
        return $this->stop_hour;
    }

    /**
     * @param mixed $stop_hour
     */
    public function setStopHour($stop_hour)
    {
        $this->stop_hour = $stop_hour;
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return array('id', 'vendor_id', 'weekday', 'all_day', 'start_hour', 'stop_hour');
    }
}