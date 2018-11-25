<?php

namespace Base;

use \Productlist as ChildProductlist;
use \ProductlistQuery as ChildProductlistQuery;
use \Exception;
use \PDO;
use Map\ProductlistTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'productlist' table.
 *
 *
 *
 * @method     ChildProductlistQuery orderByProductlistId($order = Criteria::ASC) Order by the ProductList_ID column
 * @method     ChildProductlistQuery orderByProductId($order = Criteria::ASC) Order by the Product_ID column
 * @method     ChildProductlistQuery orderByCount($order = Criteria::ASC) Order by the Count column
 *
 * @method     ChildProductlistQuery groupByProductlistId() Group by the ProductList_ID column
 * @method     ChildProductlistQuery groupByProductId() Group by the Product_ID column
 * @method     ChildProductlistQuery groupByCount() Group by the Count column
 *
 * @method     ChildProductlistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProductlistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProductlistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProductlistQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProductlistQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProductlistQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProductlist findOne(ConnectionInterface $con = null) Return the first ChildProductlist matching the query
 * @method     ChildProductlist findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProductlist matching the query, or a new ChildProductlist object populated from the query conditions when no match is found
 *
 * @method     ChildProductlist findOneByProductlistId(int $ProductList_ID) Return the first ChildProductlist filtered by the ProductList_ID column
 * @method     ChildProductlist findOneByProductId(int $Product_ID) Return the first ChildProductlist filtered by the Product_ID column
 * @method     ChildProductlist findOneByCount(int $Count) Return the first ChildProductlist filtered by the Count column *

 * @method     ChildProductlist requirePk($key, ConnectionInterface $con = null) Return the ChildProductlist by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProductlist requireOne(ConnectionInterface $con = null) Return the first ChildProductlist matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProductlist requireOneByProductlistId(int $ProductList_ID) Return the first ChildProductlist filtered by the ProductList_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProductlist requireOneByProductId(int $Product_ID) Return the first ChildProductlist filtered by the Product_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProductlist requireOneByCount(int $Count) Return the first ChildProductlist filtered by the Count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProductlist[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildProductlist objects based on current ModelCriteria
 * @method     ChildProductlist[]|ObjectCollection findByProductlistId(int $ProductList_ID) Return ChildProductlist objects filtered by the ProductList_ID column
 * @method     ChildProductlist[]|ObjectCollection findByProductId(int $Product_ID) Return ChildProductlist objects filtered by the Product_ID column
 * @method     ChildProductlist[]|ObjectCollection findByCount(int $Count) Return ChildProductlist objects filtered by the Count column
 * @method     ChildProductlist[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ProductlistQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ProductlistQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Productlist', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProductlistQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProductlistQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildProductlistQuery) {
            return $criteria;
        }
        $query = new ChildProductlistQuery();
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
     * @return ChildProductlist|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProductlistTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProductlistTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildProductlist A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ProductList_ID, Product_ID, Count FROM productlist WHERE ProductList_ID = :p0';
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
            /** @var ChildProductlist $obj */
            $obj = new ChildProductlist();
            $obj->hydrate($row);
            ProductlistTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildProductlist|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildProductlistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductlistTableMap::COL_PRODUCTLIST_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildProductlistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductlistTableMap::COL_PRODUCTLIST_ID, $keys, Criteria::IN);
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
     * @return $this|ChildProductlistQuery The current query, for fluid interface
     */
    public function filterByProductlistId($productlistId = null, $comparison = null)
    {
        if (is_array($productlistId)) {
            $useMinMax = false;
            if (isset($productlistId['min'])) {
                $this->addUsingAlias(ProductlistTableMap::COL_PRODUCTLIST_ID, $productlistId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productlistId['max'])) {
                $this->addUsingAlias(ProductlistTableMap::COL_PRODUCTLIST_ID, $productlistId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductlistTableMap::COL_PRODUCTLIST_ID, $productlistId, $comparison);
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
     * @return $this|ChildProductlistQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(ProductlistTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(ProductlistTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductlistTableMap::COL_PRODUCT_ID, $productId, $comparison);
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
     * @return $this|ChildProductlistQuery The current query, for fluid interface
     */
    public function filterByCount($count = null, $comparison = null)
    {
        if (is_array($count)) {
            $useMinMax = false;
            if (isset($count['min'])) {
                $this->addUsingAlias(ProductlistTableMap::COL_COUNT, $count['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($count['max'])) {
                $this->addUsingAlias(ProductlistTableMap::COL_COUNT, $count['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductlistTableMap::COL_COUNT, $count, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProductlist $productlist Object to remove from the list of results
     *
     * @return $this|ChildProductlistQuery The current query, for fluid interface
     */
    public function prune($productlist = null)
    {
        if ($productlist) {
            $this->addUsingAlias(ProductlistTableMap::COL_PRODUCTLIST_ID, $productlist->getProductlistId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the productlist table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductlistTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProductlistTableMap::clearInstancePool();
            ProductlistTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ProductlistTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProductlistTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProductlistTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProductlistTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ProductlistQuery
