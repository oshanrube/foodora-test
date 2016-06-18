<?php
/**
 * Created by PhpStorm.
 * User: Oshan
 * Date: 6/17/2016
 * Time: 08:25 PM
 */

namespace Classes\Repository;

use Classes\Config\DBConfig;
use Classes\Exceptions\RepositoryException;
use Classes\Model\BaseRecord;
use Classes\Helper\Where;

/**
 * Class BaseRepository
 * Base class for repository transactions
 * @package Classes\Repository
 */
class BaseRepository
{
    /**
     * @var \PDO
     */
    protected $pdo;

    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        //initialize the DB connection
        $this->pdo = new \PDO(DBConfig::getDsn(), DBConfig::USERNAME, DBConfig::PASSWORD);
    }

    /**
     * save the models to the database
     * @param BaseRecord $model
     * @param            $table_name
     * @return bool
     * @throws RepositoryException
     */
    protected function save(BaseRecord $model, $table_name)
    {
        $columns      = array();
        $bind_columns = array();
        $values       = array();
        foreach ($model->getColumns() as $column)
        {
            if (null !== ($value = $model->$column))
            {
                $columns[]       = '`' . $column . '`';
                $bind_columns[]  = ':' . $column;
                $values[$column] = $value;
            }
        }

        // begin transaction
        $this->pdo->beginTransaction();
        try
        {
            $sql   = 'INSERT INTO `' . DBConfig::DATABASE . '`.`' . $table_name . '` (' . implode(',', $columns) . ') VALUES ( ' . implode(',', $bind_columns) . ' ) ';
            $query = $this->pdo->prepare($sql);

            //bind values
            foreach ($values as $column => $value)
            {
                $query->bindValue(':' . $column, $value);
            }

            //process
            if (!$query->execute())
            {
                throw new RepositoryException($query->errorInfo());
            }
            $this->pdo->commit();

        } // any errors from the above database queries will be catched
        catch (\PDOException $e)
        {
            // roll back transaction
            $this->pdo->rollback();
            // log any errors to file
            throw $e;
        }
        return true;
    }

    /**
     * save the models to the database
     * @param            $table_name
     * @param            $where
     * @return bool
     * @throws RepositoryException
     */
    protected function delete($table_name, $where)
    {
        $columns = array();
        foreach ($where as $column => $value)
        {
            $columns[] = ' `' . $column . '` = :' . $column;
        }

        // begin transaction
        $this->pdo->beginTransaction();
        try
        {
            $sql   = 'DELETE FROM `' . DBConfig::DATABASE . '`.`' . $table_name . '` WHERE ' . implode(' AND ', $columns);
            $query = $this->pdo->prepare($sql);

            //bind values
            foreach ($where as $column => $value)
            {
                $query->bindValue(':' . $column, $value);
            }

            //process
            if (!$query->execute())
            {
                throw new RepositoryException('failed to insert record: %s', $query->errorInfo());
            }
            $this->pdo->commit();

        } // any errors from the above database queries will be catched
        catch (\PDOException $e)
        {
            // roll back transaction
            $this->pdo->rollback();
            // log any errors to file
            throw $e;
        }
        return true;
    }

    /**
     * get the records from the db filtered by values
     * @param            $table_name
     * @param Where[]    $where
     * @return bool
     * @throws RepositoryException
     */
    protected function getRecords($table_name, $object_class, $where = null, $columns = null, $group_by = null)
    {
        $where_columns = array();
        if ($where !== null)
        {
            foreach ($where as $value)
            {
                $where_columns[] = ' `' . $value->getColumnName() . '` ' . $value->getComparison() . ' :' . $value->getWhereColumn();
            }
        }

        //build sql
        $sql = 'SELECT ' . ($columns === null ? '*' : implode(',', $columns)) . ' FROM `' . DBConfig::DATABASE . '`.`' . $table_name . '`';
        $sql .= ($where !== null ? ' WHERE ' . implode(' AND ', $where_columns) : '');
        $sql .= ($group_by !== null ? ' GROUP BY ' . implode(',', $group_by) : '');
        $query = $this->pdo->prepare($sql);

        if ($where !== null)
        {
            //bind values
            foreach ($where as $value)
            {
                $query->bindValue(':' . $value->getWhereColumn(), $value->getValue());
            }
        }

        //process
        if (!$query->execute())
        {
            throw new RepositoryException('failed to insert record: %s', $query->errorInfo());
        }
        return $query->fetchAll(\PDO::FETCH_CLASS, $object_class);
    }

    /**
     * get all records for the table from database
     * @param $table_name
     * @param $object_class
     * @return BaseRecord[]
     * @throws RepositoryException
     */
    protected function getAll($table_name, $object_class)
    {
        return $this->getRecords($table_name, $object_class);
    }
}