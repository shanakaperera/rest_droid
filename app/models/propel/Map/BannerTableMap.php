<?php

namespace Map;

use \Banner;
use \BannerQuery;
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
 * This class defines the structure of the 'banner' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BannerTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BannerTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'mob_db';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'banner';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Banner';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Banner';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    const COL_ID = 'banner.id';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'banner.description';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'banner.date_added';

    /**
     * the column name for the date_updated field
     */
    const COL_DATE_UPDATED = 'banner.date_updated';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'banner.status';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'banner.user_id';

    /**
     * the column name for the product_id field
     */
    const COL_PRODUCT_ID = 'banner.product_id';

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
        self::TYPE_PHPNAME       => array('Id', 'Description', 'DateAdded', 'DateUpdated', 'Status', 'UserId', 'ProductId', ),
        self::TYPE_CAMELNAME     => array('id', 'description', 'dateAdded', 'dateUpdated', 'status', 'userId', 'productId', ),
        self::TYPE_COLNAME       => array(BannerTableMap::COL_ID, BannerTableMap::COL_DESCRIPTION, BannerTableMap::COL_DATE_ADDED, BannerTableMap::COL_DATE_UPDATED, BannerTableMap::COL_STATUS, BannerTableMap::COL_USER_ID, BannerTableMap::COL_PRODUCT_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'description', 'date_added', 'date_updated', 'status', 'user_id', 'product_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Description' => 1, 'DateAdded' => 2, 'DateUpdated' => 3, 'Status' => 4, 'UserId' => 5, 'ProductId' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'description' => 1, 'dateAdded' => 2, 'dateUpdated' => 3, 'status' => 4, 'userId' => 5, 'productId' => 6, ),
        self::TYPE_COLNAME       => array(BannerTableMap::COL_ID => 0, BannerTableMap::COL_DESCRIPTION => 1, BannerTableMap::COL_DATE_ADDED => 2, BannerTableMap::COL_DATE_UPDATED => 3, BannerTableMap::COL_STATUS => 4, BannerTableMap::COL_USER_ID => 5, BannerTableMap::COL_PRODUCT_ID => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'description' => 1, 'date_added' => 2, 'date_updated' => 3, 'status' => 4, 'user_id' => 5, 'product_id' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('banner');
        $this->setPhpName('Banner');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Banner');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 45, null);
        $this->addColumn('date_added', 'DateAdded', 'DATE', false, null, null);
        $this->addColumn('date_updated', 'DateUpdated', 'DATE', false, null, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, true);
        $this->addColumn('user_id', 'UserId', 'INTEGER', false, null, null);
        $this->addForeignKey('product_id', 'ProductId', 'INTEGER', 'product', 'id', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Product', '\\Product', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':product_id',
    1 => ':id',
  ),
), null, null, null, false);
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
        return $withPrefix ? BannerTableMap::CLASS_DEFAULT : BannerTableMap::OM_CLASS;
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
     * @return array           (Banner object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BannerTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BannerTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BannerTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BannerTableMap::OM_CLASS;
            /** @var Banner $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BannerTableMap::addInstanceToPool($obj, $key);
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
            $key = BannerTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BannerTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Banner $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BannerTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(BannerTableMap::COL_ID);
            $criteria->addSelectColumn(BannerTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(BannerTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(BannerTableMap::COL_DATE_UPDATED);
            $criteria->addSelectColumn(BannerTableMap::COL_STATUS);
            $criteria->addSelectColumn(BannerTableMap::COL_USER_ID);
            $criteria->addSelectColumn(BannerTableMap::COL_PRODUCT_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.date_added');
            $criteria->addSelectColumn($alias . '.date_updated');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.product_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(BannerTableMap::DATABASE_NAME)->getTable(BannerTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BannerTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BannerTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BannerTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Banner or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Banner object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(BannerTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Banner) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BannerTableMap::DATABASE_NAME);
            $criteria->add(BannerTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = BannerQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BannerTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BannerTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the banner table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BannerQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Banner or Criteria object.
     *
     * @param mixed               $criteria Criteria or Banner object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BannerTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Banner object
        }

        if ($criteria->containsKey(BannerTableMap::COL_ID) && $criteria->keyContainsValue(BannerTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BannerTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = BannerQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BannerTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BannerTableMap::buildTableMap();
