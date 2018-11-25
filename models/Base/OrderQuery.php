<?php

namespace Base;

use \Order as ChildOrder;
use \OrderQuery as ChildOrderQuery;
use \Exception;
use \PDO;
use Map\OrderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'order' table.
 *
 *
 *
 * @method     ChildOrderQuery orderByOrderId($order = Criteria::ASC) Order by the Order_ID column
 * @method     ChildOrderQuery orderByCommission($order = Criteria::ASC) Order by the Commission column
 * @method     ChildOrderQuery orderByAmount($order = Criteria::ASC) Order by the Amount column
 * @method     ChildOrderQuery orderByDate($order = Criteria::ASC) Order by the Date column
 * @method     ChildOrderQuery orderByDeliveryDate($order = Criteria::ASC) Order by the Delivery_Date column
 * @method     ChildOrderQuery orderByProductlistId($order = Criteria::ASC) Order by the ProductList_ID column
 *
 * @method     ChildOrderQuery groupByOrderId() Group by the Order_ID column
 * @method     ChildOrderQuery groupByCommission() Group by the Commission column
 * @method     ChildOrderQuery groupByAmount() Group by the Amount column
 * @method     ChildOrderQuery groupByDate() Group by the Date column
 * @method     ChildOrderQuery groupByDeliveryDate() Group by the Delivery_Date column
 * @method     ChildOrderQuery groupByProductlistId() Group by the ProductList_ID column
 *
 * @method     ChildOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrder findOne(ConnectionInterface $con = null) Return the first ChildOrder matching the query
 * @method     ChildOrder findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrder matching the query, or a new ChildOrder object populated from the query conditions when no match is found
 *
 * @method     ChildOrder findOneByOrderId(int $Order_ID) Return the first ChildOrder filtered by the Order_ID column
 * @method     ChildOrder findOneByCommission(int $Commission) Return the first ChildOrder filtered by the Commission column
 * @method     ChildOrder findOneByAmount(int $Amount) Return the first ChildOrder filtered by the Amount column
 * @method     ChildOrder findOneByDate(string $Date) Return the first ChildOrder filtered by the Date column
 * @method     ChildOrder findOneByDeliveryDate(string $Delivery_Date) Return the first ChildOrder filtered by the Delivery_Date column
 * @method     ChildOrder findOneByProductlistId(int $ProductList_ID) Return the first ChildOrder filtered by the ProductList_ID column *

 * @method     ChildOrder requirePk($key, ConnectionInterface $con = null) Return the ChildOrder by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOne(ConnectionInterface $con = null) Return the first ChildOrder matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrder requireOneByOrderId(int $Order_ID) Return the first ChildOrder filtered by the Order_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByCommission(int $Commission) Return the first ChildOrder filtered by the Commission column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByAmount(int $Amount) Return the first ChildOrder filtered by the Amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByDate(string $Date) Return the first ChildOrder filtered by the Date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByDeliveryDate(string $Delivery_Date) Return the first ChildOrder filtered by the Delivery_Date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByProductlistId(int $ProductList_ID) Return the first ChildOrder filtered by the ProductList_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrder[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOrder objects based on current ModelCriteria
 * @method     ChildOrder[]|ObjectCollection findByOrderId(int $Order_ID) Return ChildOrder objects filtered by the Order_ID column
 * @method     ChildOrder[]|ObjectCollection findByCommission(int $Commission) Return ChildOrder objects filtered by the Commission column
 * @method     ChildOrder[]|ObjectCollection findByAmount(int $Amount) Return ChildOrder objects filtered by the Amount column
 * @method     ChildOrder[]|ObjectCollection findByDate(string $Date) Return ChildOrder objects filtered by the Date column
 * @method     ChildOrder[]|ObjectCollection findByDeliveryDate(string $Delivery_Date) Return ChildOrder objects filtered by the Delivery_Date column
 * @method     ChildOrder[]|ObjectCollection findByProductlistId(int $ProductList_ID) Return ChildOrder objects filtered by the ProductList_ID column
 * @method     ChildOrder[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OrderQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Order', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrderQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOrderQuery) {
            return $criteria;
        }
        $query = new ChildOrderQuery();
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
     * @return ChildOrder|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrderTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrderTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOrder A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Order_ID, Commission, Amount, Date, Delivery_Date, ProductList_ID FROM order WHERE Order_ID = :p0';
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
            /** @var ChildOrder $obj */
            $obj = new ChildOrder();
            $obj->hydrate($row);
            OrderTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOrder|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOrderQuery The current query, for fluid interface
     */
    public function filterByOrderId($orderId = null, $comparison = null)
    {
        if (is_array($orderId)) {
            $useMinMax = false;
            if (isset($orderId['min'])) {
                $this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderId['max'])) {
                $this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $orderId, $comparison);
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
     * @return $this|ChildOrderQuery The current query, for fluid interface
     */
    public function filterByCommission($commission = null, $comparison = null)
    {
        if (is_array($commission)) {
            $useMinMax = false;
            if (isset($commission['min'])) {
                $this->addUsingAlias(OrderTableMap::COL_COMMISSION, $commission['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($commission['max'])) {
                $this->addUsingAlias(OrderTableMap::COL_COMMISSION, $commission['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderTableMap::COL_COMMISSION, $commission, $comparison);
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
     * @return $this|ChildOrderQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(OrderTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(OrderTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderTableMap::COL_AMOUNT, $amount, $comparison);
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
     * @return $this|ChildOrderQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(OrderTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(OrderTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the Delivery_Date column
     *
     * Example usage:
     * <code>
     * $query->filterByDeliveryDate('2011-03-14'); // WHERE Delivery_Date = '2011-03-14'
     * $query->filterByDeliveryDate('now'); // WHERE Delivery_Date = '2011-03-14'
     * $query->filterByDeliveryDate(array('max' => 'yesterday')); // WHERE Delivery_Date > '2011-03-13'
     * </code>
     *
     * @param     mixed $deliveryDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderQuery The current query, for fluid interface
     */
    public function filterByDeliveryDate($deliveryDate = null, $comparison = null)
    {
        if (is_array($deliveryDate)) {
            $useMinMax = false;
            if (isset($deliveryDate['min'])) {
                $this->addUsingAlias(OrderTableMap::COL_DELIVERY_DATE, $deliveryDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deliveryDate['max'])) {
                $this->addUsingAlias(OrderTableMap::COL_DELIVERY_DATE, $deliveryDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderTableMap::COL_DELIVERY_DATE, $deliveryDate, $comparison);
    }

    /**
     * Filter the query on the ProductList_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByProductlistId(1234); // WHERE ProductList_ID = 1234
     * $query->filterByProductlistId(array(12, 34)); // WHERE ProductList_ID IN (12, 34)
     * $query->filterByProductlistId(array('min' => 12)); // WHERE ProductList_ID > 12
     * </code>
     *
     * @param     mixed $productlistId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderQuery The current query, for fluid interface
     */
    public function filterByProductlistId($productlistId = null, $comparison = null)
    {
        if (is_array($productlistId)) {
            $useMinMax = false;
            if (isset($productlistId['min'])) {
                $this->addUsingAlias(OrderTableMap::COL_PRODUCTLIST_ID, $productlistId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productlistId['max'])) {
                $this->addUsingAlias(OrderTableMap::COL_PRODUCTLIST_ID, $productlistId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderTableMap::COL_PRODUCTLIST_ID, $productlistId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrder $order Object to remove from the list of results
     *
     * @return $this|ChildOrderQuery The current query, for fluid interface
     */
    public function prune($order = null)
    {
        if ($order) {
            $this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $order->getOrderId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the order table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrderTableMap::clearInstancePool();
            OrderTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OrderQuery
