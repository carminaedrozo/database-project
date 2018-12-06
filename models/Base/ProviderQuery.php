<?php

namespace Base;

use \Provider as ChildProvider;
use \ProviderQuery as ChildProviderQuery;
use \Exception;
use \PDO;
use Map\ProviderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'provider' table.
 *
 *
 *
 * @method     ChildProviderQuery orderByProviderId($order = Criteria::ASC) Order by the Provider_ID column
 * @method     ChildProviderQuery orderByProviderName($order = Criteria::ASC) Order by the Provider_Name column
 * @method     ChildProviderQuery orderByProviderPhone($order = Criteria::ASC) Order by the Provider_Phone column
 * @method     ChildProviderQuery orderByProviderAddress($order = Criteria::ASC) Order by the Provider_Address column
 * @method     ChildProviderQuery orderByOrderlistId($order = Criteria::ASC) Order by the OrderList_ID column
 *
 * @method     ChildProviderQuery groupByProviderId() Group by the Provider_ID column
 * @method     ChildProviderQuery groupByProviderName() Group by the Provider_Name column
 * @method     ChildProviderQuery groupByProviderPhone() Group by the Provider_Phone column
 * @method     ChildProviderQuery groupByProviderAddress() Group by the Provider_Address column
 * @method     ChildProviderQuery groupByOrderlistId() Group by the OrderList_ID column
 *
 * @method     ChildProviderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProviderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProviderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProviderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProviderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProviderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProvider findOne(ConnectionInterface $con = null) Return the first ChildProvider matching the query
 * @method     ChildProvider findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProvider matching the query, or a new ChildProvider object populated from the query conditions when no match is found
 *
 * @method     ChildProvider findOneByProviderId(int $Provider_ID) Return the first ChildProvider filtered by the Provider_ID column
 * @method     ChildProvider findOneByProviderName(string $Provider_Name) Return the first ChildProvider filtered by the Provider_Name column
 * @method     ChildProvider findOneByProviderPhone(string $Provider_Phone) Return the first ChildProvider filtered by the Provider_Phone column
 * @method     ChildProvider findOneByProviderAddress(string $Provider_Address) Return the first ChildProvider filtered by the Provider_Address column
 * @method     ChildProvider findOneByOrderlistId(int $OrderList_ID) Return the first ChildProvider filtered by the OrderList_ID column *

 * @method     ChildProvider requirePk($key, ConnectionInterface $con = null) Return the ChildProvider by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvider requireOne(ConnectionInterface $con = null) Return the first ChildProvider matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProvider requireOneByProviderId(int $Provider_ID) Return the first ChildProvider filtered by the Provider_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvider requireOneByProviderName(string $Provider_Name) Return the first ChildProvider filtered by the Provider_Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvider requireOneByProviderPhone(string $Provider_Phone) Return the first ChildProvider filtered by the Provider_Phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvider requireOneByProviderAddress(string $Provider_Address) Return the first ChildProvider filtered by the Provider_Address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProvider requireOneByOrderlistId(int $OrderList_ID) Return the first ChildProvider filtered by the OrderList_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProvider[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProvider objects based on current ModelCriteria
 * @method     ChildProvider[]|ObjectCollection findByProviderId(int $Provider_ID) Return ChildProvider objects filtered by the Provider_ID column
 * @method     ChildProvider[]|ObjectCollection findByProviderName(string $Provider_Name) Return ChildProvider objects filtered by the Provider_Name column
 * @method     ChildProvider[]|ObjectCollection findByProviderPhone(string $Provider_Phone) Return ChildProvider objects filtered by the Provider_Phone column
 * @method     ChildProvider[]|ObjectCollection findByProviderAddress(string $Provider_Address) Return ChildProvider objects filtered by the Provider_Address column
 * @method     ChildProvider[]|ObjectCollection findByOrderlistId(int $OrderList_ID) Return ChildProvider objects filtered by the OrderList_ID column
 * @method     ChildProvider[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProviderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ProviderQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Provider', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProviderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProviderQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProviderQuery) {
            return $criteria;
        }
        $query = new ChildProviderQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildProvider|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProviderTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProviderTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProvider A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Provider_ID, Provider_Name, Provider_Phone, Provider_Address, OrderList_ID FROM provider WHERE Provider_ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildProvider $obj */
            $obj = new ChildProvider();
            $obj->hydrate($row);
            ProviderTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildProvider|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildProviderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProviderTableMap::COL_PROVIDER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProviderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProviderTableMap::COL_PROVIDER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Provider_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByProviderId(1234); // WHERE Provider_ID = 1234
     * $query->filterByProviderId(array(12, 34)); // WHERE Provider_ID IN (12, 34)
     * $query->filterByProviderId(array('min' => 12)); // WHERE Provider_ID > 12
     * </code>
     *
     * @param     mixed $providerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProviderQuery The current query, for fluid interface
     */
    public function filterByProviderId($providerId = null, $comparison = null)
    {
        if (is_array($providerId)) {
            $useMinMax = false;
            if (isset($providerId['min'])) {
                $this->addUsingAlias(ProviderTableMap::COL_PROVIDER_ID, $providerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($providerId['max'])) {
                $this->addUsingAlias(ProviderTableMap::COL_PROVIDER_ID, $providerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProviderTableMap::COL_PROVIDER_ID, $providerId, $comparison);
    }

    /**
     * Filter the query on the Provider_Name column
     *
     * Example usage:
     * <code>
     * $query->filterByProviderName('fooValue');   // WHERE Provider_Name = 'fooValue'
     * $query->filterByProviderName('%fooValue%', Criteria::LIKE); // WHERE Provider_Name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $providerName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProviderQuery The current query, for fluid interface
     */
    public function filterByProviderName($providerName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($providerName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProviderTableMap::COL_PROVIDER_NAME, $providerName, $comparison);
    }

    /**
     * Filter the query on the Provider_Phone column
     *
     * Example usage:
     * <code>
     * $query->filterByProviderPhone(1234); // WHERE Provider_Phone = 1234
     * $query->filterByProviderPhone(array(12, 34)); // WHERE Provider_Phone IN (12, 34)
     * $query->filterByProviderPhone(array('min' => 12)); // WHERE Provider_Phone > 12
     * </code>
     *
     * @param     mixed $providerPhone The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProviderQuery The current query, for fluid interface
     */
    public function filterByProviderPhone($providerPhone = null, $comparison = null)
    {
        if (is_array($providerPhone)) {
            $useMinMax = false;
            if (isset($providerPhone['min'])) {
                $this->addUsingAlias(ProviderTableMap::COL_PROVIDER_PHONE, $providerPhone['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($providerPhone['max'])) {
                $this->addUsingAlias(ProviderTableMap::COL_PROVIDER_PHONE, $providerPhone['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProviderTableMap::COL_PROVIDER_PHONE, $providerPhone, $comparison);
    }

    /**
     * Filter the query on the Provider_Address column
     *
     * Example usage:
     * <code>
     * $query->filterByProviderAddress('fooValue');   // WHERE Provider_Address = 'fooValue'
     * $query->filterByProviderAddress('%fooValue%', Criteria::LIKE); // WHERE Provider_Address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $providerAddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProviderQuery The current query, for fluid interface
     */
    public function filterByProviderAddress($providerAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($providerAddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProviderTableMap::COL_PROVIDER_ADDRESS, $providerAddress, $comparison);
    }

    /**
     * Filter the query on the OrderList_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderlistId(1234); // WHERE OrderList_ID = 1234
     * $query->filterByOrderlistId(array(12, 34)); // WHERE OrderList_ID IN (12, 34)
     * $query->filterByOrderlistId(array('min' => 12)); // WHERE OrderList_ID > 12
     * </code>
     *
     * @param     mixed $orderlistId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProviderQuery The current query, for fluid interface
     */
    public function filterByOrderlistId($orderlistId = null, $comparison = null)
    {
        if (is_array($orderlistId)) {
            $useMinMax = false;
            if (isset($orderlistId['min'])) {
                $this->addUsingAlias(ProviderTableMap::COL_ORDERLIST_ID, $orderlistId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderlistId['max'])) {
                $this->addUsingAlias(ProviderTableMap::COL_ORDERLIST_ID, $orderlistId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProviderTableMap::COL_ORDERLIST_ID, $orderlistId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProvider $provider Object to remove from the list of results
     *
     * @return $this|ChildProviderQuery The current query, for fluid interface
     */
    public function prune($provider = null)
    {
        if ($provider) {
            $this->addUsingAlias(ProviderTableMap::COL_PROVIDER_ID, $provider->getProviderId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the provider table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProviderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProviderTableMap::clearInstancePool();
            ProviderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProviderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProviderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProviderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProviderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProviderQuery
