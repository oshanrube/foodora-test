<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/18/2016
 * Time: 11:40 AM
 */

namespace Classes\Model;

/**
 * Class SpecialDay
 * @package Classes\Model
 */
class SpecialDay extends BaseRecord
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
    private $special_date;
    /**
     * @var
     */
    private $event_type;
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
    public function getSpecialDate()
    {
        return $this->special_date;
    }

    /**
     * @param mixed $special_date
     */
    public function setSpecialDate($special_date)
    {
        $this->special_date = $special_date;
    }

    /**
     * @return mixed
     */
    public function getEventType()
    {
        return $this->event_type;
    }

    /**
     * @param mixed $event_type
     */
    public function setEventType($event_type)
    {
        $this->event_type = $event_type;
    }

    /**
     * @return boolean
     */
    public function isAllDay()
    {
        return $this->all_day;
    }

    /**
     * @param boolean $all_day
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

}