<?php

namespace Base;

use \TableSer as ChildTableSer;
use \TableSerQuery as ChildTableSerQuery;
use \Exception;
use \PDO;
use Map\TableSerTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'table_ser' table.
 *
 *
 *
 * @method     ChildTableSerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTableSerQuery orderByBarCode($order = Criteria::ASC) Order by the bar_code column
 * @method     ChildTableSerQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildTableSerQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method     ChildTableSerQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildTableSerQuery orderByDateUpdated($order = Criteria::ASC) Order by the date_updated column
 * @method     ChildTableSerQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildTableSerQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildTableSerQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 *
 * @method     ChildTableSerQuery groupById() Group by the id column
 * @method     ChildTableSerQuery groupByBarCode() Group by the bar_code column
 * @method     ChildTableSerQuery groupByName() Group by the name column
 * @method     ChildTableSerQuery groupByPosition() Group by the position column
 * @method     ChildTableSerQuery groupByDateAdded() Group by the date_added column
 * @method     ChildTableSerQuery groupByDateUpdated() Group by the date_updated column
 * @method     ChildTableSerQuery groupByStatus() Group by the status column
 * @method     ChildTableSerQuery groupByDescription() Group by the description column
 * @method     ChildTableSerQuery groupByUserId() Group by the user_id column
 *
 * @method     ChildTableSerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTableSerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTableSerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTableSerQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTableSerQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTableSerQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTableSerQuery leftJoinSalesHeader($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesHeader relation
 * @method     ChildTableSerQuery rightJoinSalesHeader($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesHeader relation
 * @method     ChildTableSerQuery innerJoinSalesHeader($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesHeader relation
 *
 * @method     ChildTableSerQuery joinWithSalesHeader($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the SalesHeader relation
 *
 * @method     ChildTableSerQuery leftJoinWithSalesHeader() Adds a LEFT JOIN clause and with to the query using the SalesHeader relation
 * @method     ChildTableSerQuery rightJoinWithSalesHeader() Adds a RIGHT JOIN clause and with to the query using the SalesHeader relation
 * @method     ChildTableSerQuery innerJoinWithSalesHeader() Adds a INNER JOIN clause and with to the query using the SalesHeader relation
 *
 * @method     \SalesHeaderQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTableSer findOne(ConnectionInterface $con = null) Return the first ChildTableSer matching the query
 * @method     ChildTableSer findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTableSer matching the query, or a new ChildTableSer object populated from the query conditions when no match is found
 *
 * @method     ChildTableSer findOneById(int $id) Return the first ChildTableSer filtered by the id column
 * @method     ChildTableSer findOneByBarCode(string $bar_code) Return the first ChildTableSer filtered by the bar_code column
 * @method     ChildTableSer findOneByName(string $name) Return the first ChildTableSer filtered by the name column
 * @method     ChildTableSer findOneByPosition(string $position) Return the first ChildTableSer filtered by the position column
 * @method     ChildTableSer findOneByDateAdded(string $date_added) Return the first ChildTableSer filtered by the date_added column
 * @method     ChildTableSer findOneByDateUpdated(string $date_updated) Return the first ChildTableSer filtered by the date_updated column
 * @method     ChildTableSer findOneByStatus(boolean $status) Return the first ChildTableSer filtered by the status column
 * @method     ChildTableSer findOneByDescription(string $description) Return the first ChildTableSer filtered by the description column
 * @method     ChildTableSer findOneByUserId(int $user_id) Return the first ChildTableSer filtered by the user_id column *

 * @method     ChildTableSer requirePk($key, ConnectionInterface $con = null) Return the ChildTableSer by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableSer requireOne(ConnectionInterface $con = null) Return the first ChildTableSer matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTableSer requireOneById(int $id) Return the first ChildTableSer filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableSer requireOneByBarCode(string $bar_code) Return the first ChildTableSer filtered by the bar_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableSer requireOneByName(string $name) Return the first ChildTableSer filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableSer requireOneByPosition(string $position) Return the first ChildTableSer filtered by the position column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableSer requireOneByDateAdded(string $date_added) Return the first ChildTableSer filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableSer requireOneByDateUpdated(string $date_updated) Return the first ChildTableSer filtered by the date_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableSer requireOneByStatus(boolean $status) Return the first ChildTableSer filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableSer requireOneByDescription(string $description) Return the first ChildTableSer filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTableSer requireOneByUserId(int $user_id) Return the first ChildTableSer filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTableSer[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTableSer objects based on current ModelCriteria
 * @method     ChildTableSer[]|ObjectCollection findById(int $id) Return ChildTableSer objects filtered by the id column
 * @method     ChildTableSer[]|ObjectCollection findByBarCode(string $bar_code) Return ChildTableSer objects filtered by the bar_code column
 * @method     ChildTableSer[]|ObjectCollection findByName(string $name) Return ChildTableSer objects filtered by the name column
 * @method     ChildTableSer[]|ObjectCollection findByPosition(string $position) Return ChildTableSer objects filtered by the position column
 * @method     ChildTableSer[]|ObjectCollection findByDateAdded(string $date_added) Return ChildTableSer objects filtered by the date_added column
 * @method     ChildTableSer[]|ObjectCollection findByDateUpdated(string $date_updated) Return ChildTableSer objects filtered by the date_updated column
 * @method     ChildTableSer[]|ObjectCollection findByStatus(boolean $status) Return ChildTableSer objects filtered by the status column
 * @method     ChildTableSer[]|ObjectCollection findByDescription(string $description) Return ChildTableSer objects filtered by the description column
 * @method     ChildTableSer[]|ObjectCollection findByUserId(int $user_id) Return ChildTableSer objects filtered by the user_id column
 * @method     ChildTableSer[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TableSerQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TableSerQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'mob_db', $modelName = '\\TableSer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTableSerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTableSerQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTableSerQuery) {
            return $criteria;
        }
        $query = new ChildTableSerQuery();
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
     * @return ChildTableSer|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TableSerTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TableSerTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildTableSer A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, bar_code, name, position, date_added, date_updated, status, description, user_id FROM table_ser WHERE id = :p0';
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
            /** @var ChildTableSer $obj */
            $obj = new ChildTableSer();
            $obj->hydrate($row);
            TableSerTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildTableSer|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TableSerTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TableSerTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TableSerTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TableSerTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSerTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the bar_code column
     *
     * Example usage:
     * <code>
     * $query->filterByBarCode('fooValue');   // WHERE bar_code = 'fooValue'
     * $query->filterByBarCode('%fooValue%', Criteria::LIKE); // WHERE bar_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $barCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function filterByBarCode($barCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($barCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSerTableMap::COL_BAR_CODE, $barCode, $comparison);
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
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSerTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the position column
     *
     * Example usage:
     * <code>
     * $query->filterByPosition('fooValue');   // WHERE position = 'fooValue'
     * $query->filterByPosition('%fooValue%', Criteria::LIKE); // WHERE position LIKE '%fooValue%'
     * </code>
     *
     * @param     string $position The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function filterByPosition($position = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($position)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSerTableMap::COL_POSITION, $position, $comparison);
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
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(TableSerTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(TableSerTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSerTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
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
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function filterByDateUpdated($dateUpdated = null, $comparison = null)
    {
        if (is_array($dateUpdated)) {
            $useMinMax = false;
            if (isset($dateUpdated['min'])) {
                $this->addUsingAlias(TableSerTableMap::COL_DATE_UPDATED, $dateUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateUpdated['max'])) {
                $this->addUsingAlias(TableSerTableMap::COL_DATE_UPDATED, $dateUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSerTableMap::COL_DATE_UPDATED, $dateUpdated, $comparison);
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
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TableSerTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSerTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(TableSerTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(TableSerTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSerTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query by a related \SalesHeader object
     *
     * @param \SalesHeader|ObjectCollection $salesHeader the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTableSerQuery The current query, for fluid interface
     */
    public function filterBySalesHeader($salesHeader, $comparison = null)
    {
        if ($salesHeader instanceof \SalesHeader) {
            return $this
                ->addUsingAlias(TableSerTableMap::COL_ID, $salesHeader->getTableSerId(), $comparison);
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
     * @return $this|ChildTableSerQuery The current query, for fluid interface
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
     * @param   ChildTableSer $tableSer Object to remove from the list of results
     *
     * @return $this|ChildTableSerQuery The current query, for fluid interface
     */
    public function prune($tableSer = null)
    {
        if ($tableSer) {
            $this->addUsingAlias(TableSerTableMap::COL_ID, $tableSer->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the table_ser table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TableSerTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TableSerTableMap::clearInstancePool();
            TableSerTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(TableSerTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TableSerTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TableSerTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TableSerTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TableSerQuery
