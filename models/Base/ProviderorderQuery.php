<?php

namespace Base;

use \Providerorder as ChildProviderorder;
use \ProviderorderQuery as ChildProviderorderQuery;
use \Exception;
use \PDO;
use Map\ProviderorderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'providerorder' table.
 *
 *
 *
 * @method     ChildProviderorderQuery orderByOrderId($order = Criteria::ASC) Order by the Order_ID column
 * @method     ChildProviderorderQuery orderByCommission($order = Criteria::ASC) Order by the Commission column
 * @method     ChildProviderorderQuery orderByAmount($order = Criteria::ASC) Order by the Amount column
 * @method     ChildProviderorderQuery orderByDate($order = Criteria::ASC) Order by the Date column
 * @method     ChildProviderorderQuery orderByDeliveredDate($order = Criteria::ASC) Order by the Delivered_Date column
 * @method     ChildProviderorderQuery orderByStatusId($order = Criteria::ASC) Order by the Status_ID column
 *
 * @method     ChildProviderorderQuery groupByOrderId() Group by the Order_ID column
 * @method     ChildProviderorderQuery groupByCommission() Group by the Commission column
 * @method     ChildProviderorderQuery groupByAmount() Group by the Amount column
 * @method     ChildProviderorderQuery groupByDate() Group by the Date column
 * @method     ChildProviderorderQuery groupByDeliveredDate() Group by the Delivered_Date column
 * @method     ChildProviderorderQuery groupByStatusId() Group by the Status_ID column
 *
 * @method     ChildProviderorderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProviderorderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProviderorderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProviderorderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProviderorderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProviderorderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProviderorder findOne(ConnectionInterface $con = null) Return the first ChildProviderorder matching the query
 * @method     ChildProviderorder findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProviderorder matching the query, or a new ChildProviderorder object populated from the query conditions when no match is found
 *
 * @method     ChildProviderorder findOneByOrderId(int $Order_ID) Return the first ChildProviderorder filtered by the Order_ID column
 * @method     ChildProviderorder findOneByCommission(double $Commission) Return the first ChildProviderorder filtered by the Commission column
 * @method     ChildProviderorder findOneByAmount(double $Amount) Return the first ChildProviderorder filtered by the Amount column
 * @method     ChildProviderorder findOneByDate(string $Date) Return the first ChildProviderorder filtered by the Date column
 * @method     ChildProviderorder findOneByDeliveredDate(string $Delivered_Date) Return the first ChildProviderorder filtered by the Delivered_Date column
 * @method     ChildProviderorder findOneByStatusId(int $Status_ID) Return the first ChildProviderorder filtered by the Status_ID column *

 * @method     ChildProviderorder requirePk($key, ConnectionInterface $con = null) Return the ChildProviderorder by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProviderorder requireOne(ConnectionInterface $con = null) Return the first ChildProviderorder matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProviderorder requireOneByOrderId(int $Order_ID) Return the first ChildProviderorder filtered by the Order_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProviderorder requireOneByCommission(double $Commission) Return the first ChildProviderorder filtered by the Commission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProviderorder requireOneByAmount(double $Amount) Return the first ChildProviderorder filtered by the Amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProviderorder requireOneByDate(string $Date) Return the first ChildProviderorder filtered by the Date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProviderorder requireOneByDeliveredDate(string $Delivered_Date) Return the first ChildProviderorder filtered by the Delivered_Date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProviderorder requireOneByStatusId(int $Status_ID) Return the first ChildProviderorder filtered by the Status_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProviderorder[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProviderorder objects based on current ModelCriteria
 * @method     ChildProviderorder[]|ObjectCollection findByOrderId(int $Order_ID) Return ChildProviderorder objects filtered by the Order_ID column
 * @method     ChildProviderorder[]|ObjectCollection findByCommission(double $Commission) Return ChildProviderorder objects filtered by the Commission column
 * @method     ChildProviderorder[]|ObjectCollection findByAmount(double $Amount) Return ChildProviderorder objects filtered by the Amount column
 * @method     ChildProviderorder[]|ObjectCollection findByDate(string $Date) Return ChildProviderorder objects filtered by the Date column
 * @method     ChildProviderorder[]|ObjectCollection findByDeliveredDate(string $Delivered_Date) Return ChildProviderorder objects filtered by the Delivered_Date column
 * @method     ChildProviderorder[]|ObjectCollection findByStatusId(int $Status_ID) Return ChildProviderorder objects filtered by the Status_ID column
 * @method     ChildProviderorder[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProviderorderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ProviderorderQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Providerorder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProviderorderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProviderorderQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProviderorderQuery) {
            return $criteria;
        }
        $query = new ChildProviderorderQuery();
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
     * @return ChildProviderorder|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProviderorderTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProviderorderTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildProviderorder A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Order_ID, Commission, Amount, Date, Delivered_Date, Status_ID FROM providerorder WHERE Order_ID = :p0';
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
            /** @var ChildProviderorder $obj */
            $obj = new ChildProviderorder();
            $obj->hydrate($row);
            ProviderorderTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildProviderorder|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildProviderorderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProviderorderTableMap::COL_ORDER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProviderorderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProviderorderTableMap::COL_ORDER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Order_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderId(1234); // WHERE Order_ID = 1234
     * $query->filterByOrderId(array(12, 34)); // WHERE Order_ID IN (12, 34)
     * $query->filterByOrderId(array('min' => 12)); // WHERE Order_ID > 12
     * </code>
     *
     * @param     mixed $orderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProviderorderQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProviderorderTableMap::COL_ORDER_ID, $orderId, $comparison);
    }

    /**
     * Filter the query on the Commission column
     *
     * Example usage:
     * <code>
     * $query->filterByCommission(1234); // WHERE Commission = 1234
     * $query->filterByCommission(array(12, 34)); // WHERE Commission IN (12, 34)
     * $query->filterByCommission(array('min' => 12)); // WHERE Commission > 12
     * </code>
     *
     * @param     mixed $commission The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProviderorderQuery The current query, for fluid interface
     */
    public function filterByCommission($commission = null, $comparison = null)
    {
        if (is_array($commission)) {
            $useMinMax = false;
            if (isset($commission['min'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_COMMISSION, $commission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($commission['max'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_COMMISSION, $commission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProviderorderTableMap::COL_COMMISSION, $commission, $comparison);
    }

    /**
     * Filter the query on the Amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE Amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE Amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE Amount > 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProviderorderQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProviderorderTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the Date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE Date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE Date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE Date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProviderorderQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProviderorderTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the Delivered_Date column
     *
     * Example usage:
     * <code>
     * $query->filterByDeliveredDate('2011-03-14'); // WHERE Delivered_Date = '2011-03-14'
     * $query->filterByDeliveredDate('now'); // WHERE Delivered_Date = '2011-03-14'
     * $query->filterByDeliveredDate(array('max' => 'yesterday')); // WHERE Delivered_Date > '2011-03-13'
     * </code>
     *
     * @param     mixed $deliveredDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProviderorderQuery The current query, for fluid interface
     */
    public function filterByDeliveredDate($deliveredDate = null, $comparison = null)
    {
        if (is_array($deliveredDate)) {
            $useMinMax = false;
            if (isset($deliveredDate['min'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_DELIVERED_DATE, $deliveredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deliveredDate['max'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_DELIVERED_DATE, $deliveredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProviderorderTableMap::COL_DELIVERED_DATE, $deliveredDate, $comparison);
    }

    /**
     * Filter the query on the Status_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusId(1234); // WHERE Status_ID = 1234
     * $query->filterByStatusId(array(12, 34)); // WHERE Status_ID IN (12, 34)
     * $query->filterByStatusId(array('min' => 12)); // WHERE Status_ID > 12
     * </code>
     *
     * @param     mixed $statusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildProviderorderQuery The current query, for fluid interface
     */
    public function filterByStatusId($statusId = null, $comparison = null)
    {
        if (is_array($statusId)) {
            $useMinMax = false;
            if (isset($statusId['min'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_STATUS_ID, $statusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusId['max'])) {
                $this->addUsingAlias(ProviderorderTableMap::COL_STATUS_ID, $statusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProviderorderTableMap::COL_STATUS_ID, $statusId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProviderorder $providerorder Object to remove from the list of results
     *
     * @return $this|ChildProviderorderQuery The current query, for fluid interface
     */
    public function prune($providerorder = null)
    {
        if ($providerorder) {
            $this->addUsingAlias(ProviderorderTableMap::COL_ORDER_ID, $providerorder->getOrderId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the providerorder table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProviderorderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProviderorderTableMap::clearInstancePool();
            ProviderorderTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ProviderorderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProviderorderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProviderorderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProviderorderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProviderorderQuery
