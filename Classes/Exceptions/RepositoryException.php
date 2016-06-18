<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/18/2016
 * Time: 11:08 AM
 */

namespace Classes\Exceptions;

/**
 * Class RepositoryException
 * @package Classes\Exceptions
 */
class RepositoryException extends \Exception
{
    /**
     * RepositoryException constructor.
     * @param string $errorInfo
     */
    public function __construct($errorInfo)
    {
        return parent::__construct(sprintf('failed to insert record: %s', $errorInfo[2]));
    }
}