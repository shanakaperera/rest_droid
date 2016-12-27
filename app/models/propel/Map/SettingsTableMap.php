<?php

namespace Map;

use \Settings;
use \SettingsQuery;
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
 * This class defines the structure of the 'settings' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class SettingsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.SettingsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'mob_db';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'settings';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Settings';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Settings';

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
    const COL_ID = 'settings.id';

    /**
     * the column name for the terms_conditions field
     */
    const COL_TERMS_CONDITIONS = 'settings.terms_conditions';

    /**
     * the column name for the note field
     */
    const COL_NOTE = 'settings.note';

    /**
     * the column name for the about_us field
     */
    const COL_ABOUT_US = 'settings.about_us';

    /**
     * the column name for the email field
     */
    const COL_EMAIL = 'settings.email';

    /**
     * the column name for the tele field
     */
    const COL_TELE = 'settings.tele';

    /**
     * the column name for the brc_no field
     */
    const COL_BRC_NO = 'settings.brc_no';

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
        self::TYPE_PHPNAME       => array('Id', 'TermsConditions', 'Note', 'AboutUs', 'Email', 'Tele', 'BrcNo', ),
        self::TYPE_CAMELNAME     => array('id', 'termsConditions', 'note', 'aboutUs', 'email', 'tele', 'brcNo', ),
        self::TYPE_COLNAME       => array(SettingsTableMap::COL_ID, SettingsTableMap::COL_TERMS_CONDITIONS, SettingsTableMap::COL_NOTE, SettingsTableMap::COL_ABOUT_US, SettingsTableMap::COL_EMAIL, SettingsTableMap::COL_TELE, SettingsTableMap::COL_BRC_NO, ),
        self::TYPE_FIELDNAME     => array('id', 'terms_conditions', 'note', 'about_us', 'email', 'tele', 'brc_no', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'TermsConditions' => 1, 'Note' => 2, 'AboutUs' => 3, 'Email' => 4, 'Tele' => 5, 'BrcNo' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'termsConditions' => 1, 'note' => 2, 'aboutUs' => 3, 'email' => 4, 'tele' => 5, 'brcNo' => 6, ),
        self::TYPE_COLNAME       => array(SettingsTableMap::COL_ID => 0, SettingsTableMap::COL_TERMS_CONDITIONS => 1, SettingsTableMap::COL_NOTE => 2, SettingsTableMap::COL_ABOUT_US => 3, SettingsTableMap::COL_EMAIL => 4, SettingsTableMap::COL_TELE => 5, SettingsTableMap::COL_BRC_NO => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'terms_conditions' => 1, 'note' => 2, 'about_us' => 3, 'email' => 4, 'tele' => 5, 'brc_no' => 6, ),
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
        $this->setName('settings');
        $this->setPhpName('Settings');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Settings');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('terms_conditions', 'TermsConditions', 'LONGVARCHAR', false, null, null);
        $this->addColumn('note', 'Note', 'LONGVARCHAR', false, null, null);
        $this->addColumn('about_us', 'AboutUs', 'LONGVARCHAR', false, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 45, null);
        $this->addColumn('tele', 'Tele', 'VARCHAR', false, 20, null);
        $this->addColumn('brc_no', 'BrcNo', 'VARCHAR', false, 20, null);
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
        return $withPrefix ? SettingsTableMap::CLASS_DEFAULT : SettingsTableMap::OM_CLASS;
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
     * @return array           (Settings object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = SettingsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SettingsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SettingsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SettingsTableMap::OM_CLASS;
            /** @var Settings $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SettingsTableMap::addInstanceToPool($obj, $key);
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
            $key = SettingsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SettingsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Settings $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SettingsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SettingsTableMap::COL_ID);
            $criteria->addSelectColumn(SettingsTableMap::COL_TERMS_CONDITIONS);
            $criteria->addSelectColumn(SettingsTableMap::COL_NOTE);
            $criteria->addSelectColumn(SettingsTableMap::COL_ABOUT_US);
            $criteria->addSelectColumn(SettingsTableMap::COL_EMAIL);
            $criteria->addSelectColumn(SettingsTableMap::COL_TELE);
            $criteria->addSelectColumn(SettingsTableMap::COL_BRC_NO);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.terms_conditions');
            $criteria->addSelectColumn($alias . '.note');
            $criteria->addSelectColumn($alias . '.about_us');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.tele');
            $criteria->addSelectColumn($alias . '.brc_no');
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
        return Propel::getServiceContainer()->getDatabaseMap(SettingsTableMap::DATABASE_NAME)->getTable(SettingsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(SettingsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(SettingsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new SettingsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Settings or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Settings object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SettingsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Settings) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SettingsTableMap::DATABASE_NAME);
            $criteria->add(SettingsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SettingsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SettingsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SettingsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the settings table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return SettingsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Settings or Criteria object.
     *
     * @param mixed               $criteria Criteria or Settings object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SettingsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Settings object
        }

        if ($criteria->containsKey(SettingsTableMap::COL_ID) && $criteria->keyContainsValue(SettingsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SettingsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SettingsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // SettingsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
SettingsTableMap::buildTableMap();
