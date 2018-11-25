<?php

namespace Base;

use \Request as ChildRequest;
use \RequestQuery as ChildRequestQuery;
use \Exception;
use \PDO;
use Map\RequestTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'request' table.
 *
 *
 *
 * @method     ChildRequestQuery orderByRequestId($order = Criteria::ASC) Order by the Request_ID column
 * @method     ChildRequestQuery orderByProductlistId($order = Criteria::ASC) Order by the ProductList_ID column
 *
 * @method     ChildRequestQuery groupByRequestId() Group by the Request_ID column
 * @method     ChildRequestQuery groupByProductlistId() Group by the ProductList_ID column
 *
 * @method     ChildRequestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRequestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRequestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRequestQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRequestQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRequestQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRequestQuery leftJoinEmployee($relationAlias = null) Adds a LEFT JOIN clause to the query using the Employee relation
 * @method     ChildRequestQuery rightJoinEmployee($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Employee relation
 * @method     ChildRequestQuery innerJoinEmployee($relationAlias = null) Adds a INNER JOIN clause to the query using the Employee relation
 *
 * @method     ChildRequestQuery joinWithEmployee($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Employee relation
 *
 * @method     ChildRequestQuery leftJoinWithEmployee() Adds a LEFT JOIN clause and with to the query using the Employee relation
 * @method     ChildRequestQuery rightJoinWithEmployee() Adds a RIGHT JOIN clause and with to the query using the Employee relation
 * @method     ChildRequestQuery innerJoinWithEmployee() Adds a INNER JOIN clause and with to the query using the Employee relation
 *
 * @method     \EmployeeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildRequest findOne(ConnectionInterface $con = null) Return the first ChildRequest matching the query
 * @method     ChildRequest findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRequest matching the query, or a new ChildRequest object populated from the query conditions when no match is found
 *
 * @method     ChildRequest findOneByRequestId(int $Request_ID) Return the first ChildRequest filtered by the Request_ID column
 * @method     ChildRequest findOneByProductlistId(int $ProductList_ID) Return the first ChildRequest filtered by the ProductList_ID column *

 * @method     ChildRequest requirePk($key, ConnectionInterface $con = null) Return the ChildRequest by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequest requireOne(ConnectionInterface $con = null) Return the first ChildRequest matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRequest requireOneByRequestId(int $Request_ID) Return the first ChildRequest filtered by the Request_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRequest requireOneByProductlistId(int $ProductList_ID) Return the first ChildRequest filtered by the ProductList_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRequest[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRequest objects based on current ModelCriteria
 * @method     ChildRequest[]|ObjectCollection findByRequestId(int $Request_ID) Return ChildRequest objects filtered by the Request_ID column
 * @method     ChildRequest[]|ObjectCollection findByProductlistId(int $ProductList_ID) Return ChildRequest objects filtered by the ProductList_ID column
 * @method     ChildRequest[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RequestQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RequestQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Request', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRequestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRequestQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRequestQuery) {
            return $criteria;
        }
        $query = new ChildRequestQuery();
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
     * @return ChildRequest|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(RequestTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = RequestTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildRequest A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Request_ID, ProductList_ID FROM request WHERE Request_ID = :p0';
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
            /** @var ChildRequest $obj */
            $obj = new ChildRequest();
            $obj->hydrate($row);
            RequestTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildRequest|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildRequestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RequestTableMap::COL_REQUEST_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRequestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RequestTableMap::COL_REQUEST_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Request_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByRequestId(1234); // WHERE Request_ID = 1234
     * $query->filterByRequestId(array(12, 34)); // WHERE Request_ID IN (12, 34)
     * $query->filterByRequestId(array('min' => 12)); // WHERE Request_ID > 12
     * </code>
     *
     * @param     mixed $requestId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRequestQuery The current query, for fluid interface
     */
    public function filterByRequestId($requestId = null, $comparison = null)
    {
        if (is_array($requestId)) {
            $useMinMax = false;
            if (isset($requestId['min'])) {
                $this->addUsingAlias(RequestTableMap::COL_REQUEST_ID, $requestId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requestId['max'])) {
                $this->addUsingAlias(RequestTableMap::COL_REQUEST_ID, $requestId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestTableMap::COL_REQUEST_ID, $requestId, $comparison);
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
     * @return $this|ChildRequestQuery The current query, for fluid interface
     */
    public function filterByProductlistId($productlistId = null, $comparison = null)
    {
        if (is_array($productlistId)) {
            $useMinMax = false;
            if (isset($productlistId['min'])) {
                $this->addUsingAlias(RequestTableMap::COL_PRODUCTLIST_ID, $productlistId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productlistId['max'])) {
                $this->addUsingAlias(RequestTableMap::COL_PRODUCTLIST_ID, $productlistId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RequestTableMap::COL_PRODUCTLIST_ID, $productlistId, $comparison);
    }

    /**
     * Filter the query by a related \Employee object
     *
     * @param \Employee|ObjectCollection $employee the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildRequestQuery The current query, for fluid interface
     */
    public function filterByEmployee($employee, $comparison = null)
    {
        if ($employee instanceof \Employee) {
            return $this
                ->addUsingAlias(RequestTableMap::COL_REQUEST_ID, $employee->getRequestId(), $comparison);
        } elseif ($employee instanceof ObjectCollection) {
            return $this
                ->useEmployeeQuery()
                ->filterByPrimaryKeys($employee->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEmployee() only accepts arguments of type \Employee or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Employee relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildRequestQuery The current query, for fluid interface
     */
    public function joinEmployee($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Employee');

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
            $this->addJoinObject($join, 'Employee');
        }

        return $this;
    }

    /**
     * Use the Employee relation Employee object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EmployeeQuery A secondary query class using the current class as primary query
     */
    public function useEmployeeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEmployee($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Employee', '\EmployeeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRequest $request Object to remove from the list of results
     *
     * @return $this|ChildRequestQuery The current query, for fluid interface
     */
    public function prune($request = null)
    {
        if ($request) {
            $this->addUsingAlias(RequestTableMap::COL_REQUEST_ID, $request->getRequestId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the request table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RequestTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RequestTableMap::clearInstancePool();
            RequestTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RequestTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RequestTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RequestTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RequestTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RequestQuery
