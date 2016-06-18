<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/17/2016
 * Time: 08:59 PM
 */

namespace Classes\Repository;

use Classes\Exceptions\RepositoryException;

/**
 * Class ScheduleRepository
 * @package Classes\Repository
 */
class ScheduleRepository extends BaseRepository
{
    /**
     * table name
     */
    const TABLE_NAME = 'vendor_schedule';

    /**
     * remove all the records related to a vendor on a specifica weekday
     * @param $vendor_id
     * @param $weekday
     * @return mixed
     * @throws RepositoryException
     */
    public function removeAllByDate($vendor_id, $weekday)
    {
        return parent::delete(self::TABLE_NAME, array('vendor_id' => $vendor_id, 'weekday' => $weekday));
    }

    /**
     * @param $vendor_id
     * @return mixed
     * @throws RepositoryException
     */
    public function removeAllByVendor($vendor_id)
    {
        return parent::delete(self::TABLE_NAME, array('vendor_id' => $vendor_id));
    }

    /**
     * save the schedule to the database
     * @param \Classes\Model\BaseRecord $schedule
     * @throws RepositoryException
     */
    public function save($schedule)
    {
        return parent::save($schedule, self::TABLE_NAME);
    }
}