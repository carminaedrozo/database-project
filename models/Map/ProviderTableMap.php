<?php

namespace Map;

use \Provider;
use \ProviderQuery;
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
 * This class defines the structure of the 'provider' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ProviderTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ProviderTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'provider';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Provider';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Provider';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the Provider_ID field
     */
    const COL_PROVIDER_ID = 'provider.Provider_ID';

    /**
     * the column name for the Provider_Name field
     */
    const COL_PROVIDER_NAME = 'provider.Provider_Name';

    /**
     * the column name for the Provider_Phone field
     */
    const COL_PROVIDER_PHONE = 'provider.Provider_Phone';

    /**
     * the column name for the Provider_Address field
     */
    const COL_PROVIDER_ADDRESS = 'provider.Provider_Address';

    /**
     * the column name for the OrderList_ID field
     */
    const COL_ORDERLIST_ID = 'provider.OrderList_ID';

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
        self::TYPE_PHPNAME       => array('ProviderId', 'ProviderName', 'ProviderPhone', 'ProviderAddress', 'OrderlistId', ),
        self::TYPE_CAMELNAME     => array('providerId', 'providerName', 'providerPhone', 'providerAddress', 'orderlistId', ),
        self::TYPE_COLNAME       => array(ProviderTableMap::COL_PROVIDER_ID, ProviderTableMap::COL_PROVIDER_NAME, ProviderTableMap::COL_PROVIDER_PHONE, ProviderTableMap::COL_PROVIDER_ADDRESS, ProviderTableMap::COL_ORDERLIST_ID, ),
        self::TYPE_FIELDNAME     => array('Provider_ID', 'Provider_Name', 'Provider_Phone', 'Provider_Address', 'OrderList_ID', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ProviderId' => 0, 'ProviderName' => 1, 'ProviderPhone' => 2, 'ProviderAddress' => 3, 'OrderlistId' => 4, ),
        self::TYPE_CAMELNAME     => array('providerId' => 0, 'providerName' => 1, 'providerPhone' => 2, 'providerAddress' => 3, 'orderlistId' => 4, ),
        self::TYPE_COLNAME       => array(ProviderTableMap::COL_PROVIDER_ID => 0, ProviderTableMap::COL_PROVIDER_NAME => 1, ProviderTableMap::COL_PROVIDER_PHONE => 2, ProviderTableMap::COL_PROVIDER_ADDRESS => 3, ProviderTableMap::COL_ORDERLIST_ID => 4, ),
        self::TYPE_FIELDNAME     => array('Provider_ID' => 0, 'Provider_Name' => 1, 'Provider_Phone' => 2, 'Provider_Address' => 3, 'OrderList_ID' => 4, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, )
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
        $this->setName('provider');
        $this->setPhpName('Provider');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Provider');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('Provider_ID', 'ProviderId', 'INTEGER', true, null, null);
        $this->addColumn('Provider_Name', 'ProviderName', 'LONGVARCHAR', true, null, null);
        $this->addColumn('Provider_Phone', 'ProviderPhone', 'INTEGER', true, null, null);
        $this->addColumn('Provider_Address', 'ProviderAddress', 'LONGVARCHAR', true, null, null);
        $this->addColumn('OrderList_ID', 'OrderlistId', 'INTEGER', true, null, null);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProviderId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProviderId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProviderId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProviderId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProviderId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProviderId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ProviderId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ProviderTableMap::CLASS_DEFAULT : ProviderTableMap::OM_CLASS;
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
     * @return array           (Provider object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ProviderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ProviderTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ProviderTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProviderTableMap::OM_CLASS;
            /** @var Provider $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ProviderTableMap::addInstanceToPool($obj, $key);
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
            $key = ProviderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ProviderTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Provider $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProviderTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ProviderTableMap::COL_PROVIDER_ID);
            $criteria->addSelectColumn(ProviderTableMap::COL_PROVIDER_NAME);
            $criteria->addSelectColumn(ProviderTableMap::COL_PROVIDER_PHONE);
            $criteria->addSelectColumn(ProviderTableMap::COL_PROVIDER_ADDRESS);
            $criteria->addSelectColumn(ProviderTableMap::COL_ORDERLIST_ID);
        } else {
            $criteria->addSelectColumn($alias . '.Provider_ID');
            $criteria->addSelectColumn($alias . '.Provider_Name');
            $criteria->addSelectColumn($alias . '.Provider_Phone');
            $criteria->addSelectColumn($alias . '.Provider_Address');
            $criteria->addSelectColumn($alias . '.OrderList_ID');
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
        return Propel::getServiceContainer()->getDatabaseMap(ProviderTableMap::DATABASE_NAME)->getTable(ProviderTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ProviderTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ProviderTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ProviderTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Provider or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Provider object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ProviderTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Provider) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProviderTableMap::DATABASE_NAME);
            $criteria->add(ProviderTableMap::COL_PROVIDER_ID, (array) $values, Criteria::IN);
        }

        $query = ProviderQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ProviderTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ProviderTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the provider table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ProviderQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Provider or Criteria object.
     *
     * @param mixed               $criteria Criteria or Provider object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProviderTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Provider object
        }

        if ($criteria->containsKey(ProviderTableMap::COL_PROVIDER_ID) && $criteria->keyContainsValue(ProviderTableMap::COL_PROVIDER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProviderTableMap::COL_PROVIDER_ID.')');
        }


        // Set the correct dbName
        $query = ProviderQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ProviderTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ProviderTableMap::buildTableMap();
