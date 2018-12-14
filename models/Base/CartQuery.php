<?php

namespace Base;

use \Cart as ChildCart;
use \CartQuery as ChildCartQuery;
use \Exception;
use \PDO;
use Map\CartTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'cart' table.
 *
 *
 *
 * @method     ChildCartQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCartQuery orderByRequestid($order = Criteria::ASC) Order by the requestid column
 * @method     ChildCartQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildCartQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildCartQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildCartQuery orderByTotalPrice($order = Criteria::ASC) Order by the total_price column
 * @method     ChildCartQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildCartQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildCartQuery groupById() Group by the id column
 * @method     ChildCartQuery groupByRequestid() Group by the requestid column
 * @method     ChildCartQuery groupByProductId() Group by the product_id column
 * @method     ChildCartQuery groupByQuantity() Group by the quantity column
 * @method     ChildCartQuery groupByPrice() Group by the price column
 * @method     ChildCartQuery groupByTotalPrice() Group by the total_price column
 * @method     ChildCartQuery groupByUserId() Group by the user_id column
 * @method     ChildCartQuery groupByStatus() Group by the status column
 *
 * @method     ChildCartQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCartQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCartQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCartQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCartQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCartQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCartQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildCartQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildCartQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildCartQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildCartQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildCartQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildCartQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     ChildCartQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     ChildCartQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     ChildCartQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     ChildCartQuery joinWithProduct($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Product relation
 *
 * @method     ChildCartQuery leftJoinWithProduct() Adds a LEFT JOIN clause and with to the query using the Product relation
 * @method     ChildCartQuery rightJoinWithProduct() Adds a RIGHT JOIN clause and with to the query using the Product relation
 * @method     ChildCartQuery innerJoinWithProduct() Adds a INNER JOIN clause and with to the query using the Product relation
 *
 * @method     ChildCartQuery leftJoinRequestslist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Requestslist relation
 * @method     ChildCartQuery rightJoinRequestslist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Requestslist relation
 * @method     ChildCartQuery innerJoinRequestslist($relationAlias = null) Adds a INNER JOIN clause to the query using the Requestslist relation
 *
 * @method     ChildCartQuery joinWithRequestslist($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Requestslist relation
 *
 * @method     ChildCartQuery leftJoinWithRequestslist() Adds a LEFT JOIN clause and with to the query using the Requestslist relation
 * @method     ChildCartQuery rightJoinWithRequestslist() Adds a RIGHT JOIN clause and with to the query using the Requestslist relation
 * @method     ChildCartQuery innerJoinWithRequestslist() Adds a INNER JOIN clause and with to the query using the Requestslist relation
 *
 * @method     \UserQuery|\ProductQuery|\RequestslistQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCart findOne(ConnectionInterface $con = null) Return the first ChildCart matching the query
 * @method     ChildCart findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCart matching the query, or a new ChildCart object populated from the query conditions when no match is found
 *
 * @method     ChildCart findOneById(int $id) Return the first ChildCart filtered by the id column
 * @method     ChildCart findOneByRequestid(int $requestid) Return the first ChildCart filtered by the requestid column
 * @method     ChildCart findOneByProductId(int $product_id) Return the first ChildCart filtered by the product_id column
 * @method     ChildCart findOneByQuantity(int $quantity) Return the first ChildCart filtered by the quantity column
 * @method     ChildCart findOneByPrice(string $price) Return the first ChildCart filtered by the price column
 * @method     ChildCart findOneByTotalPrice(string $total_price) Return the first ChildCart filtered by the total_price column
 * @method     ChildCart findOneByUserId(int $user_id) Return the first ChildCart filtered by the user_id column
 * @method     ChildCart findOneByStatus(string $status) Return the first ChildCart filtered by the status column *

 * @method     ChildCart requirePk($key, ConnectionInterface $con = null) Return the ChildCart by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOne(ConnectionInterface $con = null) Return the first ChildCart matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCart requireOneById(int $id) Return the first ChildCart filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByRequestid(int $requestid) Return the first ChildCart filtered by the requestid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByProductId(int $product_id) Return the first ChildCart filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByQuantity(int $quantity) Return the first ChildCart filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByPrice(string $price) Return the first ChildCart filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByTotalPrice(string $total_price) Return the first ChildCart filtered by the total_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByUserId(int $user_id) Return the first ChildCart filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCart requireOneByStatus(string $status) Return the first ChildCart filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCart[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCart objects based on current ModelCriteria
 * @method     ChildCart[]|ObjectCollection findById(int $id) Return ChildCart objects filtered by the id column
 * @method     ChildCart[]|ObjectCollection findByRequestid(int $requestid) Return ChildCart objects filtered by the requestid column
 * @method     ChildCart[]|ObjectCollection findByProductId(int $product_id) Return ChildCart objects filtered by the product_id column
 * @method     ChildCart[]|ObjectCollection findByQuantity(int $quantity) Return ChildCart objects filtered by the quantity column
 * @method     ChildCart[]|ObjectCollection findByPrice(string $price) Return ChildCart objects filtered by the price column
 * @method     ChildCart[]|ObjectCollection findByTotalPrice(string $total_price) Return ChildCart objects filtered by the total_price column
 * @method     ChildCart[]|ObjectCollection findByUserId(int $user_id) Return ChildCart objects filtered by the user_id column
 * @method     ChildCart[]|ObjectCollection findByStatus(string $status) Return ChildCart objects filtered by the status column
 * @method     ChildCart[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CartQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CartQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Cart', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCartQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCartQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCartQuery) {
            return $criteria;
        }
        $query = new ChildCartQuery();
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
     * @return ChildCart|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CartTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CartTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCart A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, requestid, product_id, quantity, price, total_price, user_id, status FROM cart WHERE id = :p0';
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
            /** @var ChildCart $obj */
            $obj = new ChildCart();
            $obj->hydrate($row);
            CartTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCart|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CartTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CartTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CartTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CartTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the requestid column
     *
     * Example usage:
     * <code>
     * $query->filterByRequestid(1234); // WHERE requestid = 1234
     * $query->filterByRequestid(array(12, 34)); // WHERE requestid IN (12, 34)
     * $query->filterByRequestid(array('min' => 12)); // WHERE requestid > 12
     * </code>
     *
     * @see       filterByRequestslist()
     *
     * @param     mixed $requestid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByRequestid($requestid = null, $comparison = null)
    {
        if (is_array($requestid)) {
            $useMinMax = false;
            if (isset($requestid['min'])) {
                $this->addUsingAlias(CartTableMap::COL_REQUESTID, $requestid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requestid['max'])) {
                $this->addUsingAlias(CartTableMap::COL_REQUESTID, $requestid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_REQUESTID, $requestid, $comparison);
    }

    /**
     * Filter the query on the product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductId(1234); // WHERE product_id = 1234
     * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
     * $query->filterByProductId(array('min' => 12)); // WHERE product_id > 12
     * </code>
     *
     * @see       filterByProduct()
     *
     * @param     mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(CartTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(CartTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_PRODUCT_ID, $productId, $comparison);
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(CartTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(CartTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_QUANTITY, $quantity, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(CartTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(CartTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the total_price column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalPrice(1234); // WHERE total_price = 1234
     * $query->filterByTotalPrice(array(12, 34)); // WHERE total_price IN (12, 34)
     * $query->filterByTotalPrice(array('min' => 12)); // WHERE total_price > 12
     * </code>
     *
     * @param     mixed $totalPrice The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByTotalPrice($totalPrice = null, $comparison = null)
    {
        if (is_array($totalPrice)) {
            $useMinMax = false;
            if (isset($totalPrice['min'])) {
                $this->addUsingAlias(CartTableMap::COL_TOTAL_PRICE, $totalPrice['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalPrice['max'])) {
                $this->addUsingAlias(CartTableMap::COL_TOTAL_PRICE, $totalPrice['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_TOTAL_PRICE, $totalPrice, $comparison);
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
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(CartTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(CartTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CartTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCartQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(CartTableMap::COL_USER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CartTableMap::COL_USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildCartQuery The current query, for fluid interface
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
     * Filter the query by a related \Product object
     *
     * @param \Product|ObjectCollection $product The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCartQuery The current query, for fluid interface
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof \Product) {
            return $this
                ->addUsingAlias(CartTableMap::COL_PRODUCT_ID, $product->getId(), $comparison);
        } elseif ($product instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CartTableMap::COL_PRODUCT_ID, $product->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProduct() only accepts arguments of type \Product or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Product relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function joinProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Product');

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
            $this->addJoinObject($join, 'Product');
        }

        return $this;
    }

    /**
     * Use the Product relation Product object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProductQuery A secondary query class using the current class as primary query
     */
    public function useProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Product', '\ProductQuery');
    }

    /**
     * Filter the query by a related \Requestslist object
     *
     * @param \Requestslist|ObjectCollection $requestslist The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildCartQuery The current query, for fluid interface
     */
    public function filterByRequestslist($requestslist, $comparison = null)
    {
        if ($requestslist instanceof \Requestslist) {
            return $this
                ->addUsingAlias(CartTableMap::COL_REQUESTID, $requestslist->getId(), $comparison);
        } elseif ($requestslist instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CartTableMap::COL_REQUESTID, $requestslist->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRequestslist() only accepts arguments of type \Requestslist or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Requestslist relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function joinRequestslist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Requestslist');

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
            $this->addJoinObject($join, 'Requestslist');
        }

        return $this;
    }

    /**
     * Use the Requestslist relation Requestslist object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RequestslistQuery A secondary query class using the current class as primary query
     */
    public function useRequestslistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRequestslist($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Requestslist', '\RequestslistQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCart $cart Object to remove from the list of results
     *
     * @return $this|ChildCartQuery The current query, for fluid interface
     */
    public function prune($cart = null)
    {
        if ($cart) {
            $this->addUsingAlias(CartTableMap::COL_ID, $cart->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the cart table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CartTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CartTableMap::clearInstancePool();
            CartTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CartTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CartTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CartTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CartTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CartQuery
