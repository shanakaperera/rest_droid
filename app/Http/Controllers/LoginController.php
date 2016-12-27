<?php
/**
 * Created by PhpStorm.
 * User: Shanaka P
 * Date: 2016-12-25
 * Time: 11:59 AM
 */

namespace App\Http\Controllers;

use Base\UserQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function getAuthentication(Request $request)
    {
        $validator = Validator::make(Input::all(), [
            'uname' => 'required',
            'upass' => 'required'
        ], [
            'uname.required' => 'User Name field is required',
            'upass.required' => 'Password field is required',
        ]);
        if ($validator->passes()) {
            $loggedUser = $this->isValidUser(Input::get('uname'), Input::get('upass'));
            if ($loggedUser != null) {
                $request->session()->put('login_usr', $loggedUser);
                return response()->json(['message' => 'Successfully logged in.'], 200);
            } else {
                return response()->json(['message' => 'Something wrong with your credentials.'], 500);
            }
        } else {
            return response()->json(['message' => 'You have some invalid inputs.'], 500);
        }

    }

    public function logOut(Request $request)
    {
        $request->session()->flush();
        return Redirect::route('login');
    }

    private function isValidUser($uname, $upass)
    {
        $logged_user = UserQuery::create()
            ->filterByEmail($uname)
            ->findOne();

        if (is_null($logged_user)) {
            return Redirect::back();
        } else {
            if (Hash::check($upass, $logged_user->getPassword())) {
                return $logged_user;
            }
        }
        return null;
    }

    public function getLoginForm()
    {
        return view('home');
    }

    public function getWelcomePage()
    {
        return view('welcome');
    }
}