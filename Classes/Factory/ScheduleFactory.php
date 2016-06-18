<?php

namespace Classes\Factory;

use Classes\Model\Schedule;

/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/18/2016
 * Time: 09:36 AM
 */
class ScheduleFactory
{
    /**
     * generate the records for the schedule table
     * @return Schedule[]
     */
    public static function create()
    {
        $schedules = array();
        //opened from 19:00 to 22:00 from Tuesday to Friday, from 11:00 to 14:00 and 19:00 to 23:59:59 on Saturday and 24-hours opened on sundays. On Monday it is closed.
        for ($x = 2; $x <= 5; $x++)
        {
            $schedule = new Schedule();
            $schedule->setWeekday($x);
            $schedule->setStartHour('19:00:00');
            $schedule->setStopHour('22:00:00');
            $schedules[] = $schedule;
        }
        //from 11:00 to 14:00 and 19:00 to 23:59:59 on Saturday
        $schedule = new Schedule();
        $schedule->setWeekday(6);
        $schedule->setStartHour('11:00:00');
        $schedule->setStopHour('14:00:00');
        $schedules[] = $schedule;

        $schedule = new Schedule();
        $schedule->setWeekday(6);
        $schedule->setStartHour('19:00:00');
        $schedule->setStopHour('22:00:00');
        $schedules[] = $schedule;

        //24-hours opened on sundays
        $schedule = new Schedule();
        $schedule->setWeekday(7);
        $schedule->setAllDay(1);
        $schedules[] = $schedule;

        return $schedules;
    }
}