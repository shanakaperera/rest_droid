<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class LoginMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $logged_user = $request->session()->get('login_usr');

        if ($logged_user == null) {
            return Redirect::route('login');
        }
		return $next($request);
	}

}
