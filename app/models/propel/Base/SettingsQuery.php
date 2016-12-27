<?php

namespace Base;

use \Settings as ChildSettings;
use \SettingsQuery as ChildSettingsQuery;
use \Exception;
use \PDO;
use Map\SettingsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'settings' table.
 *
 *
 *
 * @method     ChildSettingsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSettingsQuery orderByTermsConditions($order = Criteria::ASC) Order by the terms_conditions column
 * @method     ChildSettingsQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method     ChildSettingsQuery orderByAboutUs($order = Criteria::ASC) Order by the about_us column
 * @method     ChildSettingsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildSettingsQuery orderByTele($order = Criteria::ASC) Order by the tele column
 * @method     ChildSettingsQuery orderByBrcNo($order = Criteria::ASC) Order by the brc_no column
 *
 * @method     ChildSettingsQuery groupById() Group by the id column
 * @method     ChildSettingsQuery groupByTermsConditions() Group by the terms_conditions column
 * @method     ChildSettingsQuery groupByNote() Group by the note column
 * @method     ChildSettingsQuery groupByAboutUs() Group by the about_us column
 * @method     ChildSettingsQuery groupByEmail() Group by the email column
 * @method     ChildSettingsQuery groupByTele() Group by the tele column
 * @method     ChildSettingsQuery groupByBrcNo() Group by the brc_no column
 *
 * @method     ChildSettingsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSettingsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSettingsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSettingsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSettingsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSettingsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSettings findOne(ConnectionInterface $con = null) Return the first ChildSettings matching the query
 * @method     ChildSettings findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSettings matching the query, or a new ChildSettings object populated from the query conditions when no match is found
 *
 * @method     ChildSettings findOneById(int $id) Return the first ChildSettings filtered by the id column
 * @method     ChildSettings findOneByTermsConditions(string $terms_conditions) Return the first ChildSettings filtered by the terms_conditions column
 * @method     ChildSettings findOneByNote(string $note) Return the first ChildSettings filtered by the note column
 * @method     ChildSettings findOneByAboutUs(string $about_us) Return the first ChildSettings filtered by the about_us column
 * @method     ChildSettings findOneByEmail(string $email) Return the first ChildSettings filtered by the email column
 * @method     ChildSettings findOneByTele(string $tele) Return the first ChildSettings filtered by the tele column
 * @method     ChildSettings findOneByBrcNo(string $brc_no) Return the first ChildSettings filtered by the brc_no column *

 * @method     ChildSettings requirePk($key, ConnectionInterface $con = null) Return the ChildSettings by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSettings requireOne(ConnectionInterface $con = null) Return the first ChildSettings matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSettings requireOneById(int $id) Return the first ChildSettings filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSettings requireOneByTermsConditions(string $terms_conditions) Return the first ChildSettings filtered by the terms_conditions column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSettings requireOneByNote(string $note) Return the first ChildSettings filtered by the note column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSettings requireOneByAboutUs(string $about_us) Return the first ChildSettings filtered by the about_us column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSettings requireOneByEmail(string $email) Return the first ChildSettings filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSettings requireOneByTele(string $tele) Return the first ChildSettings filtered by the tele column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSettings requireOneByBrcNo(string $brc_no) Return the first ChildSettings filtered by the brc_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSettings[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSettings objects based on current ModelCriteria
 * @method     ChildSettings[]|ObjectCollection findById(int $id) Return ChildSettings objects filtered by the id column
 * @method     ChildSettings[]|ObjectCollection findByTermsConditions(string $terms_conditions) Return ChildSettings objects filtered by the terms_conditions column
 * @method     ChildSettings[]|ObjectCollection findByNote(string $note) Return ChildSettings objects filtered by the note column
 * @method     ChildSettings[]|ObjectCollection findByAboutUs(string $about_us) Return ChildSettings objects filtered by the about_us column
 * @method     ChildSettings[]|ObjectCollection findByEmail(string $email) Return ChildSettings objects filtered by the email column
 * @method     ChildSettings[]|ObjectCollection findByTele(string $tele) Return ChildSettings objects filtered by the tele column
 * @method     ChildSettings[]|ObjectCollection findByBrcNo(string $brc_no) Return ChildSettings objects filtered by the brc_no column
 * @method     ChildSettings[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SettingsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SettingsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'mob_db', $modelName = '\\Settings', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSettingsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSettingsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSettingsQuery) {
            return $criteria;
        }
        $query = new ChildSettingsQuery();
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
     * @return ChildSettings|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SettingsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SettingsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSettings A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, terms_conditions, note, about_us, email, tele, brc_no FROM settings WHERE id = :p0';
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
            /** @var ChildSettings $obj */
            $obj = new ChildSettings();
            $obj->hydrate($row);
            SettingsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSettings|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSettingsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SettingsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSettingsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SettingsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSettingsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SettingsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SettingsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SettingsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the terms_conditions column
     *
     * Example usage:
     * <code>
     * $query->filterByTermsConditions('fooValue');   // WHERE terms_conditions = 'fooValue'
     * $query->filterByTermsConditions('%fooValue%', Criteria::LIKE); // WHERE terms_conditions LIKE '%fooValue%'
     * </code>
     *
     * @param     string $termsConditions The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSettingsQuery The current query, for fluid interface
     */
    public function filterByTermsConditions($termsConditions = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($termsConditions)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SettingsTableMap::COL_TERMS_CONDITIONS, $termsConditions, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote('fooValue');   // WHERE note = 'fooValue'
     * $query->filterByNote('%fooValue%', Criteria::LIKE); // WHERE note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $note The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSettingsQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($note)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SettingsTableMap::COL_NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the about_us column
     *
     * Example usage:
     * <code>
     * $query->filterByAboutUs('fooValue');   // WHERE about_us = 'fooValue'
     * $query->filterByAboutUs('%fooValue%', Criteria::LIKE); // WHERE about_us LIKE '%fooValue%'
     * </code>
     *
     * @param     string $aboutUs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSettingsQuery The current query, for fluid interface
     */
    public function filterByAboutUs($aboutUs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($aboutUs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SettingsTableMap::COL_ABOUT_US, $aboutUs, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSettingsQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SettingsTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the tele column
     *
     * Example usage:
     * <code>
     * $query->filterByTele('fooValue');   // WHERE tele = 'fooValue'
     * $query->filterByTele('%fooValue%', Criteria::LIKE); // WHERE tele LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tele The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSettingsQuery The current query, for fluid interface
     */
    public function filterByTele($tele = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tele)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SettingsTableMap::COL_TELE, $tele, $comparison);
    }

    /**
     * Filter the query on the brc_no column
     *
     * Example usage:
     * <code>
     * $query->filterByBrcNo('fooValue');   // WHERE brc_no = 'fooValue'
     * $query->filterByBrcNo('%fooValue%', Criteria::LIKE); // WHERE brc_no LIKE '%fooValue%'
     * </code>
     *
     * @param     string $brcNo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSettingsQuery The current query, for fluid interface
     */
    public function filterByBrcNo($brcNo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($brcNo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SettingsTableMap::COL_BRC_NO, $brcNo, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSettings $settings Object to remove from the list of results
     *
     * @return $this|ChildSettingsQuery The current query, for fluid interface
     */
    public function prune($settings = null)
    {
        if ($settings) {
            $this->addUsingAlias(SettingsTableMap::COL_ID, $settings->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the settings table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SettingsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SettingsTableMap::clearInstancePool();
            SettingsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SettingsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SettingsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SettingsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SettingsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SettingsQuery
