<?php

namespace Base;

use \Offers as ChildOffers;
use \OffersQuery as ChildOffersQuery;
use \Exception;
use \PDO;
use Map\OffersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'offers' table.
 *
 *
 *
 * @method     ChildOffersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildOffersQuery orderByOfferDescription($order = Criteria::ASC) Order by the offer_description column
 * @method     ChildOffersQuery orderByOfferCode($order = Criteria::ASC) Order by the offer_code column
 * @method     ChildOffersQuery orderByDateAdded($order = Criteria::ASC) Order by the date_added column
 * @method     ChildOffersQuery orderByDateUpdated($order = Criteria::ASC) Order by the date_updated column
 * @method     ChildOffersQuery orderByValidTill($order = Criteria::ASC) Order by the valid_till column
 * @method     ChildOffersQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildOffersQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildOffersQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 *
 * @method     ChildOffersQuery groupById() Group by the id column
 * @method     ChildOffersQuery groupByOfferDescription() Group by the offer_description column
 * @method     ChildOffersQuery groupByOfferCode() Group by the offer_code column
 * @method     ChildOffersQuery groupByDateAdded() Group by the date_added column
 * @method     ChildOffersQuery groupByDateUpdated() Group by the date_updated column
 * @method     ChildOffersQuery groupByValidTill() Group by the valid_till column
 * @method     ChildOffersQuery groupByStatus() Group by the status column
 * @method     ChildOffersQuery groupByDiscount() Group by the discount column
 * @method     ChildOffersQuery groupByUserId() Group by the user_id column
 *
 * @method     ChildOffersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOffersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOffersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOffersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOffersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOffersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOffers findOne(ConnectionInterface $con = null) Return the first ChildOffers matching the query
 * @method     ChildOffers findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOffers matching the query, or a new ChildOffers object populated from the query conditions when no match is found
 *
 * @method     ChildOffers findOneById(int $id) Return the first ChildOffers filtered by the id column
 * @method     ChildOffers findOneByOfferDescription(string $offer_description) Return the first ChildOffers filtered by the offer_description column
 * @method     ChildOffers findOneByOfferCode(string $offer_code) Return the first ChildOffers filtered by the offer_code column
 * @method     ChildOffers findOneByDateAdded(string $date_added) Return the first ChildOffers filtered by the date_added column
 * @method     ChildOffers findOneByDateUpdated(string $date_updated) Return the first ChildOffers filtered by the date_updated column
 * @method     ChildOffers findOneByValidTill(string $valid_till) Return the first ChildOffers filtered by the valid_till column
 * @method     ChildOffers findOneByStatus(boolean $status) Return the first ChildOffers filtered by the status column
 * @method     ChildOffers findOneByDiscount(double $discount) Return the first ChildOffers filtered by the discount column
 * @method     ChildOffers findOneByUserId(int $user_id) Return the first ChildOffers filtered by the user_id column *

 * @method     ChildOffers requirePk($key, ConnectionInterface $con = null) Return the ChildOffers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOffers requireOne(ConnectionInterface $con = null) Return the first ChildOffers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOffers requireOneById(int $id) Return the first ChildOffers filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOffers requireOneByOfferDescription(string $offer_description) Return the first ChildOffers filtered by the offer_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOffers requireOneByOfferCode(string $offer_code) Return the first ChildOffers filtered by the offer_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOffers requireOneByDateAdded(string $date_added) Return the first ChildOffers filtered by the date_added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOffers requireOneByDateUpdated(string $date_updated) Return the first ChildOffers filtered by the date_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOffers requireOneByValidTill(string $valid_till) Return the first ChildOffers filtered by the valid_till column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOffers requireOneByStatus(boolean $status) Return the first ChildOffers filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOffers requireOneByDiscount(double $discount) Return the first ChildOffers filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOffers requireOneByUserId(int $user_id) Return the first ChildOffers filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOffers[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOffers objects based on current ModelCriteria
 * @method     ChildOffers[]|ObjectCollection findById(int $id) Return ChildOffers objects filtered by the id column
 * @method     ChildOffers[]|ObjectCollection findByOfferDescription(string $offer_description) Return ChildOffers objects filtered by the offer_description column
 * @method     ChildOffers[]|ObjectCollection findByOfferCode(string $offer_code) Return ChildOffers objects filtered by the offer_code column
 * @method     ChildOffers[]|ObjectCollection findByDateAdded(string $date_added) Return ChildOffers objects filtered by the date_added column
 * @method     ChildOffers[]|ObjectCollection findByDateUpdated(string $date_updated) Return ChildOffers objects filtered by the date_updated column
 * @method     ChildOffers[]|ObjectCollection findByValidTill(string $valid_till) Return ChildOffers objects filtered by the valid_till column
 * @method     ChildOffers[]|ObjectCollection findByStatus(boolean $status) Return ChildOffers objects filtered by the status column
 * @method     ChildOffers[]|ObjectCollection findByDiscount(double $discount) Return ChildOffers objects filtered by the discount column
 * @method     ChildOffers[]|ObjectCollection findByUserId(int $user_id) Return ChildOffers objects filtered by the user_id column
 * @method     ChildOffers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OffersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OffersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'mob_db', $modelName = '\\Offers', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOffersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOffersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOffersQuery) {
            return $criteria;
        }
        $query = new ChildOffersQuery();
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
     * @return ChildOffers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OffersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OffersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOffers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, offer_description, offer_code, date_added, date_updated, valid_till, status, discount, user_id FROM offers WHERE id = :p0';
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
            /** @var ChildOffers $obj */
            $obj = new ChildOffers();
            $obj->hydrate($row);
            OffersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOffers|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OffersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OffersTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OffersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OffersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OffersTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the offer_description column
     *
     * Example usage:
     * <code>
     * $query->filterByOfferDescription('fooValue');   // WHERE offer_description = 'fooValue'
     * $query->filterByOfferDescription('%fooValue%', Criteria::LIKE); // WHERE offer_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $offerDescription The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function filterByOfferDescription($offerDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($offerDescription)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OffersTableMap::COL_OFFER_DESCRIPTION, $offerDescription, $comparison);
    }

    /**
     * Filter the query on the offer_code column
     *
     * Example usage:
     * <code>
     * $query->filterByOfferCode('fooValue');   // WHERE offer_code = 'fooValue'
     * $query->filterByOfferCode('%fooValue%', Criteria::LIKE); // WHERE offer_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $offerCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function filterByOfferCode($offerCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($offerCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OffersTableMap::COL_OFFER_CODE, $offerCode, $comparison);
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
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(OffersTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(OffersTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OffersTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
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
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function filterByDateUpdated($dateUpdated = null, $comparison = null)
    {
        if (is_array($dateUpdated)) {
            $useMinMax = false;
            if (isset($dateUpdated['min'])) {
                $this->addUsingAlias(OffersTableMap::COL_DATE_UPDATED, $dateUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateUpdated['max'])) {
                $this->addUsingAlias(OffersTableMap::COL_DATE_UPDATED, $dateUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OffersTableMap::COL_DATE_UPDATED, $dateUpdated, $comparison);
    }

    /**
     * Filter the query on the valid_till column
     *
     * Example usage:
     * <code>
     * $query->filterByValidTill('2011-03-14'); // WHERE valid_till = '2011-03-14'
     * $query->filterByValidTill('now'); // WHERE valid_till = '2011-03-14'
     * $query->filterByValidTill(array('max' => 'yesterday')); // WHERE valid_till > '2011-03-13'
     * </code>
     *
     * @param     mixed $validTill The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function filterByValidTill($validTill = null, $comparison = null)
    {
        if (is_array($validTill)) {
            $useMinMax = false;
            if (isset($validTill['min'])) {
                $this->addUsingAlias(OffersTableMap::COL_VALID_TILL, $validTill['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validTill['max'])) {
                $this->addUsingAlias(OffersTableMap::COL_VALID_TILL, $validTill['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OffersTableMap::COL_VALID_TILL, $validTill, $comparison);
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
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OffersTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the discount column
     *
     * Example usage:
     * <code>
     * $query->filterByDiscount(1234); // WHERE discount = 1234
     * $query->filterByDiscount(array(12, 34)); // WHERE discount IN (12, 34)
     * $query->filterByDiscount(array('min' => 12)); // WHERE discount > 12
     * </code>
     *
     * @param     mixed $discount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function filterByDiscount($discount = null, $comparison = null)
    {
        if (is_array($discount)) {
            $useMinMax = false;
            if (isset($discount['min'])) {
                $this->addUsingAlias(OffersTableMap::COL_DISCOUNT, $discount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($discount['max'])) {
                $this->addUsingAlias(OffersTableMap::COL_DISCOUNT, $discount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OffersTableMap::COL_DISCOUNT, $discount, $comparison);
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
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(OffersTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(OffersTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OffersTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOffers $offers Object to remove from the list of results
     *
     * @return $this|ChildOffersQuery The current query, for fluid interface
     */
    public function prune($offers = null)
    {
        if ($offers) {
            $this->addUsingAlias(OffersTableMap::COL_ID, $offers->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the offers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OffersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OffersTableMap::clearInstancePool();
            OffersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OffersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OffersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OffersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OffersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OffersQuery
