<?php

namespace Map;

use \Offers;
use \OffersQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'offers' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class OffersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.OffersTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'mob_db';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'offers';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Offers';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Offers';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'offers.id';

    /**
     * the column name for the offer_description field
     */
    const COL_OFFER_DESCRIPTION = 'offers.offer_description';

    /**
     * the column name for the offer_code field
     */
    const COL_OFFER_CODE = 'offers.offer_code';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'offers.date_added';

    /**
     * the column name for the date_updated field
     */
    const COL_DATE_UPDATED = 'offers.date_updated';

    /**
     * the column name for the valid_till field
     */
    const COL_VALID_TILL = 'offers.valid_till';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'offers.status';

    /**
     * the column name for the discount field
     */
    const COL_DISCOUNT = 'offers.discount';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'offers.user_id';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'OfferDescription', 'OfferCode', 'DateAdded', 'DateUpdated', 'ValidTill', 'Status', 'Discount', 'UserId', ),
        self::TYPE_CAMELNAME     => array('id', 'offerDescription', 'offerCode', 'dateAdded', 'dateUpdated', 'validTill', 'status', 'discount', 'userId', ),
        self::TYPE_COLNAME       => array(OffersTableMap::COL_ID, OffersTableMap::COL_OFFER_DESCRIPTION, OffersTableMap::COL_OFFER_CODE, OffersTableMap::COL_DATE_ADDED, OffersTableMap::COL_DATE_UPDATED, OffersTableMap::COL_VALID_TILL, OffersTableMap::COL_STATUS, OffersTableMap::COL_DISCOUNT, OffersTableMap::COL_USER_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'offer_description', 'offer_code', 'date_added', 'date_updated', 'valid_till', 'status', 'discount', 'user_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'OfferDescription' => 1, 'OfferCode' => 2, 'DateAdded' => 3, 'DateUpdated' => 4, 'ValidTill' => 5, 'Status' => 6, 'Discount' => 7, 'UserId' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'offerDescription' => 1, 'offerCode' => 2, 'dateAdded' => 3, 'dateUpdated' => 4, 'validTill' => 5, 'status' => 6, 'discount' => 7, 'userId' => 8, ),
        self::TYPE_COLNAME       => array(OffersTableMap::COL_ID => 0, OffersTableMap::COL_OFFER_DESCRIPTION => 1, OffersTableMap::COL_OFFER_CODE => 2, OffersTableMap::COL_DATE_ADDED => 3, OffersTableMap::COL_DATE_UPDATED => 4, OffersTableMap::COL_VALID_TILL => 5, OffersTableMap::COL_STATUS => 6, OffersTableMap::COL_DISCOUNT => 7, OffersTableMap::COL_USER_ID => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'offer_description' => 1, 'offer_code' => 2, 'date_added' => 3, 'date_updated' => 4, 'valid_till' => 5, 'status' => 6, 'discount' => 7, 'user_id' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('offers');
        $this->setPhpName('Offers');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Offers');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('offer_description', 'OfferDescription', 'LONGVARCHAR', false, null, null);
        $this->addColumn('offer_code', 'OfferCode', 'VARCHAR', false, 15, null);
        $this->addColumn('date_added', 'DateAdded', 'DATE', false, null, null);
        $this->addColumn('date_updated', 'DateUpdated', 'DATE', false, null, null);
        $this->addColumn('valid_till', 'ValidTill', 'DATE', false, null, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, true);
        $this->addColumn('discount', 'Discount', 'DOUBLE', false, null, null);
        $this->addColumn('user_id', 'UserId', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? OffersTableMap::CLASS_DEFAULT : OffersTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Offers object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = OffersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OffersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OffersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OffersTableMap::OM_CLASS;
            /** @var Offers $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OffersTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = OffersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OffersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Offers $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OffersTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(OffersTableMap::COL_ID);
            $criteria->addSelectColumn(OffersTableMap::COL_OFFER_DESCRIPTION);
            $criteria->addSelectColumn(OffersTableMap::COL_OFFER_CODE);
            $criteria->addSelectColumn(OffersTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(OffersTableMap::COL_DATE_UPDATED);
            $criteria->addSelectColumn(OffersTableMap::COL_VALID_TILL);
            $criteria->addSelectColumn(OffersTableMap::COL_STATUS);
            $criteria->addSelectColumn(OffersTableMap::COL_DISCOUNT);
            $criteria->addSelectColumn(OffersTableMap::COL_USER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.offer_description');
            $criteria->addSelectColumn($alias . '.offer_code');
            $criteria->addSelectColumn($alias . '.date_added');
            $criteria->addSelectColumn($alias . '.date_updated');
            $criteria->addSelectColumn($alias . '.valid_till');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.discount');
            $criteria->addSelectColumn($alias . '.user_id');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(OffersTableMap::DATABASE_NAME)->getTable(OffersTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(OffersTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(OffersTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new OffersTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Offers or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Offers object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OffersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Offers) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OffersTableMap::DATABASE_NAME);
            $criteria->add(OffersTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = OffersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OffersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OffersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the offers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return OffersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Offers or Criteria object.
     *
     * @param mixed               $criteria Criteria or Offers object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OffersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Offers object
        }

        if ($criteria->containsKey(OffersTableMap::COL_ID) && $criteria->keyContainsValue(OffersTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OffersTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = OffersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // OffersTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
OffersTableMap::buildTableMap();
