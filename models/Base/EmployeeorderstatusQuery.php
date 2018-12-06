<?php

namespace Base;

use \Employeeorderstatus as ChildEmployeeorderstatus;
use \EmployeeorderstatusQuery as ChildEmployeeorderstatusQuery;
use \Exception;
use \PDO;
use Map\EmployeeorderstatusTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'employeeorderstatus' table.
 *
 *
 *
 * @method     ChildEmployeeorderstatusQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     ChildEmployeeorderstatusQuery orderByProductId($order = Criteria::ASC) Order by the Product_ID column
 * @method     ChildEmployeeorderstatusQuery orderByReceivedcount($order = Criteria::ASC) Order by the ReceivedCount column
 * @method     ChildEmployeeorderstatusQuery orderByFufilledstatus($order = Criteria::ASC) Order by the FufilledStatus column
 * @method     ChildEmployeeorderstatusQuery orderByCount($order = Criteria::ASC) Order by the Count column
 *
 * @method     ChildEmployeeorderstatusQuery groupById() Group by the ID column
 * @method     ChildEmployeeorderstatusQuery groupByProductId() Group by the Product_ID column
 * @method     ChildEmployeeorderstatusQuery groupByReceivedcount() Group by the ReceivedCount column
 * @method     ChildEmployeeorderstatusQuery groupByFufilledstatus() Group by the FufilledStatus column
 * @method     ChildEmployeeorderstatusQuery groupByCount() Group by the Count column
 *
 * @method     ChildEmployeeorderstatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEmployeeorderstatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEmployeeorderstatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEmployeeorderstatusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEmployeeorderstatusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEmployeeorderstatusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEmployeeorderstatus findOne(ConnectionInterface $con = null) Return the first ChildEmployeeorderstatus matching the query
 * @method     ChildEmployeeorderstatus findOneOrCreate(ConnectionInterface $con = null) Return the first ChildEmployeeorderstatus matching the query, or a new ChildEmployeeorderstatus object populated from the query conditions when no match is found
 *
 * @method     ChildEmployeeorderstatus findOneById(int $ID) Return the first ChildEmployeeorderstatus filtered by the ID column
 * @method     ChildEmployeeorderstatus findOneByProductId(int $Product_ID) Return the first ChildEmployeeorderstatus filtered by the Product_ID column
 * @method     ChildEmployeeorderstatus findOneByReceivedcount(int $ReceivedCount) Return the first ChildEmployeeorderstatus filtered by the ReceivedCount column
 * @method     ChildEmployeeorderstatus findOneByFufilledstatus(string $FufilledStatus) Return the first ChildEmployeeorderstatus filtered by the FufilledStatus column
 * @method     ChildEmployeeorderstatus findOneByCount(int $Count) Return the first ChildEmployeeorderstatus filtered by the Count column *

 * @method     ChildEmployeeorderstatus requirePk($key, ConnectionInterface $con = null) Return the ChildEmployeeorderstatus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployeeorderstatus requireOne(ConnectionInterface $con = null) Return the first ChildEmployeeorderstatus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEmployeeorderstatus requireOneById(int $ID) Return the first ChildEmployeeorderstatus filtered by the ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployeeorderstatus requireOneByProductId(int $Product_ID) Return the first ChildEmployeeorderstatus filtered by the Product_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployeeorderstatus requireOneByReceivedcount(int $ReceivedCount) Return the first ChildEmployeeorderstatus filtered by the ReceivedCount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployeeorderstatus requireOneByFufilledstatus(string $FufilledStatus) Return the first ChildEmployeeorderstatus filtered by the FufilledStatus column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployeeorderstatus requireOneByCount(int $Count) Return the first ChildEmployeeorderstatus filtered by the Count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEmployeeorderstatus[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildEmployeeorderstatus objects based on current ModelCriteria
 * @method     ChildEmployeeorderstatus[]|ObjectCollection findById(int $ID) Return ChildEmployeeorderstatus objects filtered by the ID column
 * @method     ChildEmployeeorderstatus[]|ObjectCollection findByProductId(int $Product_ID) Return ChildEmployeeorderstatus objects filtered by the Product_ID column
 * @method     ChildEmployeeorderstatus[]|ObjectCollection findByReceivedcount(int $ReceivedCount) Return ChildEmployeeorderstatus objects filtered by the ReceivedCount column
 * @method     ChildEmployeeorderstatus[]|ObjectCollection findByFufilledstatus(string $FufilledStatus) Return ChildEmployeeorderstatus objects filtered by the FufilledStatus column
 * @method     ChildEmployeeorderstatus[]|ObjectCollection findByCount(int $Count) Return ChildEmployeeorderstatus objects filtered by the Count column
 * @method     ChildEmployeeorderstatus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class EmployeeorderstatusQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\EmployeeorderstatusQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Employeeorderstatus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildEmployeeorderstatusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildEmployeeorderstatusQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildEmployeeorderstatusQuery) {
            return $criteria;
        }
        $query = new ChildEmployeeorderstatusQuery();
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
     * @return ChildEmployeeorderstatus|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EmployeeorderstatusTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = EmployeeorderstatusTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildEmployeeorderstatus A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ID, Product_ID, ReceivedCount, FufilledStatus, Count FROM employeeorderstatus WHERE ID = :p0';
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
            /** @var ChildEmployeeorderstatus $obj */
            $obj = new ChildEmployeeorderstatus();
            $obj->hydrate($row);
            EmployeeorderstatusTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildEmployeeorderstatus|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildEmployeeorderstatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EmployeeorderstatusTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildEmployeeorderstatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EmployeeorderstatusTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ID column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE ID = 1234
     * $query->filterById(array(12, 34)); // WHERE ID IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE ID > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeorderstatusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EmployeeorderstatusTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EmployeeorderstatusTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeorderstatusTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the Product_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByProductId(1234); // WHERE Product_ID = 1234
     * $query->filterByProductId(array(12, 34)); // WHERE Product_ID IN (12, 34)
     * $query->filterByProductId(array('min' => 12)); // WHERE Product_ID > 12
     * </code>
     *
     * @param     mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeorderstatusQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(EmployeeorderstatusTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(EmployeeorderstatusTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeorderstatusTableMap::COL_PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query on the ReceivedCount column
     *
     * Example usage:
     * <code>
     * $query->filterByReceivedcount(1234); // WHERE ReceivedCount = 1234
     * $query->filterByReceivedcount(array(12, 34)); // WHERE ReceivedCount IN (12, 34)
     * $query->filterByReceivedcount(array('min' => 12)); // WHERE ReceivedCount > 12
     * </code>
     *
     * @param     mixed $receivedcount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeorderstatusQuery The current query, for fluid interface
     */
    public function filterByReceivedcount($receivedcount = null, $comparison = null)
    {
        if (is_array($receivedcount)) {
            $useMinMax = false;
            if (isset($receivedcount['min'])) {
                $this->addUsingAlias(EmployeeorderstatusTableMap::COL_RECEIVEDCOUNT, $receivedcount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receivedcount['max'])) {
                $this->addUsingAlias(EmployeeorderstatusTableMap::COL_RECEIVEDCOUNT, $receivedcount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeorderstatusTableMap::COL_RECEIVEDCOUNT, $receivedcount, $comparison);
    }

    /**
     * Filter the query on the FufilledStatus column
     *
     * Example usage:
     * <code>
     * $query->filterByFufilledstatus('fooValue');   // WHERE FufilledStatus = 'fooValue'
     * $query->filterByFufilledstatus('%fooValue%', Criteria::LIKE); // WHERE FufilledStatus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fufilledstatus The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeorderstatusQuery The current query, for fluid interface
     */
    public function filterByFufilledstatus($fufilledstatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fufilledstatus)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeorderstatusTableMap::COL_FUFILLEDSTATUS, $fufilledstatus, $comparison);
    }

    /**
     * Filter the query on the Count column
     *
     * Example usage:
     * <code>
     * $query->filterByCount(1234); // WHERE Count = 1234
     * $query->filterByCount(array(12, 34)); // WHERE Count IN (12, 34)
     * $query->filterByCount(array('min' => 12)); // WHERE Count > 12
     * </code>
     *
     * @param     mixed $count The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildEmployeeorderstatusQuery The current query, for fluid interface
     */
    public function filterByCount($count = null, $comparison = null)
    {
        if (is_array($count)) {
            $useMinMax = false;
            if (isset($count['min'])) {
                $this->addUsingAlias(EmployeeorderstatusTableMap::COL_COUNT, $count['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($count['max'])) {
                $this->addUsingAlias(EmployeeorderstatusTableMap::COL_COUNT, $count['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmployeeorderstatusTableMap::COL_COUNT, $count, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildEmployeeorderstatus $employeeorderstatus Object to remove from the list of results
     *
     * @return $this|ChildEmployeeorderstatusQuery The current query, for fluid interface
     */
    public function prune($employeeorderstatus = null)
    {
        if ($employeeorderstatus) {
            $this->addUsingAlias(EmployeeorderstatusTableMap::COL_ID, $employeeorderstatus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the employeeorderstatus table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeeorderstatusTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            EmployeeorderstatusTableMap::clearInstancePool();
            EmployeeorderstatusTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeeorderstatusTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(EmployeeorderstatusTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            EmployeeorderstatusTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            EmployeeorderstatusTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // EmployeeorderstatusQuery
