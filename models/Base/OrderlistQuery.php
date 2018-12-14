<?php

namespace Base;

use \Orderlist as ChildOrderlist;
use \OrderlistQuery as ChildOrderlistQuery;
use \Exception;
use \PDO;
use Map\OrderlistTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'orderlist' table.
 *
 *
 *
 * @method     ChildOrderlistQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildOrderlistQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildOrderlistQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildOrderlistQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildOrderlistQuery groupById() Group by the id column
 * @method     ChildOrderlistQuery groupByTitle() Group by the title column
 * @method     ChildOrderlistQuery groupByQuantity() Group by the quantity column
 * @method     ChildOrderlistQuery groupByStatus() Group by the status column
 *
 * @method     ChildOrderlistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrderlistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrderlistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrderlistQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrderlistQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrderlistQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrderlist findOne(ConnectionInterface $con = null) Return the first ChildOrderlist matching the query
 * @method     ChildOrderlist findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrderlist matching the query, or a new ChildOrderlist object populated from the query conditions when no match is found
 *
 * @method     ChildOrderlist findOneById(int $id) Return the first ChildOrderlist filtered by the id column
 * @method     ChildOrderlist findOneByTitle(string $title) Return the first ChildOrderlist filtered by the title column
 * @method     ChildOrderlist findOneByQuantity(int $quantity) Return the first ChildOrderlist filtered by the quantity column
 * @method     ChildOrderlist findOneByStatus(int $status) Return the first ChildOrderlist filtered by the status column *

 * @method     ChildOrderlist requirePk($key, ConnectionInterface $con = null) Return the ChildOrderlist by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderlist requireOne(ConnectionInterface $con = null) Return the first ChildOrderlist matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderlist requireOneById(int $id) Return the first ChildOrderlist filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderlist requireOneByTitle(string $title) Return the first ChildOrderlist filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderlist requireOneByQuantity(int $quantity) Return the first ChildOrderlist filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderlist requireOneByStatus(int $status) Return the first ChildOrderlist filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderlist[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOrderlist objects based on current ModelCriteria
 * @method     ChildOrderlist[]|ObjectCollection findById(int $id) Return ChildOrderlist objects filtered by the id column
 * @method     ChildOrderlist[]|ObjectCollection findByTitle(string $title) Return ChildOrderlist objects filtered by the title column
 * @method     ChildOrderlist[]|ObjectCollection findByQuantity(int $quantity) Return ChildOrderlist objects filtered by the quantity column
 * @method     ChildOrderlist[]|ObjectCollection findByStatus(int $status) Return ChildOrderlist objects filtered by the status column
 * @method     ChildOrderlist[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrderlistQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OrderlistQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Orderlist', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrderlistQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrderlistQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOrderlistQuery) {
            return $criteria;
        }
        $query = new ChildOrderlistQuery();
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
     * @return ChildOrderlist|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrderlistTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrderlistTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOrderlist A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, title, quantity, status FROM orderlist WHERE id = :p0';
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
            /** @var ChildOrderlist $obj */
            $obj = new ChildOrderlist();
            $obj->hydrate($row);
            OrderlistTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOrderlist|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOrderlistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrderlistTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOrderlistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrderlistTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOrderlistQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrderlistTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrderlistTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderlistTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderlistQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderlistTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12)); // WHERE quantity > 12
     * </code>
     *
     * @param     mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderlistQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(OrderlistTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(OrderlistTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderlistTableMap::COL_QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrderlistQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(OrderlistTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(OrderlistTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrderlistTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrderlist $orderlist Object to remove from the list of results
     *
     * @return $this|ChildOrderlistQuery The current query, for fluid interface
     */
    public function prune($orderlist = null)
    {
        if ($orderlist) {
            $this->addUsingAlias(OrderlistTableMap::COL_ID, $orderlist->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the orderlist table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrderlistTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrderlistTableMap::clearInstancePool();
            OrderlistTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OrderlistTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrderlistTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrderlistTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrderlistTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OrderlistQuery
