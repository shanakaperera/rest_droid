<?php

namespace Map;

use \Client;
use \ClientQuery;
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
 * This class defines the structure of the 'client' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ClientTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ClientTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'mob_db';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'client';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Client';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Client';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    const COL_ID = 'client.id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'client.name';

    /**
     * the column name for the address field
     */
    const COL_ADDRESS = 'client.address';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'client.status';

    /**
     * the column name for the date_added field
     */
    const COL_DATE_ADDED = 'client.date_added';

    /**
     * the column name for the date_updated field
     */
    const COL_DATE_UPDATED = 'client.date_updated';

    /**
     * the column name for the android_id field
     */
    const COL_ANDROID_ID = 'client.android_id';

    /**
     * the column name for the wifi_name field
     */
    const COL_WIFI_NAME = 'client.wifi_name';

    /**
     * the column name for the serial_number field
     */
    const COL_SERIAL_NUMBER = 'client.serial_number';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'client.user_id';

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
        self::TYPE_PHPNAME       => array('Id', 'Name', 'Address', 'Status', 'DateAdded', 'DateUpdated', 'AndroidId', 'WifiName', 'SerialNumber', 'UserId', ),
        self::TYPE_CAMELNAME     => array('id', 'name', 'address', 'status', 'dateAdded', 'dateUpdated', 'androidId', 'wifiName', 'serialNumber', 'userId', ),
        self::TYPE_COLNAME       => array(ClientTableMap::COL_ID, ClientTableMap::COL_NAME, ClientTableMap::COL_ADDRESS, ClientTableMap::COL_STATUS, ClientTableMap::COL_DATE_ADDED, ClientTableMap::COL_DATE_UPDATED, ClientTableMap::COL_ANDROID_ID, ClientTableMap::COL_WIFI_NAME, ClientTableMap::COL_SERIAL_NUMBER, ClientTableMap::COL_USER_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'name', 'address', 'status', 'date_added', 'date_updated', 'android_id', 'wifi_name', 'serial_number', 'user_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'Address' => 2, 'Status' => 3, 'DateAdded' => 4, 'DateUpdated' => 5, 'AndroidId' => 6, 'WifiName' => 7, 'SerialNumber' => 8, 'UserId' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'name' => 1, 'address' => 2, 'status' => 3, 'dateAdded' => 4, 'dateUpdated' => 5, 'androidId' => 6, 'wifiName' => 7, 'serialNumber' => 8, 'userId' => 9, ),
        self::TYPE_COLNAME       => array(ClientTableMap::COL_ID => 0, ClientTableMap::COL_NAME => 1, ClientTableMap::COL_ADDRESS => 2, ClientTableMap::COL_STATUS => 3, ClientTableMap::COL_DATE_ADDED => 4, ClientTableMap::COL_DATE_UPDATED => 5, ClientTableMap::COL_ANDROID_ID => 6, ClientTableMap::COL_WIFI_NAME => 7, ClientTableMap::COL_SERIAL_NUMBER => 8, ClientTableMap::COL_USER_ID => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'name' => 1, 'address' => 2, 'status' => 3, 'date_added' => 4, 'date_updated' => 5, 'android_id' => 6, 'wifi_name' => 7, 'serial_number' => 8, 'user_id' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('client');
        $this->setPhpName('Client');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Client');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'LONGVARCHAR', false, null, null);
        $this->addColumn('address', 'Address', 'LONGVARCHAR', false, null, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, true);
        $this->addColumn('date_added', 'DateAdded', 'DATE', false, null, null);
        $this->addColumn('date_updated', 'DateUpdated', 'DATE', false, null, null);
        $this->addColumn('android_id', 'AndroidId', 'LONGVARCHAR', false, null, null);
        $this->addColumn('wifi_name', 'WifiName', 'VARCHAR', false, 45, null);
        $this->addColumn('serial_number', 'SerialNumber', 'LONGVARCHAR', false, null, null);
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
    0 => ':client_id',
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
        return $withPrefix ? ClientTableMap::CLASS_DEFAULT : ClientTableMap::OM_CLASS;
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
     * @return array           (Client object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ClientTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ClientTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ClientTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClientTableMap::OM_CLASS;
            /** @var Client $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ClientTableMap::addInstanceToPool($obj, $key);
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
            $key = ClientTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ClientTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Client $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClientTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ClientTableMap::COL_ID);
            $criteria->addSelectColumn(ClientTableMap::COL_NAME);
            $criteria->addSelectColumn(ClientTableMap::COL_ADDRESS);
            $criteria->addSelectColumn(ClientTableMap::COL_STATUS);
            $criteria->addSelectColumn(ClientTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(ClientTableMap::COL_DATE_UPDATED);
            $criteria->addSelectColumn(ClientTableMap::COL_ANDROID_ID);
            $criteria->addSelectColumn(ClientTableMap::COL_WIFI_NAME);
            $criteria->addSelectColumn(ClientTableMap::COL_SERIAL_NUMBER);
            $criteria->addSelectColumn(ClientTableMap::COL_USER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.address');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.date_added');
            $criteria->addSelectColumn($alias . '.date_updated');
            $criteria->addSelectColumn($alias . '.android_id');
            $criteria->addSelectColumn($alias . '.wifi_name');
            $criteria->addSelectColumn($alias . '.serial_number');
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
        return Propel::getServiceContainer()->getDatabaseMap(ClientTableMap::DATABASE_NAME)->getTable(ClientTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ClientTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ClientTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ClientTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Client or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Client object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ClientTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Client) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ClientTableMap::DATABASE_NAME);
            $criteria->add(ClientTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ClientQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ClientTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ClientTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the client table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ClientQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Client or Criteria object.
     *
     * @param mixed               $criteria Criteria or Client object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Client object
        }

        if ($criteria->containsKey(ClientTableMap::COL_ID) && $criteria->keyContainsValue(ClientTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ClientQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ClientTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ClientTableMap::buildTableMap();
