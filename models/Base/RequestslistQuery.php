<?php

namespace Base;

use \Requestslist as ChildRequestslist;
use \RequestslistQuery as ChildRequestslistQuery;
use \Exception;
use \PDO;
use Map\RequestslistTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'requestslist' table.
 *
 *
 *
 * @method     ChildRequestslistQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildRequestslistQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildRequestslistQuery orderByStatusId($order = Criteria::ASC) Order by the status_id column
 * @method     ChildRequestslistQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildRequestslistQuery orderByDateRequested($order = Criteria::ASC) Order by the date_requested column
 * @method     ChildRequestslistQuery orderByDateCompleted($order = Criteria::ASC) Order by the date_completed column
 *
 * @method     ChildRequestslistQuery groupById() Group by the id column
 * @method     ChildRequestslistQuery groupByUserId() Group by the user_id column
 * @method     ChildRequestslistQuery groupByStatusId() Group by the status_id column
 * @method     ChildRequestslistQuery groupByTotal() Group by the total column
 * @method     ChildRequestslistQuery groupByDateRequested() Group by the date_requested column
 * @method     ChildRequestslistQuery groupByDateCompleted() Group by the date_completed column
 *
 * @method     ChildRequestslistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRequestslistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRequestslistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRequestslistQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRequestslistQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRequestslistQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRequestslistQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildRequestslistQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildRequestslistQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildRequestslistQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildRequestslistQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildRequestslistQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildRequestslistQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     ChildRequestslistQuery leftJoinRequeststatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Requeststatus relation
 * @method     ChildRequestslistQuery rightJoinRequeststatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Requeststatus relation
 * @method     ChildRequestslistQuery innerJoinRequeststatus($relationAlias = null) Adds a INNER JOIN clause to the query using the Requeststatus relation
 *
 * @method     ChildRequestslistQuery joinWithRequeststatus($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Requeststatus relation
 *
 * @method     ChildRequestslistQuery leftJoinWithRequeststatus() Adds a LEFT JOIN clause and with to the query using the Requeststatus relation
 * @method     ChildRequestslistQuery rightJoinWithRequeststatus() Adds a RIGHT JOIN clause and with to the query using the Requeststatus relation
 * @method     ChildRequestslistQuery innerJoinWithRequeststatus() Adds a INNER JOIN clause and with to the query using the Requeststatus relation
 *
 * @method     ChildRequestslistQuery leftJoinCart($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cart relation
 * @method     ChildRequestslistQuery rightJoinCart($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cart relation
 * @method     ChildRequestslistQuery innerJoinCart($relationAlias = null) Adds a INNER JOIN clause to the query using the Cart relation
 *
 * @method     ChildRequestslistQuery joinWithCart($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Cart relation
 *
 * @method     ChildRequestslistQuery leftJoinWithCart() Adds a LEFT JOIN clause and with to the query using the Cart relation
 * @method     ChildRequestslistQuery rightJoinWithCart() Adds a RIGHT JOIN clause and with to the query using the Cart relation
 * @method     ChildRequestslistQuery innerJoinWithCart() Adds a INNER JOIN clause and with to the query using the Cart relation
 *
 * @method     \UserQuery|\RequeststatusQuery|\CartQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildRequestslist findOne(ConnectionInterface $con = null) Return the first ChildRequestslist matching the query
 * @method     ChildRequestslist findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRequestslist matching the query, or a new ChildRequestslist object populated from the query conditions when no match is found
 *
 * @method     ChildRequestslist findOneById(int $id) Return the first ChildRequestslist filtered by the id column
 * @method     ChildRequestslist findOneByUserId(int $user_id) Return the first ChildRequestslist filtered by the user_id column
 * @method     ChildRequestslist findOneByStatusId(int $status_id) Return the first ChildRequestslist filtered by the status_id column
 * @method     ChildRequestslist findOneByTotal(string $total) Return the first ChildRequestslist filtered by the total column
 * @method     ChildRequestslist findOneByDateRequested(string $date_requested) Return the first ChildRequestslist filtered by the date_requested column
 * @method     ChildRequestslist findOneByDateCompleted(string $date_completed) Return the first ChildRequestslist filtered by the date_completed column *

 * @method     ChildRequestslist requirePk($key, ConnectionInterface $con = null) Return the ChildRequestslist by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequestslist requireOne(ConnectionInterface $con = null) Return the first ChildRequestslist matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRequestslist requireOneById(int $id) Return the first ChildRequestslist filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequestslist requireOneByUserId(int $user_id) Return the first ChildRequestslist filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequestslist requireOneByStatusId(int $status_id) Return the first ChildRequestslist filtered by the status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequestslist requireOneByTotal(string $total) Return the first ChildRequestslist filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequestslist requireOneByDateRequested(string $date_requested) Return the first ChildRequestslist filtered by the date_requested column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequestslist requireOneByDateCompleted(string $date_completed) Return the first ChildRequestslist filtered by the date_completed column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRequestslist[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRequestslist objects based on current ModelCriteria
 * @method     ChildRequestslist[]|ObjectCollection findById(int $id) Return ChildRequestslist objects filtered by the id column
 * @method     ChildRequestslist[]|ObjectCollection findByUserId(int $user_id) Return ChildRequestslist objects filtered by the user_id column
 * @method     ChildRequestslist[]|ObjectCollection findByStatusId(int $status_id) Return ChildRequestslist objects filtered by the status_id column
 * @method     ChildRequestslist[]|ObjectCollection findByTotal(string $total) Return ChildRequestslist objects filtered by the total column
 * @method     ChildRequestslist[]|ObjectCollection findByDateRequested(string $date_requested) Return ChildRequestslist objects filtered by the date_requested column
 * @method     ChildRequestslist[]|ObjectCollection findByDateCompleted(string $date_completed) Return ChildRequestslist objects filtered by the date_completed column
 * @method     ChildRequestslist[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RequestslistQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RequestslistQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Requestslist', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRequestslistQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRequestslistQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRequestslistQuery) {
            return $criteria;
        }
        $query = new ChildRequestslistQuery();
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
     * @return ChildRequestslist|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RequestslistTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = RequestslistTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildRequestslist A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, user_id, status_id, total, date_requested, date_completed FROM requestslist WHERE id = :p0';
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
            /** @var ChildRequestslist $obj */
            $obj = new ChildRequestslist();
            $obj->hydrate($row);
            RequestslistTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildRequestslist|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RequestslistTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RequestslistTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestslistTableMap::COL_ID, $id, $comparison);
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
     * @see       filterByUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestslistTableMap::COL_USER_ID, $userId, $comparison);
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
     * @see       filterByRequeststatus()
     *
     * @param     mixed $statusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function filterByStatusId($statusId = null, $comparison = null)
    {
        if (is_array($statusId)) {
            $useMinMax = false;
            if (isset($statusId['min'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_STATUS_ID, $statusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusId['max'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_STATUS_ID, $statusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestslistTableMap::COL_STATUS_ID, $statusId, $comparison);
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
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestslistTableMap::COL_TOTAL, $total, $comparison);
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
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function filterByDateRequested($dateRequested = null, $comparison = null)
    {
        if (is_array($dateRequested)) {
            $useMinMax = false;
            if (isset($dateRequested['min'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_DATE_REQUESTED, $dateRequested['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateRequested['max'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_DATE_REQUESTED, $dateRequested['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestslistTableMap::COL_DATE_REQUESTED, $dateRequested, $comparison);
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
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function filterByDateCompleted($dateCompleted = null, $comparison = null)
    {
        if (is_array($dateCompleted)) {
            $useMinMax = false;
            if (isset($dateCompleted['min'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_DATE_COMPLETED, $dateCompleted['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateCompleted['max'])) {
                $this->addUsingAlias(RequestslistTableMap::COL_DATE_COMPLETED, $dateCompleted['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestslistTableMap::COL_DATE_COMPLETED, $dateCompleted, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRequestslistQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(RequestslistTableMap::COL_USER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RequestslistTableMap::COL_USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
    }

    /**
     * Filter the query by a related \Requeststatus object
     *
     * @param \Requeststatus|ObjectCollection $requeststatus The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildRequestslistQuery The current query, for fluid interface
     */
    public function filterByRequeststatus($requeststatus, $comparison = null)
    {
        if ($requeststatus instanceof \Requeststatus) {
            return $this
                ->addUsingAlias(RequestslistTableMap::COL_STATUS_ID, $requeststatus->getId(), $comparison);
        } elseif ($requeststatus instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RequestslistTableMap::COL_STATUS_ID, $requeststatus->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRequeststatus() only accepts arguments of type \Requeststatus or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Requeststatus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function joinRequeststatus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Requeststatus');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Requeststatus');
        }

        return $this;
    }

    /**
     * Use the Requeststatus relation Requeststatus object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RequeststatusQuery A secondary query class using the current class as primary query
     */
    public function useRequeststatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRequeststatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Requeststatus', '\RequeststatusQuery');
    }

    /**
     * Filter the query by a related \Cart object
     *
     * @param \Cart|ObjectCollection $cart the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRequestslistQuery The current query, for fluid interface
     */
    public function filterByCart($cart, $comparison = null)
    {
        if ($cart instanceof \Cart) {
            return $this
                ->addUsingAlias(RequestslistTableMap::COL_ID, $cart->getRequestid(), $comparison);
        } elseif ($cart instanceof ObjectCollection) {
            return $this
                ->useCartQuery()
                ->filterByPrimaryKeys($cart->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCart() only accepts arguments of type \Cart or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Cart relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function joinCart($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Cart');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Cart');
        }

        return $this;
    }

    /**
     * Use the Cart relation Cart object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CartQuery A secondary query class using the current class as primary query
     */
    public function useCartQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCart($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Cart', '\CartQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRequestslist $requestslist Object to remove from the list of results
     *
     * @return $this|ChildRequestslistQuery The current query, for fluid interface
     */
    public function prune($requestslist = null)
    {
        if ($requestslist) {
            $this->addUsingAlias(RequestslistTableMap::COL_ID, $requestslist->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the requestslist table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RequestslistTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RequestslistTableMap::clearInstancePool();
            RequestslistTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RequestslistTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RequestslistTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RequestslistTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RequestslistTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RequestslistQuery
