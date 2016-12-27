<?php

namespace Base;

use \SalesDetail as ChildSalesDetail;
use \SalesDetailQuery as ChildSalesDetailQuery;
use \Exception;
use \PDO;
use Map\SalesDetailTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'sales_detail' table.
 *
 *
 *
 * @method     ChildSalesDetailQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSalesDetailQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildSalesDetailQuery orderByQnty($order = Criteria::ASC) Order by the qnty column
 * @method     ChildSalesDetailQuery orderBySalesHeaderId($order = Criteria::ASC) Order by the sales_header_id column
 * @method     ChildSalesDetailQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 *
 * @method     ChildSalesDetailQuery groupById() Group by the id column
 * @method     ChildSalesDetailQuery groupByPrice() Group by the price column
 * @method     ChildSalesDetailQuery groupByQnty() Group by the qnty column
 * @method     ChildSalesDetailQuery groupBySalesHeaderId() Group by the sales_header_id column
 * @method     ChildSalesDetailQuery groupByProductId() Group by the product_id column
 *
 * @method     ChildSalesDetailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSalesDetailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSalesDetailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSalesDetailQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSalesDetailQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSalesDetailQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSalesDetailQuery leftJoinProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the Product relation
 * @method     ChildSalesDetailQuery rightJoinProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Product relation
 * @method     ChildSalesDetailQuery innerJoinProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the Product relation
 *
 * @method     ChildSalesDetailQuery joinWithProduct($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Product relation
 *
 * @method     ChildSalesDetailQuery leftJoinWithProduct() Adds a LEFT JOIN clause and with to the query using the Product relation
 * @method     ChildSalesDetailQuery rightJoinWithProduct() Adds a RIGHT JOIN clause and with to the query using the Product relation
 * @method     ChildSalesDetailQuery innerJoinWithProduct() Adds a INNER JOIN clause and with to the query using the Product relation
 *
 * @method     ChildSalesDetailQuery leftJoinSalesHeader($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesHeader relation
 * @method     ChildSalesDetailQuery rightJoinSalesHeader($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesHeader relation
 * @method     ChildSalesDetailQuery innerJoinSalesHeader($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesHeader relation
 *
 * @method     ChildSalesDetailQuery joinWithSalesHeader($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the SalesHeader relation
 *
 * @method     ChildSalesDetailQuery leftJoinWithSalesHeader() Adds a LEFT JOIN clause and with to the query using the SalesHeader relation
 * @method     ChildSalesDetailQuery rightJoinWithSalesHeader() Adds a RIGHT JOIN clause and with to the query using the SalesHeader relation
 * @method     ChildSalesDetailQuery innerJoinWithSalesHeader() Adds a INNER JOIN clause and with to the query using the SalesHeader relation
 *
 * @method     \ProductQuery|\SalesHeaderQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSalesDetail findOne(ConnectionInterface $con = null) Return the first ChildSalesDetail matching the query
 * @method     ChildSalesDetail findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSalesDetail matching the query, or a new ChildSalesDetail object populated from the query conditions when no match is found
 *
 * @method     ChildSalesDetail findOneById(int $id) Return the first ChildSalesDetail filtered by the id column
 * @method     ChildSalesDetail findOneByPrice(double $price) Return the first ChildSalesDetail filtered by the price column
 * @method     ChildSalesDetail findOneByQnty(int $qnty) Return the first ChildSalesDetail filtered by the qnty column
 * @method     ChildSalesDetail findOneBySalesHeaderId(int $sales_header_id) Return the first ChildSalesDetail filtered by the sales_header_id column
 * @method     ChildSalesDetail findOneByProductId(int $product_id) Return the first ChildSalesDetail filtered by the product_id column *

 * @method     ChildSalesDetail requirePk($key, ConnectionInterface $con = null) Return the ChildSalesDetail by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesDetail requireOne(ConnectionInterface $con = null) Return the first ChildSalesDetail matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSalesDetail requireOneById(int $id) Return the first ChildSalesDetail filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesDetail requireOneByPrice(double $price) Return the first ChildSalesDetail filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesDetail requireOneByQnty(int $qnty) Return the first ChildSalesDetail filtered by the qnty column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesDetail requireOneBySalesHeaderId(int $sales_header_id) Return the first ChildSalesDetail filtered by the sales_header_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesDetail requireOneByProductId(int $product_id) Return the first ChildSalesDetail filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSalesDetail[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSalesDetail objects based on current ModelCriteria
 * @method     ChildSalesDetail[]|ObjectCollection findById(int $id) Return ChildSalesDetail objects filtered by the id column
 * @method     ChildSalesDetail[]|ObjectCollection findByPrice(double $price) Return ChildSalesDetail objects filtered by the price column
 * @method     ChildSalesDetail[]|ObjectCollection findByQnty(int $qnty) Return ChildSalesDetail objects filtered by the qnty column
 * @method     ChildSalesDetail[]|ObjectCollection findBySalesHeaderId(int $sales_header_id) Return ChildSalesDetail objects filtered by the sales_header_id column
 * @method     ChildSalesDetail[]|ObjectCollection findByProductId(int $product_id) Return ChildSalesDetail objects filtered by the product_id column
 * @method     ChildSalesDetail[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SalesDetailQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SalesDetailQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'mob_db', $modelName = '\\SalesDetail', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSalesDetailQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSalesDetailQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSalesDetailQuery) {
            return $criteria;
        }
        $query = new ChildSalesDetailQuery();
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
     * @return ChildSalesDetail|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SalesDetailTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SalesDetailTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSalesDetail A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, price, qnty, sales_header_id, product_id FROM sales_detail WHERE id = :p0';
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
            /** @var ChildSalesDetail $obj */
            $obj = new ChildSalesDetail();
            $obj->hydrate($row);
            SalesDetailTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSalesDetail|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSalesDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SalesDetailTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSalesDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SalesDetailTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSalesDetailQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SalesDetailTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SalesDetailTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesDetailTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildSalesDetailQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(SalesDetailTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(SalesDetailTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesDetailTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the qnty column
     *
     * Example usage:
     * <code>
     * $query->filterByQnty(1234); // WHERE qnty = 1234
     * $query->filterByQnty(array(12, 34)); // WHERE qnty IN (12, 34)
     * $query->filterByQnty(array('min' => 12)); // WHERE qnty > 12
     * </code>
     *
     * @param     mixed $qnty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSalesDetailQuery The current query, for fluid interface
     */
    public function filterByQnty($qnty = null, $comparison = null)
    {
        if (is_array($qnty)) {
            $useMinMax = false;
            if (isset($qnty['min'])) {
                $this->addUsingAlias(SalesDetailTableMap::COL_QNTY, $qnty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qnty['max'])) {
                $this->addUsingAlias(SalesDetailTableMap::COL_QNTY, $qnty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesDetailTableMap::COL_QNTY, $qnty, $comparison);
    }

    /**
     * Filter the query on the sales_header_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySalesHeaderId(1234); // WHERE sales_header_id = 1234
     * $query->filterBySalesHeaderId(array(12, 34)); // WHERE sales_header_id IN (12, 34)
     * $query->filterBySalesHeaderId(array('min' => 12)); // WHERE sales_header_id > 12
     * </code>
     *
     * @see       filterBySalesHeader()
     *
     * @param     mixed $salesHeaderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSalesDetailQuery The current query, for fluid interface
     */
    public function filterBySalesHeaderId($salesHeaderId = null, $comparison = null)
    {
        if (is_array($salesHeaderId)) {
            $useMinMax = false;
            if (isset($salesHeaderId['min'])) {
                $this->addUsingAlias(SalesDetailTableMap::COL_SALES_HEADER_ID, $salesHeaderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($salesHeaderId['max'])) {
                $this->addUsingAlias(SalesDetailTableMap::COL_SALES_HEADER_ID, $salesHeaderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesDetailTableMap::COL_SALES_HEADER_ID, $salesHeaderId, $comparison);
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
     * @return $this|ChildSalesDetailQuery The current query, for fluid interface
     */
    public function filterByProductId($productId = null, $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(SalesDetailTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(SalesDetailTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SalesDetailTableMap::COL_PRODUCT_ID, $productId, $comparison);
    }

    /**
     * Filter the query by a related \Product object
     *
     * @param \Product|ObjectCollection $product The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSalesDetailQuery The current query, for fluid interface
     */
    public function filterByProduct($product, $comparison = null)
    {
        if ($product instanceof \Product) {
            return $this
                ->addUsingAlias(SalesDetailTableMap::COL_PRODUCT_ID, $product->getId(), $comparison);
        } elseif ($product instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SalesDetailTableMap::COL_PRODUCT_ID, $product->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildSalesDetailQuery The current query, for fluid interface
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
     * Filter the query by a related \SalesHeader object
     *
     * @param \SalesHeader|ObjectCollection $salesHeader The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSalesDetailQuery The current query, for fluid interface
     */
    public function filterBySalesHeader($salesHeader, $comparison = null)
    {
        if ($salesHeader instanceof \SalesHeader) {
            return $this
                ->addUsingAlias(SalesDetailTableMap::COL_SALES_HEADER_ID, $salesHeader->getId(), $comparison);
        } elseif ($salesHeader instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SalesDetailTableMap::COL_SALES_HEADER_ID, $salesHeader->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildSalesDetailQuery The current query, for fluid interface
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
     * @param   ChildSalesDetail $salesDetail Object to remove from the list of results
     *
     * @return $this|ChildSalesDetailQuery The current query, for fluid interface
     */
    public function prune($salesDetail = null)
    {
        if ($salesDetail) {
            $this->addUsingAlias(SalesDetailTableMap::COL_ID, $salesDetail->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the sales_detail table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SalesDetailTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SalesDetailTableMap::clearInstancePool();
            SalesDetailTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SalesDetailTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SalesDetailTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SalesDetailTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SalesDetailTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SalesDetailQuery
