<?php

namespace Base;

use \Employee as ChildEmployee;
use \EmployeeQuery as ChildEmployeeQuery;
use \Exception;
use Map\EmployeeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'employee' table.
 *
 *
 *
 * @method     ChildEmployeeQuery orderByUserLogin($order = Criteria::ASC) Order by the User_Login column
 * @method     ChildEmployeeQuery orderByRequestId($order = Criteria::ASC) Order by the Request_ID column
 *
 * @method     ChildEmployeeQuery groupByUserLogin() Group by the User_Login column
 * @method     ChildEmployeeQuery groupByRequestId() Group by the Request_ID column
 *
 * @method     ChildEmployeeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEmployeeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEmployeeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEmployeeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEmployeeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEmployeeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEmployeeQuery leftJoinRequestlist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Requestlist relation
 * @method     ChildEmployeeQuery rightJoinRequestlist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Requestlist relation
 * @method     ChildEmployeeQuery innerJoinRequestlist($relationAlias = null) Adds a INNER JOIN clause to the query using the Requestlist relation
 *
 * @method     ChildEmployeeQuery joinWithRequestlist($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Requestlist relation
 *
 * @method     ChildEmployeeQuery leftJoinWithRequestlist() Adds a LEFT JOIN clause and with to the query using the Requestlist relation
 * @method     ChildEmployeeQuery rightJoinWithRequestlist() Adds a RIGHT JOIN clause and with to the query using the Requestlist relation
 * @method     ChildEmployeeQuery innerJoinWithRequestlist() Adds a INNER JOIN clause and with to the query using the Requestlist relation
 *
 * @method     \RequestlistQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildEmployee findOne(ConnectionInterface $con = null) Return the first ChildEmployee matching the query
 * @method     ChildEmployee findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEmployee matching the query, or a new ChildEmployee object populated from the query conditions when no match is found
 *
 * @method     ChildEmployee findOneByUserLogin(string $User_Login) Return the first ChildEmployee filtered by the User_Login column
 * @method     ChildEmployee findOneByRequestId(int $Request_ID) Return the first ChildEmployee filtered by the Request_ID column *

 * @method     ChildEmployee requirePk($key, ConnectionInterface $con = null) Return the ChildEmployee by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployee requireOne(ConnectionInterface $con = null) Return the first ChildEmployee matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEmployee requireOneByUserLogin(string $User_Login) Return the first ChildEmployee filtered by the User_Login column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployee requireOneByRequestId(int $Request_ID) Return the first ChildEmployee filtered by the Request_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEmployee[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEmployee objects based on current ModelCriteria
 * @method     ChildEmployee[]|ObjectCollection findByUserLogin(string $User_Login) Return ChildEmployee objects filtered by the User_Login column
 * @method     ChildEmployee[]|ObjectCollection findByRequestId(int $Request_ID) Return ChildEmployee objects filtered by the Request_ID column
 * @method     ChildEmployee[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EmployeeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EmployeeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Employee', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEmployeeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEmployeeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEmployeeQuery) {
            return $criteria;
        }
        $query = new ChildEmployeeQuery();
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
     * @return ChildEmployee|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Employee object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Employee object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Employee object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Employee object has no primary key');
    }

    /**
     * Filter the query on the User_Login column
     *
     * Example usage:
     * <code>
     * $query->filterByUserLogin('fooValue');   // WHERE User_Login = 'fooValue'
     * $query->filterByUserLogin('%fooValue%', Criteria::LIKE); // WHERE User_Login LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userLogin The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByUserLogin($userLogin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userLogin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeTableMap::COL_USER_LOGIN, $userLogin, $comparison);
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
     * @see       filterByRequestlist()
     *
     * @param     mixed $requestId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByRequestId($requestId = null, $comparison = null)
    {
        if (is_array($requestId)) {
            $useMinMax = false;
            if (isset($requestId['min'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_REQUEST_ID, $requestId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requestId['max'])) {
                $this->addUsingAlias(EmployeeTableMap::COL_REQUEST_ID, $requestId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeTableMap::COL_REQUEST_ID, $requestId, $comparison);
    }

    /**
     * Filter the query by a related \Requestlist object
     *
     * @param \Requestlist|ObjectCollection $requestlist The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildEmployeeQuery The current query, for fluid interface
     */
    public function filterByRequestlist($requestlist, $comparison = null)
    {
        if ($requestlist instanceof \Requestlist) {
            return $this
                ->addUsingAlias(EmployeeTableMap::COL_REQUEST_ID, $requestlist->getRequestId(), $comparison);
        } elseif ($requestlist instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EmployeeTableMap::COL_REQUEST_ID, $requestlist->toKeyValue('PrimaryKey', 'RequestId'), $comparison);
        } else {
            throw new PropelException('filterByRequestlist() only accepts arguments of type \Requestlist or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Requestlist relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function joinRequestlist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Requestlist');

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
            $this->addJoinObject($join, 'Requestlist');
        }

        return $this;
    }

    /**
     * Use the Requestlist relation Requestlist object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RequestlistQuery A secondary query class using the current class as primary query
     */
    public function useRequestlistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRequestlist($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Requestlist', '\RequestlistQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEmployee $employee Object to remove from the list of results
     *
     * @return $this|ChildEmployeeQuery The current query, for fluid interface
     */
    public function prune($employee = null)
    {
        if ($employee) {
            throw new LogicException('Employee object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the employee table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EmployeeTableMap::clearInstancePool();
            EmployeeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EmployeeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EmployeeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EmployeeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EmployeeQuery
