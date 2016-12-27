<?php

namespace Map;

use \TableSer;
use \TableSerQuery;
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
 * This class defines the structure of the 'table_ser' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class TableSerTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.TableSerTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'mob_db';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'table_ser';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\TableSer';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'TableSer';

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
    const COL_ID = 'table_ser.id';

    /**
     * the column name for the bar_code field
     */
    const COL_BAR_CODE = 'table_ser.bar_code';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'table_ser.name';

    /**
     * the column name for the position field
     */
    const COL_POSITION = 'table_ser.position';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'table_ser.date_added';

    /**
     * the column name for the date_updated field
     */
    const COL_DATE_UPDATED = 'table_ser.date_updated';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'table_ser.status';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'table_ser.description';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'table_ser.user_id';

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
        self::TYPE_PHPNAME       => array('Id', 'BarCode', 'Name', 'Position', 'DateAdded', 'DateUpdated', 'Status', 'Description', 'UserId', ),
        self::TYPE_CAMELNAME     => array('id', 'barCode', 'name', 'position', 'dateAdded', 'dateUpdated', 'status', 'description', 'userId', ),
        self::TYPE_COLNAME       => array(TableSerTableMap::COL_ID, TableSerTableMap::COL_BAR_CODE, TableSerTableMap::COL_NAME, TableSerTableMap::COL_POSITION, TableSerTableMap::COL_DATE_ADDED, TableSerTableMap::COL_DATE_UPDATED, TableSerTableMap::COL_STATUS, TableSerTableMap::COL_DESCRIPTION, TableSerTableMap::COL_USER_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'bar_code', 'name', 'position', 'date_added', 'date_updated', 'status', 'description', 'user_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'BarCode' => 1, 'Name' => 2, 'Position' => 3, 'DateAdded' => 4, 'DateUpdated' => 5, 'Status' => 6, 'Description' => 7, 'UserId' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'barCode' => 1, 'name' => 2, 'position' => 3, 'dateAdded' => 4, 'dateUpdated' => 5, 'status' => 6, 'description' => 7, 'userId' => 8, ),
        self::TYPE_COLNAME       => array(TableSerTableMap::COL_ID => 0, TableSerTableMap::COL_BAR_CODE => 1, TableSerTableMap::COL_NAME => 2, TableSerTableMap::COL_POSITION => 3, TableSerTableMap::COL_DATE_ADDED => 4, TableSerTableMap::COL_DATE_UPDATED => 5, TableSerTableMap::COL_STATUS => 6, TableSerTableMap::COL_DESCRIPTION => 7, TableSerTableMap::COL_USER_ID => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'bar_code' => 1, 'name' => 2, 'position' => 3, 'date_added' => 4, 'date_updated' => 5, 'status' => 6, 'description' => 7, 'user_id' => 8, ),
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
        $this->setName('table_ser');
        $this->setPhpName('TableSer');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\TableSer');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('bar_code', 'BarCode', 'VARCHAR', false, 100, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 45, null);
        $this->addColumn('position', 'Position', 'VARCHAR', false, 45, null);
        $this->addColumn('date_added', 'DateAdded', 'DATE', false, null, null);
        $this->addColumn('date_updated', 'DateUpdated', 'DATE', false, null, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, true);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('user_id', 'UserId', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SalesHeader', '\\SalesHeader', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':table_ser_id',
    1 => ':id',
  ),
), null, null, 'SalesHeaders', false);
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
        return $withPrefix ? TableSerTableMap::CLASS_DEFAULT : TableSerTableMap::OM_CLASS;
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
     * @return array           (TableSer object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = TableSerTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = TableSerTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + TableSerTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TableSerTableMap::OM_CLASS;
            /** @var TableSer $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            TableSerTableMap::addInstanceToPool($obj, $key);
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
            $key = TableSerTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = TableSerTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var TableSer $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TableSerTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(TableSerTableMap::COL_ID);
            $criteria->addSelectColumn(TableSerTableMap::COL_BAR_CODE);
            $criteria->addSelectColumn(TableSerTableMap::COL_NAME);
            $criteria->addSelectColumn(TableSerTableMap::COL_POSITION);
            $criteria->addSelectColumn(TableSerTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(TableSerTableMap::COL_DATE_UPDATED);
            $criteria->addSelectColumn(TableSerTableMap::COL_STATUS);
            $criteria->addSelectColumn(TableSerTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(TableSerTableMap::COL_USER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.bar_code');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.position');
            $criteria->addSelectColumn($alias . '.date_added');
            $criteria->addSelectColumn($alias . '.date_updated');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.description');
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
        return Propel::getServiceContainer()->getDatabaseMap(TableSerTableMap::DATABASE_NAME)->getTable(TableSerTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(TableSerTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(TableSerTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new TableSerTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a TableSer or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or TableSer object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(TableSerTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \TableSer) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TableSerTableMap::DATABASE_NAME);
            $criteria->add(TableSerTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = TableSerQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            TableSerTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                TableSerTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the table_ser table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return TableSerQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a TableSer or Criteria object.
     *
     * @param mixed               $criteria Criteria or TableSer object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TableSerTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from TableSer object
        }

        if ($criteria->containsKey(TableSerTableMap::COL_ID) && $criteria->keyContainsValue(TableSerTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TableSerTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = TableSerQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // TableSerTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
TableSerTableMap::buildTableMap();
