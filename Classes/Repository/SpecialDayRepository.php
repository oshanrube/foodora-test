<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/17/2016
 * Time: 08:26 PM
 */

namespace Classes\Repository;

use Classes\Helper\Where;
use Classes\Exceptions\RepositoryException;
use Classes\Model\SpecialDay;

/**
 * Class SpecialDayRepository
 * @package Classes\Repository
 */
class SpecialDayRepository extends BaseRepository
{
    /**
     * keyword of event type closed
     */
    const EVENT_TYPE_CLOSED = 'closed';
    /**
     * keyword of event type opened
     */
    const EVENT_TYPE_OPENED = 'opened';
    /**
     * table name
     */
    const TABLE_NAME = 'vendor_special_day';

    /**
     * get all the special days within the days
     * @param $from_date
     * @param $to_date
     * @return SpecialDay[]
     * @throws RepositoryException
     */
    public function getRecordDatesByDate($from_date, $to_date)
    {
        return parent::getRecords(self::TABLE_NAME, '\Classes\Model\SpecialDay', array(new Where('special_date', $from_date, 'from_date', '>='), new Where('special_date', $to_date, 'to_date', '<=')), array('`vendor_id`', '`special_date`'), array('`vendor_id`', '`special_date`'));
    }

    /**
     * get all the special day rules
     * @param $vendor_id
     * @param $special_date
     * @param $event_type
     * @return SpecialDay[]
     * @throws RepositoryException
     */
    public function getRecordsByDate($vendor_id, $special_date, $event_type)
    {
        return parent::getRecords(self::TABLE_NAME, '\Classes\Model\SpecialDay', array(new Where('vendor_id', $vendor_id), new Where('special_date', $special_date), new Where('event_type', $event_type)));
    }
}