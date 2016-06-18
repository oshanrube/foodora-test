<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/17/2016
 * Time: 07:08 PM
 */

namespace Classes;

use Classes\Factory\ScheduleFactory;
use Classes\Repository\SpecialDayRepository;
use Classes\Repository\ScheduleRepository;
use Classes\Repository\VendorRepository;
use Classes\Model\Schedule;
use Classes\Exceptions\RepositoryException;

/**
 * Class ScheduleFixer
 * One time script to fix the schedules table
 * @package Classes
 */
class ScheduleFixer
{
    /**
     * @var SpecialDayRepository
     */
    private $special_day_repository;
    /**
     * @var ScheduleRepository
     */
    private $schedule_repository;
    /**
     * @var VendorRepository
     */
    private $vendor_repository;

    /**
     * ScheduleFixer constructor.
     */
    public function __construct()
    {
        $this->special_day_repository = new SpecialDayRepository();
        $this->schedule_repository    = new ScheduleRepository();
        $this->vendor_repository      = new VendorRepository();
    }

    /**
     * execute the main process of the script
     */
    public function run()
    {
        //replacement or rollback
        if (date("Y-m-d") == '2015-12-20')
        {
            $this->runReplacement();
        }
        else
        {
            $this->runRollback();
        }
    }

    /**
     * run the replacement to replace all the schedules with special dates
     * @throws RepositoryException
     */
    public function runReplacement($from_date, $to_date)
    {
        //get all special day records
        foreach ($this->special_day_repository->getRecordDatesByDate($from_date, $to_date) as $special_date)
        {
            $weekday = date('N', strtotime($special_date->getSpecialDate()));
            //remove all schedule records for the date
            $this->schedule_repository->removeAllByDate($special_date->getVendorId(), $weekday);
            //load all special days
            //filter by event type OPEN since event type closed will delete the records
            $records = $this->special_day_repository->getRecordsByDate($special_date->getVendorId(), $special_date->getSpecialDate(), SpecialDayRepository::EVENT_TYPE_OPENED);
            foreach ($records as $record)
            {
                //create schedule based on the special date
                $schedule = new Schedule();
                $schedule->setVendorId($record->getVendorId());
                $schedule->setWeekday($weekday);
                $schedule->setAllDay($record->isAllDay());
                $schedule->setStartHour($record->getStartHour());
                $schedule->setStopHour($record->getStopHour());

                $this->schedule_repository->save($schedule);
            }
        }
    }

    /**
     * replace all the schedules with pre defined schedule
     */
    public function runRollback()
    {
        //get all vendors
        //loop through the vendors
        foreach ($this->vendor_repository->getAll() as $vendor)
        {
            //remove all scheduled records
            $this->schedule_repository->removeAllByVendor($vendor->getId());
            //generate schedule
            foreach (ScheduleFactory::create() as $schedule)
            {
                //set vendor
                $schedule->setVendorId($vendor->getId());
                //save
                $this->schedule_repository->save($schedule);
            }
        }
    }
}