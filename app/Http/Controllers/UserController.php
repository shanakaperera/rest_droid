<?php
/**
 * Created by PhpStorm.
 * User: Shanaka P
 * Date: 2016-12-27
 * Time: 4:16 AM
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Map\UserTableMap;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Propel;

class UserController extends Controller
{


    public function postRegisterUser()
    {
        $con = Propel::getWriteConnection(UserTableMap::DATABASE_NAME);
        $con->beginTransaction();
        try {
            $user = new \User();
            $user->setName('shanaka')
                ->setEmail('shanakaperera08@gmail.com')
                ->setPassword(Hash::make('shanaka1234'))
                ->setUserName('shanaka')
                ->setType('admin')
                ->save($con);
            $success = $con->commit();
            if ($success) {
                Propel::closeConnections();
            }
        } catch (PropelException $e) {
            $con->rollBack();
            Propel::closeConnections();
        }

    }
}