<?php

namespace Map;

use \Requestorder;
use \RequestorderQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'requestorder' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class RequestorderTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.RequestorderTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'requestorder';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Requestorder';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Requestorder';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the Order_ID field
     */
    const COL_ORDER_ID = 'requestorder.Order_ID';

    /**
     * the column name for the Commission field
     */
    const COL_COMMISSION = 'requestorder.Commission';

    /**
     * the column name for the Amount field
     */
    const COL_AMOUNT = 'requestorder.Amount';

    /**
     * the column name for the Date field
     */
    const COL_DATE = 'requestorder.Date';

    /**
     * the column name for the Delivered_Date field
     */
    const COL_DELIVERED_DATE = 'requestorder.Delivered_Date';

    /**
     * the column name for the Status_ID field
     */
    const COL_STATUS_ID = 'requestorder.Status_ID';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('OrderId', 'Commission', 'Amount', 'Date', 'DeliveredDate', 'StatusId', ),
        self::TYPE_CAMELNAME     => array('orderId', 'commission', 'amount', 'date', 'deliveredDate', 'statusId', ),
        self::TYPE_COLNAME       => array(RequestorderTableMap::COL_ORDER_ID, RequestorderTableMap::COL_COMMISSION, RequestorderTableMap::COL_AMOUNT, RequestorderTableMap::COL_DATE, RequestorderTableMap::COL_DELIVERED_DATE, RequestorderTableMap::COL_STATUS_ID, ),
        self::TYPE_FIELDNAME     => array('Order_ID', 'Commission', 'Amount', 'Date', 'Delivered_Date', 'Status_ID', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('OrderId' => 0, 'Commission' => 1, 'Amount' => 2, 'Date' => 3, 'DeliveredDate' => 4, 'StatusId' => 5, ),
        self::TYPE_CAMELNAME     => array('orderId' => 0, 'commission' => 1, 'amount' => 2, 'date' => 3, 'deliveredDate' => 4, 'statusId' => 5, ),
        self::TYPE_COLNAME       => array(RequestorderTableMap::COL_ORDER_ID => 0, RequestorderTableMap::COL_COMMISSION => 1, RequestorderTableMap::COL_AMOUNT => 2, RequestorderTableMap::COL_DATE => 3, RequestorderTableMap::COL_DELIVERED_DATE => 4, RequestorderTableMap::COL_STATUS_ID => 5, ),
        self::TYPE_FIELDNAME     => array('Order_ID' => 0, 'Commission' => 1, 'Amount' => 2, 'Date' => 3, 'Delivered_Date' => 4, 'Status_ID' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('requestorder');
        $this->setPhpName('Requestorder');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Requestorder');
        $this->setPackage('');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('Order_ID', 'OrderId', 'INTEGER', true, null, null);
        $this->addColumn('Commission', 'Commission', 'DOUBLE', true, null, null);
        $this->addColumn('Amount', 'Amount', 'DOUBLE', true, null, null);
        $this->addColumn('Date', 'Date', 'DATE', true, null, null);
        $this->addColumn('Delivered_Date', 'DeliveredDate', 'DATE', true, null, null);
        $this->addColumn('Status_ID', 'StatusId', 'INTEGER', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? RequestorderTableMap::CLASS_DEFAULT : RequestorderTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Requestorder object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = RequestorderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = RequestorderTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + RequestorderTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RequestorderTableMap::OM_CLASS;
            /** @var Requestorder $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            RequestorderTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = RequestorderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = RequestorderTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Requestorder $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RequestorderTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(RequestorderTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(RequestorderTableMap::COL_COMMISSION);
            $criteria->addSelectColumn(RequestorderTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(RequestorderTableMap::COL_DATE);
            $criteria->addSelectColumn(RequestorderTableMap::COL_DELIVERED_DATE);
            $criteria->addSelectColumn(RequestorderTableMap::COL_STATUS_ID);
        } else {
            $criteria->addSelectColumn($alias . '.Order_ID');
            $criteria->addSelectColumn($alias . '.Commission');
            $criteria->addSelectColumn($alias . '.Amount');
            $criteria->addSelectColumn($alias . '.Date');
            $criteria->addSelectColumn($alias . '.Delivered_Date');
            $criteria->addSelectColumn($alias . '.Status_ID');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(RequestorderTableMap::DATABASE_NAME)->getTable(RequestorderTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(RequestorderTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(RequestorderTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new RequestorderTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Requestorder or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Requestorder object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RequestorderTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Requestorder) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RequestorderTableMap::DATABASE_NAME);
            $criteria->add(RequestorderTableMap::COL_ORDER_ID, (array) $values, Criteria::IN);
        }

        $query = RequestorderQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            RequestorderTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                RequestorderTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the requestorder table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return RequestorderQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Requestorder or Criteria object.
     *
     * @param mixed               $criteria Criteria or Requestorder object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RequestorderTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Requestorder object
        }


        // Set the correct dbName
        $query = RequestorderQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // RequestorderTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
RequestorderTableMap::buildTableMap();
