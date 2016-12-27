<?php

namespace Base;

use \SalesHeader as ChildSalesHeader;
use \SalesHeaderQuery as ChildSalesHeaderQuery;
use \Exception;
use \PDO;
use Map\SalesHeaderTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'sales_header' table.
 *
 *
 *
 * @method     ChildSalesHeaderQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSalesHeaderQuery orderBySaleDate($order = Criteria::ASC) Order by the sale_date column
 * @method     ChildSalesHeaderQuery orderByTotal($order = Criteria::ASC) Order by the total column
 * @method     ChildSalesHeaderQuery orderByPaymentStatus($order = Criteria::ASC) Order by the payment_status column
 * @method     ChildSalesHeaderQuery orderByPaymentMethod($order = Criteria::ASC) Order by the payment_method column
 * @method     ChildSalesHeaderQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildSalesHeaderQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method     ChildSalesHeaderQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildSalesHeaderQuery orderByTableSerId($order = Criteria::ASC) Order by the table_ser_id column
 *
 * @method     ChildSalesHeaderQuery groupById() Group by the id column
 * @method     ChildSalesHeaderQuery groupBySaleDate() Group by the sale_date column
 * @method     ChildSalesHeaderQuery groupByTotal() Group by the total column
 * @method     ChildSalesHeaderQuery groupByPaymentStatus() Group by the payment_status column
 * @method     ChildSalesHeaderQuery groupByPaymentMethod() Group by the payment_method column
 * @method     ChildSalesHeaderQuery groupByStatus() Group by the status column
 * @method     ChildSalesHeaderQuery groupByClientId() Group by the client_id column
 * @method     ChildSalesHeaderQuery groupByUserId() Group by the user_id column
 * @method     ChildSalesHeaderQuery groupByTableSerId() Group by the table_ser_id column
 *
 * @method     ChildSalesHeaderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSalesHeaderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSalesHeaderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSalesHeaderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSalesHeaderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSalesHeaderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSalesHeaderQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method     ChildSalesHeaderQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method     ChildSalesHeaderQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method     ChildSalesHeaderQuery joinWithClient($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Client relation
 *
 * @method     ChildSalesHeaderQuery leftJoinWithClient() Adds a LEFT JOIN clause and with to the query using the Client relation
 * @method     ChildSalesHeaderQuery rightJoinWithClient() Adds a RIGHT JOIN clause and with to the query using the Client relation
 * @method     ChildSalesHeaderQuery innerJoinWithClient() Adds a INNER JOIN clause and with to the query using the Client relation
 *
 * @method     ChildSalesHeaderQuery leftJoinTableSer($relationAlias = null) Adds a LEFT JOIN clause to the query using the TableSer relation
 * @method     ChildSalesHeaderQuery rightJoinTableSer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TableSer relation
 * @method     ChildSalesHeaderQuery innerJoinTableSer($relationAlias = null) Adds a INNER JOIN clause to the query using the TableSer relation
 *
 * @method     ChildSalesHeaderQuery joinWithTableSer($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the TableSer relation
 *
 * @method     ChildSalesHeaderQuery leftJoinWithTableSer() Adds a LEFT JOIN clause and with to the query using the TableSer relation
 * @method     ChildSalesHeaderQuery rightJoinWithTableSer() Adds a RIGHT JOIN clause and with to the query using the TableSer relation
 * @method     ChildSalesHeaderQuery innerJoinWithTableSer() Adds a INNER JOIN clause and with to the query using the TableSer relation
 *
 * @method     ChildSalesHeaderQuery leftJoinSalesDetail($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesDetail relation
 * @method     ChildSalesHeaderQuery rightJoinSalesDetail($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesDetail relation
 * @method     ChildSalesHeaderQuery innerJoinSalesDetail($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesDetail relation
 *
 * @method     ChildSalesHeaderQuery joinWithSalesDetail($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the SalesDetail relation
 *
 * @method     ChildSalesHeaderQuery leftJoinWithSalesDetail() Adds a LEFT JOIN clause and with to the query using the SalesDetail relation
 * @method     ChildSalesHeaderQuery rightJoinWithSalesDetail() Adds a RIGHT JOIN clause and with to the query using the SalesDetail relation
 * @method     ChildSalesHeaderQuery innerJoinWithSalesDetail() Adds a INNER JOIN clause and with to the query using the SalesDetail relation
 *
 * @method     \ClientQuery|\TableSerQuery|\SalesDetailQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSalesHeader findOne(ConnectionInterface $con = null) Return the first ChildSalesHeader matching the query
 * @method     ChildSalesHeader findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSalesHeader matching the query, or a new ChildSalesHeader object populated from the query conditions when no match is found
 *
 * @method     ChildSalesHeader findOneById(int $id) Return the first ChildSalesHeader filtered by the id column
 * @method     ChildSalesHeader findOneBySaleDate(string $sale_date) Return the first ChildSalesHeader filtered by the sale_date column
 * @method     ChildSalesHeader findOneByTotal(double $total) Return the first ChildSalesHeader filtered by the total column
 * @method     ChildSalesHeader findOneByPaymentStatus(boolean $payment_status) Return the first ChildSalesHeader filtered by the payment_status column
 * @method     ChildSalesHeader findOneByPaymentMethod(string $payment_method) Return the first ChildSalesHeader filtered by the payment_method column
 * @method     ChildSalesHeader findOneByStatus(boolean $status) Return the first ChildSalesHeader filtered by the status column
 * @method     ChildSalesHeader findOneByClientId(int $client_id) Return the first ChildSalesHeader filtered by the client_id column
 * @method     ChildSalesHeader findOneByUserId(int $user_id) Return the first ChildSalesHeader filtered by the user_id column
 * @method     ChildSalesHeader findOneByTableSerId(int $table_ser_id) Return the first ChildSalesHeader filtered by the table_ser_id column *

 * @method     ChildSalesHeader requirePk($key, ConnectionInterface $con = null) Return the ChildSalesHeader by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesHeader requireOne(ConnectionInterface $con = null) Return the first ChildSalesHeader matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSalesHeader requireOneById(int $id) Return the first ChildSalesHeader filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesHeader requireOneBySaleDate(string $sale_date) Return the first ChildSalesHeader filtered by the sale_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesHeader requireOneByTotal(double $total) Return the first ChildSalesHeader filtered by the total column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesHeader requireOneByPaymentStatus(boolean $payment_status) Return the first ChildSalesHeader filtered by the payment_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesHeader requireOneByPaymentMethod(string $payment_method) Return the first ChildSalesHeader filtered by the payment_method column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesHeader requireOneByStatus(boolean $status) Return the first ChildSalesHeader filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesHeader requireOneByClientId(int $client_id) Return the first ChildSalesHeader filtered by the client_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesHeader requireOneByUserId(int $user_id) Return the first ChildSalesHeader filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesHeader requireOneByTableSerId(int $table_ser_id) Return the first ChildSalesHeader filtered by the table_ser_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSalesHeader[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSalesHeader objects based on current ModelCriteria
 * @method     ChildSalesHeader[]|ObjectCollection findById(int $id) Return ChildSalesHeader objects filtered by the id column
 * @method     ChildSalesHeader[]|ObjectCollection findBySaleDate(string $sale_date) Return ChildSalesHeader objects filtered by the sale_date column
 * @method     ChildSalesHeader[]|ObjectCollection findByTotal(double $total) Return ChildSalesHeader objects filtered by the total column
 * @method     ChildSalesHeader[]|ObjectCollection findByPaymentStatus(boolean $payment_status) Return ChildSalesHeader objects filtered by the payment_status column
 * @method     ChildSalesHeader[]|ObjectCollection findByPaymentMethod(string $payment_method) Return ChildSalesHeader objects filtered by the payment_method column
 * @method     ChildSalesHeader[]|ObjectCollection findByStatus(boolean $status) Return ChildSalesHeader objects filtered by the status column
 * @method     ChildSalesHeader[]|ObjectCollection findByClientId(int $client_id) Return ChildSalesHeader objects filtered by the client_id column
 * @method     ChildSalesHeader[]|ObjectCollection findByUserId(int $user_id) Return ChildSalesHeader objects filtered by the user_id column
 * @method     ChildSalesHeader[]|ObjectCollection findByTableSerId(int $table_ser_id) Return ChildSalesHeader objects filtered by the table_ser_id column
 * @method     ChildSalesHeader[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SalesHeaderQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SalesHeaderQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'mob_db', $modelName = '\\SalesHeader', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSalesHeaderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSalesHeaderQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSalesHeaderQuery) {
            return $criteria;
        }
        $query = new ChildSalesHeaderQuery();
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
     * @return ChildSalesHeader|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SalesHeaderTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SalesHeaderTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSalesHeader A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, sale_date, total, payment_status, payment_method, status, client_id, user_id, table_ser_id FROM sales_header WHERE id = :p0';
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
            /** @var ChildSalesHeader $obj */
            $obj = new ChildSalesHeader();
            $obj->hydrate($row);
            SalesHeaderTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSalesHeader|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SalesHeaderTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SalesHeaderTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesHeaderTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the sale_date column
     *
     * Example usage:
     * <code>
     * $query->filterBySaleDate('2011-03-14'); // WHERE sale_date = '2011-03-14'
     * $query->filterBySaleDate('now'); // WHERE sale_date = '2011-03-14'
     * $query->filterBySaleDate(array('max' => 'yesterday')); // WHERE sale_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $saleDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterBySaleDate($saleDate = null, $comparison = null)
    {
        if (is_array($saleDate)) {
            $useMinMax = false;
            if (isset($saleDate['min'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_SALE_DATE, $saleDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($saleDate['max'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_SALE_DATE, $saleDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesHeaderTableMap::COL_SALE_DATE, $saleDate, $comparison);
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
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterByTotal($total = null, $comparison = null)
    {
        if (is_array($total)) {
            $useMinMax = false;
            if (isset($total['min'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_TOTAL, $total['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($total['max'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_TOTAL, $total['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesHeaderTableMap::COL_TOTAL, $total, $comparison);
    }

    /**
     * Filter the query on the payment_status column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentStatus(true); // WHERE payment_status = true
     * $query->filterByPaymentStatus('yes'); // WHERE payment_status = true
     * </code>
     *
     * @param     boolean|string $paymentStatus The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterByPaymentStatus($paymentStatus = null, $comparison = null)
    {
        if (is_string($paymentStatus)) {
            $paymentStatus = in_array(strtolower($paymentStatus), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SalesHeaderTableMap::COL_PAYMENT_STATUS, $paymentStatus, $comparison);
    }

    /**
     * Filter the query on the payment_method column
     *
     * Example usage:
     * <code>
     * $query->filterByPaymentMethod('fooValue');   // WHERE payment_method = 'fooValue'
     * $query->filterByPaymentMethod('%fooValue%', Criteria::LIKE); // WHERE payment_method LIKE '%fooValue%'
     * </code>
     *
     * @param     string $paymentMethod The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterByPaymentMethod($paymentMethod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($paymentMethod)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesHeaderTableMap::COL_PAYMENT_METHOD, $paymentMethod, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(true); // WHERE status = true
     * $query->filterByStatus('yes'); // WHERE status = true
     * </code>
     *
     * @param     boolean|string $status The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SalesHeaderTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the client_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClientId(1234); // WHERE client_id = 1234
     * $query->filterByClientId(array(12, 34)); // WHERE client_id IN (12, 34)
     * $query->filterByClientId(array('min' => 12)); // WHERE client_id > 12
     * </code>
     *
     * @see       filterByClient()
     *
     * @param     mixed $clientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesHeaderTableMap::COL_CLIENT_ID, $clientId, $comparison);
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
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesHeaderTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the table_ser_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTableSerId(1234); // WHERE table_ser_id = 1234
     * $query->filterByTableSerId(array(12, 34)); // WHERE table_ser_id IN (12, 34)
     * $query->filterByTableSerId(array('min' => 12)); // WHERE table_ser_id > 12
     * </code>
     *
     * @see       filterByTableSer()
     *
     * @param     mixed $tableSerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterByTableSerId($tableSerId = null, $comparison = null)
    {
        if (is_array($tableSerId)) {
            $useMinMax = false;
            if (isset($tableSerId['min'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_TABLE_SER_ID, $tableSerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tableSerId['max'])) {
                $this->addUsingAlias(SalesHeaderTableMap::COL_TABLE_SER_ID, $tableSerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesHeaderTableMap::COL_TABLE_SER_ID, $tableSerId, $comparison);
    }

    /**
     * Filter the query by a related \Client object
     *
     * @param \Client|ObjectCollection $client The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof \Client) {
            return $this
                ->addUsingAlias(SalesHeaderTableMap::COL_CLIENT_ID, $client->getId(), $comparison);
        } elseif ($client instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SalesHeaderTableMap::COL_CLIENT_ID, $client->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClient() only accepts arguments of type \Client or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Client relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Client');

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
            $this->addJoinObject($join, 'Client');
        }

        return $this;
    }

    /**
     * Use the Client relation Client object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', '\ClientQuery');
    }

    /**
     * Filter the query by a related \TableSer object
     *
     * @param \TableSer|ObjectCollection $tableSer The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterByTableSer($tableSer, $comparison = null)
    {
        if ($tableSer instanceof \TableSer) {
            return $this
                ->addUsingAlias(SalesHeaderTableMap::COL_TABLE_SER_ID, $tableSer->getId(), $comparison);
        } elseif ($tableSer instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SalesHeaderTableMap::COL_TABLE_SER_ID, $tableSer->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTableSer() only accepts arguments of type \TableSer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TableSer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function joinTableSer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TableSer');

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
            $this->addJoinObject($join, 'TableSer');
        }

        return $this;
    }

    /**
     * Use the TableSer relation TableSer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \TableSerQuery A secondary query class using the current class as primary query
     */
    public function useTableSerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTableSer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TableSer', '\TableSerQuery');
    }

    /**
     * Filter the query by a related \SalesDetail object
     *
     * @param \SalesDetail|ObjectCollection $salesDetail the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function filterBySalesDetail($salesDetail, $comparison = null)
    {
        if ($salesDetail instanceof \SalesDetail) {
            return $this
                ->addUsingAlias(SalesHeaderTableMap::COL_ID, $salesDetail->getSalesHeaderId(), $comparison);
        } elseif ($salesDetail instanceof ObjectCollection) {
            return $this
                ->useSalesDetailQuery()
                ->filterByPrimaryKeys($salesDetail->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesDetail() only accepts arguments of type \SalesDetail or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesDetail relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function joinSalesDetail($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesDetail');

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
            $this->addJoinObject($join, 'SalesDetail');
        }

        return $this;
    }

    /**
     * Use the SalesDetail relation SalesDetail object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SalesDetailQuery A secondary query class using the current class as primary query
     */
    public function useSalesDetailQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesDetail($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesDetail', '\SalesDetailQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSalesHeader $salesHeader Object to remove from the list of results
     *
     * @return $this|ChildSalesHeaderQuery The current query, for fluid interface
     */
    public function prune($salesHeader = null)
    {
        if ($salesHeader) {
            $this->addUsingAlias(SalesHeaderTableMap::COL_ID, $salesHeader->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the sales_header table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SalesHeaderTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SalesHeaderTableMap::clearInstancePool();
            SalesHeaderTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SalesHeaderTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SalesHeaderTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SalesHeaderTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SalesHeaderTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SalesHeaderQuery
