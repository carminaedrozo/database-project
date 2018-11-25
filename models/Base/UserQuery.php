<?php

namespace Base;

use \User as ChildUser;
use \UserQuery as ChildUserQuery;
use \Exception;
use \PDO;
use Map\UserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'user' table.
 *
 *
 *
 * @method     ChildUserQuery orderByUserLogin($order = Criteria::ASC) Order by the User_Login column
 * @method     ChildUserQuery orderByUserPassword($order = Criteria::ASC) Order by the User_Password column
 * @method     ChildUserQuery orderByUserEmail($order = Criteria::ASC) Order by the User_Email column
 * @method     ChildUserQuery orderByUserFullname($order = Criteria::ASC) Order by the User_FullName column
 * @method     ChildUserQuery orderByUserStatus($order = Criteria::ASC) Order by the User_Status column
 * @method     ChildUserQuery orderByUserLastaccess($order = Criteria::ASC) Order by the User_LastAccess column
 * @method     ChildUserQuery orderByUserLastupdate($order = Criteria::ASC) Order by the User_LastUpdate column
 *
 * @method     ChildUserQuery groupByUserLogin() Group by the User_Login column
 * @method     ChildUserQuery groupByUserPassword() Group by the User_Password column
 * @method     ChildUserQuery groupByUserEmail() Group by the User_Email column
 * @method     ChildUserQuery groupByUserFullname() Group by the User_FullName column
 * @method     ChildUserQuery groupByUserStatus() Group by the User_Status column
 * @method     ChildUserQuery groupByUserLastaccess() Group by the User_LastAccess column
 * @method     ChildUserQuery groupByUserLastupdate() Group by the User_LastUpdate column
 *
 * @method     ChildUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUser findOne(ConnectionInterface $con = null) Return the first ChildUser matching the query
 * @method     ChildUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUser matching the query, or a new ChildUser object populated from the query conditions when no match is found
 *
 * @method     ChildUser findOneByUserLogin(string $User_Login) Return the first ChildUser filtered by the User_Login column
 * @method     ChildUser findOneByUserPassword(string $User_Password) Return the first ChildUser filtered by the User_Password column
 * @method     ChildUser findOneByUserEmail(string $User_Email) Return the first ChildUser filtered by the User_Email column
 * @method     ChildUser findOneByUserFullname(string $User_FullName) Return the first ChildUser filtered by the User_FullName column
 * @method     ChildUser findOneByUserStatus(string $User_Status) Return the first ChildUser filtered by the User_Status column
 * @method     ChildUser findOneByUserLastaccess(string $User_LastAccess) Return the first ChildUser filtered by the User_LastAccess column
 * @method     ChildUser findOneByUserLastupdate(string $User_LastUpdate) Return the first ChildUser filtered by the User_LastUpdate column *

 * @method     ChildUser requirePk($key, ConnectionInterface $con = null) Return the ChildUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOne(ConnectionInterface $con = null) Return the first ChildUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUser requireOneByUserLogin(string $User_Login) Return the first ChildUser filtered by the User_Login column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByUserPassword(string $User_Password) Return the first ChildUser filtered by the User_Password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByUserEmail(string $User_Email) Return the first ChildUser filtered by the User_Email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByUserFullname(string $User_FullName) Return the first ChildUser filtered by the User_FullName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByUserStatus(string $User_Status) Return the first ChildUser filtered by the User_Status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByUserLastaccess(string $User_LastAccess) Return the first ChildUser filtered by the User_LastAccess column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByUserLastupdate(string $User_LastUpdate) Return the first ChildUser filtered by the User_LastUpdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUser objects based on current ModelCriteria
 * @method     ChildUser[]|ObjectCollection findByUserLogin(string $User_Login) Return ChildUser objects filtered by the User_Login column
 * @method     ChildUser[]|ObjectCollection findByUserPassword(string $User_Password) Return ChildUser objects filtered by the User_Password column
 * @method     ChildUser[]|ObjectCollection findByUserEmail(string $User_Email) Return ChildUser objects filtered by the User_Email column
 * @method     ChildUser[]|ObjectCollection findByUserFullname(string $User_FullName) Return ChildUser objects filtered by the User_FullName column
 * @method     ChildUser[]|ObjectCollection findByUserStatus(string $User_Status) Return ChildUser objects filtered by the User_Status column
 * @method     ChildUser[]|ObjectCollection findByUserLastaccess(string $User_LastAccess) Return ChildUser objects filtered by the User_LastAccess column
 * @method     ChildUser[]|ObjectCollection findByUserLastupdate(string $User_LastUpdate) Return ChildUser objects filtered by the User_LastUpdate column
 * @method     ChildUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\User', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUserQuery) {
            return $criteria;
        }
        $query = new ChildUserQuery();
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
     * @return ChildUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UserTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT User_Login, User_Password, User_Email, User_FullName, User_Status, User_LastAccess, User_LastUpdate FROM user WHERE User_Login = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUser $obj */
            $obj = new ChildUser();
            $obj->hydrate($row);
            UserTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUser|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserTableMap::COL_USER_LOGIN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserTableMap::COL_USER_LOGIN, $keys, Criteria::IN);
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
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByUserLogin($userLogin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userLogin)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_LOGIN, $userLogin, $comparison);
    }

    /**
     * Filter the query on the User_Password column
     *
     * Example usage:
     * <code>
     * $query->filterByUserPassword('fooValue');   // WHERE User_Password = 'fooValue'
     * $query->filterByUserPassword('%fooValue%', Criteria::LIKE); // WHERE User_Password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userPassword The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByUserPassword($userPassword = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userPassword)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_PASSWORD, $userPassword, $comparison);
    }

    /**
     * Filter the query on the User_Email column
     *
     * Example usage:
     * <code>
     * $query->filterByUserEmail('fooValue');   // WHERE User_Email = 'fooValue'
     * $query->filterByUserEmail('%fooValue%', Criteria::LIKE); // WHERE User_Email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userEmail The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByUserEmail($userEmail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userEmail)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_EMAIL, $userEmail, $comparison);
    }

    /**
     * Filter the query on the User_FullName column
     *
     * Example usage:
     * <code>
     * $query->filterByUserFullname('fooValue');   // WHERE User_FullName = 'fooValue'
     * $query->filterByUserFullname('%fooValue%', Criteria::LIKE); // WHERE User_FullName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userFullname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByUserFullname($userFullname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userFullname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_FULLNAME, $userFullname, $comparison);
    }

    /**
     * Filter the query on the User_Status column
     *
     * Example usage:
     * <code>
     * $query->filterByUserStatus('fooValue');   // WHERE User_Status = 'fooValue'
     * $query->filterByUserStatus('%fooValue%', Criteria::LIKE); // WHERE User_Status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userStatus The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByUserStatus($userStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userStatus)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_STATUS, $userStatus, $comparison);
    }

    /**
     * Filter the query on the User_LastAccess column
     *
     * Example usage:
     * <code>
     * $query->filterByUserLastaccess('2011-03-14'); // WHERE User_LastAccess = '2011-03-14'
     * $query->filterByUserLastaccess('now'); // WHERE User_LastAccess = '2011-03-14'
     * $query->filterByUserLastaccess(array('max' => 'yesterday')); // WHERE User_LastAccess > '2011-03-13'
     * </code>
     *
     * @param     mixed $userLastaccess The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByUserLastaccess($userLastaccess = null, $comparison = null)
    {
        if (is_array($userLastaccess)) {
            $useMinMax = false;
            if (isset($userLastaccess['min'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_LASTACCESS, $userLastaccess['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userLastaccess['max'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_LASTACCESS, $userLastaccess['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_LASTACCESS, $userLastaccess, $comparison);
    }

    /**
     * Filter the query on the User_LastUpdate column
     *
     * Example usage:
     * <code>
     * $query->filterByUserLastupdate('2011-03-14'); // WHERE User_LastUpdate = '2011-03-14'
     * $query->filterByUserLastupdate('now'); // WHERE User_LastUpdate = '2011-03-14'
     * $query->filterByUserLastupdate(array('max' => 'yesterday')); // WHERE User_LastUpdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $userLastupdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByUserLastupdate($userLastupdate = null, $comparison = null)
    {
        if (is_array($userLastupdate)) {
            $useMinMax = false;
            if (isset($userLastupdate['min'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_LASTUPDATE, $userLastupdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userLastupdate['max'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_LASTUPDATE, $userLastupdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_LASTUPDATE, $userLastupdate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUser $user Object to remove from the list of results
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function prune($user = null)
    {
        if ($user) {
            $this->addUsingAlias(UserTableMap::COL_USER_LOGIN, $user->getUserLogin(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UserTableMap::clearInstancePool();
            UserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UserQuery
