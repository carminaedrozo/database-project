<?php

namespace Base;

use \Requests as ChildRequests;
use \RequestsQuery as ChildRequestsQuery;
use \Exception;
use \PDO;
use Map\RequestsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'requests' table.
 *
 *
 *
 * @method     ChildRequestsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildRequestsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildRequestsQuery orderByStatusId($order = Criteria::ASC) Order by the status_id column
 * @method     ChildRequestsQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildRequestsQuery orderByDateRequested($order = Criteria::ASC) Order by the date_requested column
 * @method     ChildRequestsQuery orderByDateCompleted($order = Criteria::ASC) Order by the date_completed column
 *
 * @method     ChildRequestsQuery groupById() Group by the id column
 * @method     ChildRequestsQuery groupByUserId() Group by the user_id column
 * @method     ChildRequestsQuery groupByStatusId() Group by the status_id column
 * @method     ChildRequestsQuery groupByTotal() Group by the total column
 * @method     ChildRequestsQuery groupByDateRequested() Group by the date_requested column
 * @method     ChildRequestsQuery groupByDateCompleted() Group by the date_completed column
 *
 * @method     ChildRequestsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRequestsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRequestsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRequestsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRequestsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRequestsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRequests findOne(ConnectionInterface $con = null) Return the first ChildRequests matching the query
 * @method     ChildRequests findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRequests matching the query, or a new ChildRequests object populated from the query conditions when no match is found
 *
 * @method     ChildRequests findOneById(int $id) Return the first ChildRequests filtered by the id column
 * @method     ChildRequests findOneByUserId(int $user_id) Return the first ChildRequests filtered by the user_id column
 * @method     ChildRequests findOneByStatusId(int $status_id) Return the first ChildRequests filtered by the status_id column
 * @method     ChildRequests findOneByTotal(string $total) Return the first ChildRequests filtered by the total column
 * @method     ChildRequests findOneByDateRequested(string $date_requested) Return the first ChildRequests filtered by the date_requested column
 * @method     ChildRequests findOneByDateCompleted(string $date_completed) Return the first ChildRequests filtered by the date_completed column *

 * @method     ChildRequests requirePk($key, ConnectionInterface $con = null) Return the ChildRequests by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequests requireOne(ConnectionInterface $con = null) Return the first ChildRequests matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRequests requireOneById(int $id) Return the first ChildRequests filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequests requireOneByUserId(int $user_id) Return the first ChildRequests filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequests requireOneByStatusId(int $status_id) Return the first ChildRequests filtered by the status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequests requireOneByTotal(string $total) Return the first ChildRequests filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequests requireOneByDateRequested(string $date_requested) Return the first ChildRequests filtered by the date_requested column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequests requireOneByDateCompleted(string $date_completed) Return the first ChildRequests filtered by the date_completed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRequests[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRequests objects based on current ModelCriteria
 * @method     ChildRequests[]|ObjectCollection findById(int $id) Return ChildRequests objects filtered by the id column
 * @method     ChildRequests[]|ObjectCollection findByUserId(int $user_id) Return ChildRequests objects filtered by the user_id column
 * @method     ChildRequests[]|ObjectCollection findByStatusId(int $status_id) Return ChildRequests objects filtered by the status_id column
 * @method     ChildRequests[]|ObjectCollection findByTotal(string $total) Return ChildRequests objects filtered by the total column
 * @method     ChildRequests[]|ObjectCollection findByDateRequested(string $date_requested) Return ChildRequests objects filtered by the date_requested column
 * @method     ChildRequests[]|ObjectCollection findByDateCompleted(string $date_completed) Return ChildRequests objects filtered by the date_completed column
 * @method     ChildRequests[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RequestsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RequestsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Requests', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRequestsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRequestsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRequestsQuery) {
            return $criteria;
        }
        $query = new ChildRequestsQuery();
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
     * @return ChildRequests|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RequestsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = RequestsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildRequests A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, user_id, status_id, total, date_requested, date_completed FROM requests WHERE id = :p0';
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
            /** @var ChildRequests $obj */
            $obj = new ChildRequests();
            $obj->hydrate($row);
            RequestsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildRequests|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRequestsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RequestsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRequestsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RequestsTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRequestsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RequestsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RequestsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRequestsQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(RequestsTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(RequestsTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestsTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the status_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusId(1234); // WHERE status_id = 1234
     * $query->filterByStatusId(array(12, 34)); // WHERE status_id IN (12, 34)
     * $query->filterByStatusId(array('min' => 12)); // WHERE status_id > 12
     * </code>
     *
     * @param     mixed $statusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRequestsQuery The current query, for fluid interface
     */
    public function filterByStatusId($statusId = null, $comparison = null)
    {
        if (is_array($statusId)) {
            $useMinMax = false;
            if (isset($statusId['min'])) {
                $this->addUsingAlias(RequestsTableMap::COL_STATUS_ID, $statusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusId['max'])) {
                $this->addUsingAlias(RequestsTableMap::COL_STATUS_ID, $statusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestsTableMap::COL_STATUS_ID, $statusId, $comparison);
    }

    /**
     * Filter the query on the total column
     *
     * Example usage:
     * <code>
     * $query->filterByTotal(1234); // WHERE total = 1234
     * $query->filterByTotal(array(12, 34)); // WHERE total IN (12, 34)
     * $query->filterByTotal(array('min' => 12)); // WHERE total > 12
     * </code>
     *
     * @param     mixed $total The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRequestsQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(RequestsTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(RequestsTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestsTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the date_requested column
     *
     * Example usage:
     * <code>
     * $query->filterByDateRequested('2011-03-14'); // WHERE date_requested = '2011-03-14'
     * $query->filterByDateRequested('now'); // WHERE date_requested = '2011-03-14'
     * $query->filterByDateRequested(array('max' => 'yesterday')); // WHERE date_requested > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateRequested The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRequestsQuery The current query, for fluid interface
     */
    public function filterByDateRequested($dateRequested = null, $comparison = null)
    {
        if (is_array($dateRequested)) {
            $useMinMax = false;
            if (isset($dateRequested['min'])) {
                $this->addUsingAlias(RequestsTableMap::COL_DATE_REQUESTED, $dateRequested['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateRequested['max'])) {
                $this->addUsingAlias(RequestsTableMap::COL_DATE_REQUESTED, $dateRequested['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestsTableMap::COL_DATE_REQUESTED, $dateRequested, $comparison);
    }

    /**
     * Filter the query on the date_completed column
     *
     * Example usage:
     * <code>
     * $query->filterByDateCompleted('2011-03-14'); // WHERE date_completed = '2011-03-14'
     * $query->filterByDateCompleted('now'); // WHERE date_completed = '2011-03-14'
     * $query->filterByDateCompleted(array('max' => 'yesterday')); // WHERE date_completed > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateCompleted The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRequestsQuery The current query, for fluid interface
     */
    public function filterByDateCompleted($dateCompleted = null, $comparison = null)
    {
        if (is_array($dateCompleted)) {
            $useMinMax = false;
            if (isset($dateCompleted['min'])) {
                $this->addUsingAlias(RequestsTableMap::COL_DATE_COMPLETED, $dateCompleted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCompleted['max'])) {
                $this->addUsingAlias(RequestsTableMap::COL_DATE_COMPLETED, $dateCompleted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestsTableMap::COL_DATE_COMPLETED, $dateCompleted, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRequests $requests Object to remove from the list of results
     *
     * @return $this|ChildRequestsQuery The current query, for fluid interface
     */
    public function prune($requests = null)
    {
        if ($requests) {
            $this->addUsingAlias(RequestsTableMap::COL_ID, $requests->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the requests table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RequestsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RequestsTableMap::clearInstancePool();
            RequestsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RequestsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RequestsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RequestsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RequestsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RequestsQuery
