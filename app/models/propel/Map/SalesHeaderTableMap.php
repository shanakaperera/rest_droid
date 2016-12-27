<?php

namespace Map;

use \SalesHeader;
use \SalesHeaderQuery;
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
 * This class defines the structure of the 'sales_header' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SalesHeaderTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SalesHeaderTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'mob_db';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'sales_header';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\SalesHeader';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'SalesHeader';

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
    const COL_ID = 'sales_header.id';

    /**
     * the column name for the sale_date field
     */
    const COL_SALE_DATE = 'sales_header.sale_date';

    /**
     * the column name for the total field
     */
    const COL_TOTAL = 'sales_header.total';

    /**
     * the column name for the payment_status field
     */
    const COL_PAYMENT_STATUS = 'sales_header.payment_status';

    /**
     * the column name for the payment_method field
     */
    const COL_PAYMENT_METHOD = 'sales_header.payment_method';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'sales_header.status';

    /**
     * the column name for the client_id field
     */
    const COL_CLIENT_ID = 'sales_header.client_id';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'sales_header.user_id';

    /**
     * the column name for the table_ser_id field
     */
    const COL_TABLE_SER_ID = 'sales_header.table_ser_id';

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
        self::TYPE_PHPNAME       => array('Id', 'SaleDate', 'Total', 'PaymentStatus', 'PaymentMethod', 'Status', 'ClientId', 'UserId', 'TableSerId', ),
        self::TYPE_CAMELNAME     => array('id', 'saleDate', 'total', 'paymentStatus', 'paymentMethod', 'status', 'clientId', 'userId', 'tableSerId', ),
        self::TYPE_COLNAME       => array(SalesHeaderTableMap::COL_ID, SalesHeaderTableMap::COL_SALE_DATE, SalesHeaderTableMap::COL_TOTAL, SalesHeaderTableMap::COL_PAYMENT_STATUS, SalesHeaderTableMap::COL_PAYMENT_METHOD, SalesHeaderTableMap::COL_STATUS, SalesHeaderTableMap::COL_CLIENT_ID, SalesHeaderTableMap::COL_USER_ID, SalesHeaderTableMap::COL_TABLE_SER_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'sale_date', 'total', 'payment_status', 'payment_method', 'status', 'client_id', 'user_id', 'table_ser_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'SaleDate' => 1, 'Total' => 2, 'PaymentStatus' => 3, 'PaymentMethod' => 4, 'Status' => 5, 'ClientId' => 6, 'UserId' => 7, 'TableSerId' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'saleDate' => 1, 'total' => 2, 'paymentStatus' => 3, 'paymentMethod' => 4, 'status' => 5, 'clientId' => 6, 'userId' => 7, 'tableSerId' => 8, ),
        self::TYPE_COLNAME       => array(SalesHeaderTableMap::COL_ID => 0, SalesHeaderTableMap::COL_SALE_DATE => 1, SalesHeaderTableMap::COL_TOTAL => 2, SalesHeaderTableMap::COL_PAYMENT_STATUS => 3, SalesHeaderTableMap::COL_PAYMENT_METHOD => 4, SalesHeaderTableMap::COL_STATUS => 5, SalesHeaderTableMap::COL_CLIENT_ID => 6, SalesHeaderTableMap::COL_USER_ID => 7, SalesHeaderTableMap::COL_TABLE_SER_ID => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'sale_date' => 1, 'total' => 2, 'payment_status' => 3, 'payment_method' => 4, 'status' => 5, 'client_id' => 6, 'user_id' => 7, 'table_ser_id' => 8, ),
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
        $this->setName('sales_header');
        $this->setPhpName('SalesHeader');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\SalesHeader');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('sale_date', 'SaleDate', 'DATE', false, null, null);
        $this->addColumn('total', 'Total', 'DOUBLE', false, null, null);
        $this->addColumn('payment_status', 'PaymentStatus', 'BOOLEAN', true, 1, false);
        $this->addColumn('payment_method', 'PaymentMethod', 'CHAR', false, null, null);
        $this->addColumn('status', 'Status', 'BOOLEAN', true, 1, false);
        $this->addForeignKey('client_id', 'ClientId', 'INTEGER', 'client', 'id', true, null, null);
        $this->addColumn('user_id', 'UserId', 'INTEGER', false, null, null);
        $this->addForeignKey('table_ser_id', 'TableSerId', 'INTEGER', 'table_ser', 'id', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Client', '\\Client', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':client_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('TableSer', '\\TableSer', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':table_ser_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('SalesDetail', '\\SalesDetail', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':sales_header_id',
    1 => ':id',
  ),
), null, null, 'SalesDetails', false);
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
        return $withPrefix ? SalesHeaderTableMap::CLASS_DEFAULT : SalesHeaderTableMap::OM_CLASS;
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
     * @return array           (SalesHeader object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SalesHeaderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SalesHeaderTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SalesHeaderTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SalesHeaderTableMap::OM_CLASS;
            /** @var SalesHeader $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SalesHeaderTableMap::addInstanceToPool($obj, $key);
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
            $key = SalesHeaderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SalesHeaderTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var SalesHeader $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SalesHeaderTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SalesHeaderTableMap::COL_ID);
            $criteria->addSelectColumn(SalesHeaderTableMap::COL_SALE_DATE);
            $criteria->addSelectColumn(SalesHeaderTableMap::COL_TOTAL);
            $criteria->addSelectColumn(SalesHeaderTableMap::COL_PAYMENT_STATUS);
            $criteria->addSelectColumn(SalesHeaderTableMap::COL_PAYMENT_METHOD);
            $criteria->addSelectColumn(SalesHeaderTableMap::COL_STATUS);
            $criteria->addSelectColumn(SalesHeaderTableMap::COL_CLIENT_ID);
            $criteria->addSelectColumn(SalesHeaderTableMap::COL_USER_ID);
            $criteria->addSelectColumn(SalesHeaderTableMap::COL_TABLE_SER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.sale_date');
            $criteria->addSelectColumn($alias . '.total');
            $criteria->addSelectColumn($alias . '.payment_status');
            $criteria->addSelectColumn($alias . '.payment_method');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.client_id');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.table_ser_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(SalesHeaderTableMap::DATABASE_NAME)->getTable(SalesHeaderTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SalesHeaderTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SalesHeaderTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SalesHeaderTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a SalesHeader or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or SalesHeader object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SalesHeaderTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \SalesHeader) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SalesHeaderTableMap::DATABASE_NAME);
            $criteria->add(SalesHeaderTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SalesHeaderQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SalesHeaderTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SalesHeaderTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the sales_header table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SalesHeaderQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a SalesHeader or Criteria object.
     *
     * @param mixed               $criteria Criteria or SalesHeader object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SalesHeaderTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from SalesHeader object
        }

        if ($criteria->containsKey(SalesHeaderTableMap::COL_ID) && $criteria->keyContainsValue(SalesHeaderTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SalesHeaderTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SalesHeaderQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SalesHeaderTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SalesHeaderTableMap::buildTableMap();
