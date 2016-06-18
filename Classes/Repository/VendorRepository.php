<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/18/2016
 * Time: 09:00 AM
 */

namespace Classes\Repository;

use Classes\Model\Schedule;

/**
 * Class VendorRepository
 * @package Classes\Repository
 */
class VendorRepository extends BaseRepository
{
    /**
     * table name
     */
    const TABLE_NAME = 'vendor';

    /**
     * @return \Classes\Model\Vendor[]
     * @throws \Classes\Exceptions\RepositoryException
     */
    public function getAll()
    {
        return parent::getAll(self::TABLE_NAME, '\Classes\Model\Vendor');
    }

    /**
     * @param Schedule $schedule
     * @return bool
     * @throws \Classes\Exceptions\RepositoryException
     */
    public function save(Schedule $schedule)
    {
        return parent::save($schedule, self::TABLE_NAME);
    }
}