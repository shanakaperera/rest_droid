<?php

namespace Base;

use \Category as ChildCategory;
use \CategoryQuery as ChildCategoryQuery;
use \Exception;
use \PDO;
use Map\CategoryTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;

/**
 * Base class that represents a query for the 'category' table.
 *
 *
 *
 * @method     ChildCategoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCategoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildCategoryQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildCategoryQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildCategoryQuery orderByTreeLeft($order = Criteria::ASC) Order by the tree_left column
 * @method     ChildCategoryQuery orderByTreeRight($order = Criteria::ASC) Order by the tree_right column
 * @method     ChildCategoryQuery orderByTreeLevel($order = Criteria::ASC) Order by the tree_level column
 * @method     ChildCategoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildCategoryQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 *
 * @method     ChildCategoryQuery groupById() Group by the id column
 * @method     ChildCategoryQuery groupByName() Group by the name column
 * @method     ChildCategoryQuery groupByDateAdded() Group by the date_added column
 * @method     ChildCategoryQuery groupByStatus() Group by the status column
 * @method     ChildCategoryQuery groupByTreeLeft() Group by the tree_left column
 * @method     ChildCategoryQuery groupByTreeRight() Group by the tree_right column
 * @method     ChildCategoryQuery groupByTreeLevel() Group by the tree_level column
 * @method     ChildCategoryQuery groupByDescription() Group by the description column
 * @method     ChildCategoryQuery groupByUserId() Group by the user_id column
 *
 * @method     ChildCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCategoryQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCategoryQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCategoryQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCategoryQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     ChildCategoryQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     ChildCategoryQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     ChildCategoryQuery joinWithProduct($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Product relation
 *
 * @method     ChildCategoryQuery leftJoinWithProduct() Adds a LEFT JOIN clause and with to the query using the Product relation
 * @method     ChildCategoryQuery rightJoinWithProduct() Adds a RIGHT JOIN clause and with to the query using the Product relation
 * @method     ChildCategoryQuery innerJoinWithProduct() Adds a INNER JOIN clause and with to the query using the Product relation
 *
 * @method     \ProductQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCategory findOne(ConnectionInterface $con = null) Return the first ChildCategory matching the query
 * @method     ChildCategory findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCategory matching the query, or a new ChildCategory object populated from the query conditions when no match is found
 *
 * @method     ChildCategory findOneById(int $id) Return the first ChildCategory filtered by the id column
 * @method     ChildCategory findOneByName(string $name) Return the first ChildCategory filtered by the name column
 * @method     ChildCategory findOneByDateAdded(string $date_added) Return the first ChildCategory filtered by the date_added column
 * @method     ChildCategory findOneByStatus(boolean $status) Return the first ChildCategory filtered by the status column
 * @method     ChildCategory findOneByTreeLeft(int $tree_left) Return the first ChildCategory filtered by the tree_left column
 * @method     ChildCategory findOneByTreeRight(int $tree_right) Return the first ChildCategory filtered by the tree_right column
 * @method     ChildCategory findOneByTreeLevel(int $tree_level) Return the first ChildCategory filtered by the tree_level column
 * @method     ChildCategory findOneByDescription(string $description) Return the first ChildCategory filtered by the description column
 * @method     ChildCategory findOneByUserId(int $user_id) Return the first ChildCategory filtered by the user_id column *

 * @method     ChildCategory requirePk($key, ConnectionInterface $con = null) Return the ChildCategory by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOne(ConnectionInterface $con = null) Return the first ChildCategory matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategory requireOneById(int $id) Return the first ChildCategory filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByName(string $name) Return the first ChildCategory filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByDateAdded(string $date_added) Return the first ChildCategory filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByStatus(boolean $status) Return the first ChildCategory filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByTreeLeft(int $tree_left) Return the first ChildCategory filtered by the tree_left column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByTreeRight(int $tree_right) Return the first ChildCategory filtered by the tree_right column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByTreeLevel(int $tree_level) Return the first ChildCategory filtered by the tree_level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByDescription(string $description) Return the first ChildCategory filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategory requireOneByUserId(int $user_id) Return the first ChildCategory filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategory[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCategory objects based on current ModelCriteria
 * @method     ChildCategory[]|ObjectCollection findById(int $id) Return ChildCategory objects filtered by the id column
 * @method     ChildCategory[]|ObjectCollection findByName(string $name) Return ChildCategory objects filtered by the name column
 * @method     ChildCategory[]|ObjectCollection findByDateAdded(string $date_added) Return ChildCategory objects filtered by the date_added column
 * @method     ChildCategory[]|ObjectCollection findByStatus(boolean $status) Return ChildCategory objects filtered by the status column
 * @method     ChildCategory[]|ObjectCollection findByTreeLeft(int $tree_left) Return ChildCategory objects filtered by the tree_left column
 * @method     ChildCategory[]|ObjectCollection findByTreeRight(int $tree_right) Return ChildCategory objects filtered by the tree_right column
 * @method     ChildCategory[]|ObjectCollection findByTreeLevel(int $tree_level) Return ChildCategory objects filtered by the tree_level column
 * @method     ChildCategory[]|ObjectCollection findByDescription(string $description) Return ChildCategory objects filtered by the description column
 * @method     ChildCategory[]|ObjectCollection findByUserId(int $user_id) Return ChildCategory objects filtered by the user_id column
 * @method     ChildCategory[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CategoryQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CategoryQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'mob_db', $modelName = '\\Category', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCategoryQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCategoryQuery) {
            return $criteria;
        }
        $query = new ChildCategoryQuery();
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
     * @return ChildCategory|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CategoryTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CategoryTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCategory A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, date_added, status, tree_left, tree_right, tree_level, description, user_id FROM category WHERE id = :p0';
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
            /** @var ChildCategory $obj */
            $obj = new ChildCategory();
            $obj->hydrate($row);
            CategoryTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCategory|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoryTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoryTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
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
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CategoryTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the tree_left column
     *
     * Example usage:
     * <code>
     * $query->filterByTreeLeft(1234); // WHERE tree_left = 1234
     * $query->filterByTreeLeft(array(12, 34)); // WHERE tree_left IN (12, 34)
     * $query->filterByTreeLeft(array('min' => 12)); // WHERE tree_left > 12
     * </code>
     *
     * @param     mixed $treeLeft The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByTreeLeft($treeLeft = null, $comparison = null)
    {
        if (is_array($treeLeft)) {
            $useMinMax = false;
            if (isset($treeLeft['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_LEFT, $treeLeft['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($treeLeft['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_LEFT, $treeLeft['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_TREE_LEFT, $treeLeft, $comparison);
    }

    /**
     * Filter the query on the tree_right column
     *
     * Example usage:
     * <code>
     * $query->filterByTreeRight(1234); // WHERE tree_right = 1234
     * $query->filterByTreeRight(array(12, 34)); // WHERE tree_right IN (12, 34)
     * $query->filterByTreeRight(array('min' => 12)); // WHERE tree_right > 12
     * </code>
     *
     * @param     mixed $treeRight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByTreeRight($treeRight = null, $comparison = null)
    {
        if (is_array($treeRight)) {
            $useMinMax = false;
            if (isset($treeRight['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_RIGHT, $treeRight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($treeRight['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_RIGHT, $treeRight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_TREE_RIGHT, $treeRight, $comparison);
    }

    /**
     * Filter the query on the tree_level column
     *
     * Example usage:
     * <code>
     * $query->filterByTreeLevel(1234); // WHERE tree_level = 1234
     * $query->filterByTreeLevel(array(12, 34)); // WHERE tree_level IN (12, 34)
     * $query->filterByTreeLevel(array('min' => 12)); // WHERE tree_level > 12
     * </code>
     *
     * @param     mixed $treeLevel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByTreeLevel($treeLevel = null, $comparison = null)
    {
        if (is_array($treeLevel)) {
            $useMinMax = false;
            if (isset($treeLevel['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_LEVEL, $treeLevel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($treeLevel['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_TREE_LEVEL, $treeLevel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_TREE_LEVEL, $treeLevel, $comparison);
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
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(CategoryTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(CategoryTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query by a related \Product object
     *
     * @param \Product|ObjectCollection $product the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoryQuery The current query, for fluid interface
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof \Product) {
            return $this
                ->addUsingAlias(CategoryTableMap::COL_ID, $product->getCategoryId(), $comparison);
        } elseif ($product instanceof ObjectCollection) {
            return $this
                ->useProductQuery()
                ->filterByPrimaryKeys($product->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildCategoryQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildCategory $category Object to remove from the list of results
     *
     * @return $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function prune($category = null)
    {
        if ($category) {
            $this->addUsingAlias(CategoryTableMap::COL_ID, $category->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the category table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CategoryTableMap::clearInstancePool();
            CategoryTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CategoryTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CategoryTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CategoryTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // nested_set behavior

    /**
     * Filter the query to restrict the result to descendants of an object
     *
     * @param     ChildCategory $category The object to use for descendant search
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function descendantsOf(ChildCategory $category)
    {
        return $this
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getLeftValue(), Criteria::GREATER_THAN)
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getRightValue(), Criteria::LESS_THAN);
    }

    /**
     * Filter the query to restrict the result to the branch of an object.
     * Same as descendantsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     ChildCategory $category The object to use for branch search
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function branchOf(ChildCategory $category)
    {
        return $this
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getLeftValue(), Criteria::GREATER_EQUAL)
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getRightValue(), Criteria::LESS_EQUAL);
    }

    /**
     * Filter the query to restrict the result to children of an object
     *
     * @param     ChildCategory $category The object to use for child search
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function childrenOf(ChildCategory $category)
    {
        return $this
            ->descendantsOf($category)
            ->addUsingAlias(ChildCategory::LEVEL_COL, $category->getLevel() + 1, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to siblings of an object.
     * The result does not include the object passed as parameter.
     *
     * @param     ChildCategory $category The object to use for sibling search
     * @param      ConnectionInterface $con Connection to use.
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function siblingsOf(ChildCategory $category, ConnectionInterface $con = null)
    {
        if ($category->isRoot()) {
            return $this->
                add(ChildCategory::LEVEL_COL, '1<>1', Criteria::CUSTOM);
        } else {
            return $this
                ->childrenOf($category->getParent($con))
                ->prune($category);
        }
    }

    /**
     * Filter the query to restrict the result to ancestors of an object
     *
     * @param     ChildCategory $category The object to use for ancestors search
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function ancestorsOf(ChildCategory $category)
    {
        return $this
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getLeftValue(), Criteria::LESS_THAN)
            ->addUsingAlias(ChildCategory::RIGHT_COL, $category->getRightValue(), Criteria::GREATER_THAN);
    }

    /**
     * Filter the query to restrict the result to roots of an object.
     * Same as ancestorsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     ChildCategory $category The object to use for roots search
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function rootsOf(ChildCategory $category)
    {
        return $this
            ->addUsingAlias(ChildCategory::LEFT_COL, $category->getLeftValue(), Criteria::LESS_EQUAL)
            ->addUsingAlias(ChildCategory::RIGHT_COL, $category->getRightValue(), Criteria::GREATER_EQUAL);
    }

    /**
     * Order the result by branch, i.e. natural tree order
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function orderByBranch($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addDescendingOrderByColumn(ChildCategory::LEFT_COL);
        } else {
            return $this
                ->addAscendingOrderByColumn(ChildCategory::LEFT_COL);
        }
    }

    /**
     * Order the result by level, the closer to the root first
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    $this|ChildCategoryQuery The current query, for fluid interface
     */
    public function orderByLevel($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addDescendingOrderByColumn(ChildCategory::LEVEL_COL)
                ->addDescendingOrderByColumn(ChildCategory::LEFT_COL);
        } else {
            return $this
                ->addAscendingOrderByColumn(ChildCategory::LEVEL_COL)
                ->addAscendingOrderByColumn(ChildCategory::LEFT_COL);
        }
    }

    /**
     * Returns the root node for the tree
     *
     * @param      ConnectionInterface $con    Connection to use.
     *
     * @return     ChildCategory The tree root object
     */
    public function findRoot(ConnectionInterface $con = null)
    {
        return $this
            ->addUsingAlias(ChildCategory::LEFT_COL, 1, Criteria::EQUAL)
            ->findOne($con);
    }

    /**
     * Returns the tree of objects
     *
     * @param      ConnectionInterface $con    Connection to use.
     *
     * @return     ChildCategory[]|ObjectCollection|mixed the list of results, formatted by the current formatter
     */
    public function findTree(ConnectionInterface $con = null)
    {
        return $this
            ->orderByBranch()
            ->find($con);
    }

    /**
     * Returns the root node for a given scope
     *
     * @param      ConnectionInterface $con    Connection to use.
     * @return     ChildCategory            Propel object for root node
     */
    static public function retrieveRoot(ConnectionInterface $con = null)
    {
        $c = new Criteria(CategoryTableMap::DATABASE_NAME);
        $c->add(ChildCategory::LEFT_COL, 1, Criteria::EQUAL);

        return ChildCategoryQuery::create(null, $c)->findOne($con);
    }

    /**
     * Returns the whole tree node for a given scope
     *
     * @param      Criteria $criteria    Optional Criteria to filter the query
     * @param      ConnectionInterface $con    Connection to use.
     * @return     ChildCategory[]|ObjectCollection|mixed the list of results, formatted by the current formatter
     */
    static public function retrieveTree(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        if (null === $criteria) {
            $criteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        }
        $criteria->addAscendingOrderByColumn(ChildCategory::LEFT_COL);

        return ChildCategoryQuery::create(null, $criteria)->find($con);
    }

    /**
     * Tests if node is valid
     *
     * @param      ChildCategory $node    Propel object for src node
     * @return     bool
     */
    static public function isValid(ChildCategory $node = null)
    {
        if (is_object($node) && $node->getRightValue() > $node->getLeftValue()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete an entire tree
     *
     * @param      ConnectionInterface $con    Connection to use.
     *
     * @return     int  The number of deleted nodes
     */
    static public function deleteTree(ConnectionInterface $con = null)
    {

        return CategoryTableMap::doDeleteAll($con);
    }

    /**
     * Adds $delta to all L and R values that are >= $first and <= $last.
     * '$delta' can also be negative.
     *
     * @param int $delta               Value to be shifted by, can be negative
     * @param int $first               First node to be shifted
     * @param int $last                Last node to be shifted (optional)
     * @param ConnectionInterface $con Connection to use.
     */
    static public function shiftRLValues($delta, $first, $last = null, ConnectionInterface $con = null)
    {
        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        // Shift left column values
        $whereCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $criterion = $whereCriteria->getNewCriterion(ChildCategory::LEFT_COL, $first, Criteria::GREATER_EQUAL);
        if (null !== $last) {
            $criterion->addAnd($whereCriteria->getNewCriterion(ChildCategory::LEFT_COL, $last, Criteria::LESS_EQUAL));
        }
        $whereCriteria->add($criterion);

        $valuesCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $valuesCriteria->add(ChildCategory::LEFT_COL, array('raw' => ChildCategory::LEFT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        $whereCriteria->doUpdate($valuesCriteria, $con);

        // Shift right column values
        $whereCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $criterion = $whereCriteria->getNewCriterion(ChildCategory::RIGHT_COL, $first, Criteria::GREATER_EQUAL);
        if (null !== $last) {
            $criterion->addAnd($whereCriteria->getNewCriterion(ChildCategory::RIGHT_COL, $last, Criteria::LESS_EQUAL));
        }
        $whereCriteria->add($criterion);

        $valuesCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $valuesCriteria->add(ChildCategory::RIGHT_COL, array('raw' => ChildCategory::RIGHT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        $whereCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Adds $delta to level for nodes having left value >= $first and right value <= $last.
     * '$delta' can also be negative.
     *
     * @param      int $delta        Value to be shifted by, can be negative
     * @param      int $first        First node to be shifted
     * @param      int $last            Last node to be shifted
     * @param      ConnectionInterface $con        Connection to use.
     */
    static public function shiftLevel($delta, $first, $last, ConnectionInterface $con = null)
    {
        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoryTableMap::DATABASE_NAME);
        }

        $whereCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $whereCriteria->add(ChildCategory::LEFT_COL, $first, Criteria::GREATER_EQUAL);
        $whereCriteria->add(ChildCategory::RIGHT_COL, $last, Criteria::LESS_EQUAL);

        $valuesCriteria = new Criteria(CategoryTableMap::DATABASE_NAME);
        $valuesCriteria->add(ChildCategory::LEVEL_COL, array('raw' => ChildCategory::LEVEL_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);

        $whereCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Reload all already loaded nodes to sync them with updated db
     *
     * @param      ChildCategory $prune        Object to prune from the update
     * @param      ConnectionInterface $con        Connection to use.
     */
    static public function updateLoadedNodes($prune = null, ConnectionInterface $con = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            $keys = array();
            /** @var $obj ChildCategory */
            foreach (CategoryTableMap::$instances as $obj) {
                if (!$prune || !$prune->equals($obj)) {
                    $keys[] = $obj->getPrimaryKey();
                }
            }

            if (!empty($keys)) {
                // We don't need to alter the object instance pool; we're just modifying these ones
                // already in the pool.
                $criteria = new Criteria(CategoryTableMap::DATABASE_NAME);
                $criteria->add(CategoryTableMap::COL_ID, $keys, Criteria::IN);
                $dataFetcher = ChildCategoryQuery::create(null, $criteria)->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
                while ($row = $dataFetcher->fetch()) {
                    $key = CategoryTableMap::getPrimaryKeyHashFromRow($row, 0);
                    /** @var $object ChildCategory */
                    if (null !== ($object = CategoryTableMap::getInstanceFromPool($key))) {
                        $object->setLeftValue($row[4]);
                        $object->setRightValue($row[5]);
                        $object->setLevel($row[6]);
                        $object->clearNestedSetChildren();
                    }
                }
                $dataFetcher->close();
            }
        }
    }

    /**
     * Update the tree to allow insertion of a leaf at the specified position
     *
     * @param      int $left    left column value
     * @param      mixed $prune    Object to prune from the shift
     * @param      ConnectionInterface $con    Connection to use.
     */
    static public function makeRoomForLeaf($left, $prune = null, ConnectionInterface $con = null)
    {
        // Update database nodes
        ChildCategoryQuery::shiftRLValues(2, $left, null, $con);

        // Update all loaded nodes
        ChildCategoryQuery::updateLoadedNodes($prune, $con);
    }

    /**
     * Update the tree to allow insertion of a leaf at the specified position
     *
     * @param      ConnectionInterface $con    Connection to use.
     */
    static public function fixLevels(ConnectionInterface $con = null)
    {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(ChildCategory::LEFT_COL);
        $dataFetcher = ChildCategoryQuery::create(null, $c)->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);

        // set the class once to avoid overhead in the loop
        $cls = CategoryTableMap::getOMClass(false);
        $level = null;
        // iterate over the statement
        while ($row = $dataFetcher->fetch()) {

            // hydrate object
            $key = CategoryTableMap::getPrimaryKeyHashFromRow($row, 0);
            /** @var $obj ChildCategory */
            if (null === ($obj = CategoryTableMap::getInstanceFromPool($key))) {
                $obj = new $cls();
                $obj->hydrate($row);
                CategoryTableMap::addInstanceToPool($obj, $key);
            }

            // compute level
            // Algorithm shamelessly stolen from sfPropelActAsNestedSetBehaviorPlugin
            // Probably authored by Tristan Rivoallan
            if ($level === null) {
                $level = 0;
                $i = 0;
                $prev = array($obj->getRightValue());
            } else {
                while ($obj->getRightValue() > $prev[$i]) {
                    $i--;
                }
                $level = ++$i;
                $prev[$i] = $obj->getRightValue();
            }

            // update level in node if necessary
            if ($obj->getLevel() !== $level) {
                $obj->setLevel($level);
                $obj->save($con);
            }
        }
        $dataFetcher->close();
    }

} // CategoryQuery
