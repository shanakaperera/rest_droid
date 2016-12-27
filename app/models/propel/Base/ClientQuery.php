<?php

namespace Base;

use \Client as ChildClient;
use \ClientQuery as ChildClientQuery;
use \Exception;
use \PDO;
use Map\ClientTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'client' table.
 *
 *
 *
 * @method     ChildClientQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildClientQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildClientQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildClientQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildClientQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildClientQuery orderByDateUpdated($order = Criteria::ASC) Order by the date_updated column
 * @method     ChildClientQuery orderByAndroidId($order = Criteria::ASC) Order by the android_id column
 * @method     ChildClientQuery orderByWifiName($order = Criteria::ASC) Order by the wifi_name column
 * @method     ChildClientQuery orderBySerialNumber($order = Criteria::ASC) Order by the serial_number column
 * @method     ChildClientQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 *
 * @method     ChildClientQuery groupById() Group by the id column
 * @method     ChildClientQuery groupByName() Group by the name column
 * @method     ChildClientQuery groupByAddress() Group by the address column
 * @method     ChildClientQuery groupByStatus() Group by the status column
 * @method     ChildClientQuery groupByDateAdded() Group by the date_added column
 * @method     ChildClientQuery groupByDateUpdated() Group by the date_updated column
 * @method     ChildClientQuery groupByAndroidId() Group by the android_id column
 * @method     ChildClientQuery groupByWifiName() Group by the wifi_name column
 * @method     ChildClientQuery groupBySerialNumber() Group by the serial_number column
 * @method     ChildClientQuery groupByUserId() Group by the user_id column
 *
 * @method     ChildClientQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildClientQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildClientQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildClientQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildClientQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildClientQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildClientQuery leftJoinSalesHeader($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesHeader relation
 * @method     ChildClientQuery rightJoinSalesHeader($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesHeader relation
 * @method     ChildClientQuery innerJoinSalesHeader($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesHeader relation
 *
 * @method     ChildClientQuery joinWithSalesHeader($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the SalesHeader relation
 *
 * @method     ChildClientQuery leftJoinWithSalesHeader() Adds a LEFT JOIN clause and with to the query using the SalesHeader relation
 * @method     ChildClientQuery rightJoinWithSalesHeader() Adds a RIGHT JOIN clause and with to the query using the SalesHeader relation
 * @method     ChildClientQuery innerJoinWithSalesHeader() Adds a INNER JOIN clause and with to the query using the SalesHeader relation
 *
 * @method     \SalesHeaderQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildClient findOne(ConnectionInterface $con = null) Return the first ChildClient matching the query
 * @method     ChildClient findOneOrCreate(ConnectionInterface $con = null) Return the first ChildClient matching the query, or a new ChildClient object populated from the query conditions when no match is found
 *
 * @method     ChildClient findOneById(int $id) Return the first ChildClient filtered by the id column
 * @method     ChildClient findOneByName(string $name) Return the first ChildClient filtered by the name column
 * @method     ChildClient findOneByAddress(string $address) Return the first ChildClient filtered by the address column
 * @method     ChildClient findOneByStatus(boolean $status) Return the first ChildClient filtered by the status column
 * @method     ChildClient findOneByDateAdded(string $date_added) Return the first ChildClient filtered by the date_added column
 * @method     ChildClient findOneByDateUpdated(string $date_updated) Return the first ChildClient filtered by the date_updated column
 * @method     ChildClient findOneByAndroidId(string $android_id) Return the first ChildClient filtered by the android_id column
 * @method     ChildClient findOneByWifiName(string $wifi_name) Return the first ChildClient filtered by the wifi_name column
 * @method     ChildClient findOneBySerialNumber(string $serial_number) Return the first ChildClient filtered by the serial_number column
 * @method     ChildClient findOneByUserId(int $user_id) Return the first ChildClient filtered by the user_id column *

 * @method     ChildClient requirePk($key, ConnectionInterface $con = null) Return the ChildClient by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOne(ConnectionInterface $con = null) Return the first ChildClient matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClient requireOneById(int $id) Return the first ChildClient filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByName(string $name) Return the first ChildClient filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByAddress(string $address) Return the first ChildClient filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByStatus(boolean $status) Return the first ChildClient filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByDateAdded(string $date_added) Return the first ChildClient filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByDateUpdated(string $date_updated) Return the first ChildClient filtered by the date_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByAndroidId(string $android_id) Return the first ChildClient filtered by the android_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByWifiName(string $wifi_name) Return the first ChildClient filtered by the wifi_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneBySerialNumber(string $serial_number) Return the first ChildClient filtered by the serial_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClient requireOneByUserId(int $user_id) Return the first ChildClient filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClient[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildClient objects based on current ModelCriteria
 * @method     ChildClient[]|ObjectCollection findById(int $id) Return ChildClient objects filtered by the id column
 * @method     ChildClient[]|ObjectCollection findByName(string $name) Return ChildClient objects filtered by the name column
 * @method     ChildClient[]|ObjectCollection findByAddress(string $address) Return ChildClient objects filtered by the address column
 * @method     ChildClient[]|ObjectCollection findByStatus(boolean $status) Return ChildClient objects filtered by the status column
 * @method     ChildClient[]|ObjectCollection findByDateAdded(string $date_added) Return ChildClient objects filtered by the date_added column
 * @method     ChildClient[]|ObjectCollection findByDateUpdated(string $date_updated) Return ChildClient objects filtered by the date_updated column
 * @method     ChildClient[]|ObjectCollection findByAndroidId(string $android_id) Return ChildClient objects filtered by the android_id column
 * @method     ChildClient[]|ObjectCollection findByWifiName(string $wifi_name) Return ChildClient objects filtered by the wifi_name column
 * @method     ChildClient[]|ObjectCollection findBySerialNumber(string $serial_number) Return ChildClient objects filtered by the serial_number column
 * @method     ChildClient[]|ObjectCollection findByUserId(int $user_id) Return ChildClient objects filtered by the user_id column
 * @method     ChildClient[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ClientQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ClientQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'mob_db', $modelName = '\\Client', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildClientQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildClientQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildClientQuery) {
            return $criteria;
        }
        $query = new ChildClientQuery();
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
     * @return ChildClient|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ClientTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ClientTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildClient A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, address, status, date_added, date_updated, android_id, wifi_name, serial_number, user_id FROM client WHERE id = :p0';
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
            /** @var ChildClient $obj */
            $obj = new ChildClient();
            $obj->hydrate($row);
            ClientTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildClient|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_ADDRESS, $address, $comparison);
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
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ClientTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the date_added column
     *
     * Example usage:
     * <code>
     * $query->filterByDateAdded('2011-03-14'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded('now'); // WHERE date_added = '2011-03-14'
     * $query->filterByDateAdded(array('max' => 'yesterday')); // WHERE date_added > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateAdded The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(ClientTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(ClientTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Filter the query on the date_updated column
     *
     * Example usage:
     * <code>
     * $query->filterByDateUpdated('2011-03-14'); // WHERE date_updated = '2011-03-14'
     * $query->filterByDateUpdated('now'); // WHERE date_updated = '2011-03-14'
     * $query->filterByDateUpdated(array('max' => 'yesterday')); // WHERE date_updated > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateUpdated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByDateUpdated($dateUpdated = null, $comparison = null)
    {
        if (is_array($dateUpdated)) {
            $useMinMax = false;
            if (isset($dateUpdated['min'])) {
                $this->addUsingAlias(ClientTableMap::COL_DATE_UPDATED, $dateUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateUpdated['max'])) {
                $this->addUsingAlias(ClientTableMap::COL_DATE_UPDATED, $dateUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_DATE_UPDATED, $dateUpdated, $comparison);
    }

    /**
     * Filter the query on the android_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAndroidId('fooValue');   // WHERE android_id = 'fooValue'
     * $query->filterByAndroidId('%fooValue%', Criteria::LIKE); // WHERE android_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $androidId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByAndroidId($androidId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($androidId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_ANDROID_ID, $androidId, $comparison);
    }

    /**
     * Filter the query on the wifi_name column
     *
     * Example usage:
     * <code>
     * $query->filterByWifiName('fooValue');   // WHERE wifi_name = 'fooValue'
     * $query->filterByWifiName('%fooValue%', Criteria::LIKE); // WHERE wifi_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $wifiName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByWifiName($wifiName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($wifiName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_WIFI_NAME, $wifiName, $comparison);
    }

    /**
     * Filter the query on the serial_number column
     *
     * Example usage:
     * <code>
     * $query->filterBySerialNumber('fooValue');   // WHERE serial_number = 'fooValue'
     * $query->filterBySerialNumber('%fooValue%', Criteria::LIKE); // WHERE serial_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serialNumber The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterBySerialNumber($serialNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serialNumber)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_SERIAL_NUMBER, $serialNumber, $comparison);
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
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(ClientTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(ClientTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query by a related \SalesHeader object
     *
     * @param \SalesHeader|ObjectCollection $salesHeader the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildClientQuery The current query, for fluid interface
     */
    public function filterBySalesHeader($salesHeader, $comparison = null)
    {
        if ($salesHeader instanceof \SalesHeader) {
            return $this
                ->addUsingAlias(ClientTableMap::COL_ID, $salesHeader->getClientId(), $comparison);
        } elseif ($salesHeader instanceof ObjectCollection) {
            return $this
                ->useSalesHeaderQuery()
                ->filterByPrimaryKeys($salesHeader->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesHeader() only accepts arguments of type \SalesHeader or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesHeader relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function joinSalesHeader($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesHeader');

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
            $this->addJoinObject($join, 'SalesHeader');
        }

        return $this;
    }

    /**
     * Use the SalesHeader relation SalesHeader object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SalesHeaderQuery A secondary query class using the current class as primary query
     */
    public function useSalesHeaderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesHeader($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesHeader', '\SalesHeaderQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildClient $client Object to remove from the list of results
     *
     * @return $this|ChildClientQuery The current query, for fluid interface
     */
    public function prune($client = null)
    {
        if ($client) {
            $this->addUsingAlias(ClientTableMap::COL_ID, $client->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the client table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClientTableMap::clearInstancePool();
            ClientTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ClientTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ClientTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ClientTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ClientTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ClientQuery
