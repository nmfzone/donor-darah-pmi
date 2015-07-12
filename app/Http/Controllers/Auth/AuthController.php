<?php

namespace DonorDarahPMI\Http\Controllers\Auth;

use DonorDarahPMI\User;
use DonorDarahPMI\Role;
use Illuminate\Http\Request;
use DonorDarahPMI\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  LoginRequest  $request
	 * @return Response
	 */
	public function postLogin(Request $request)
	{
		if (auth()->attempt($request->only('email', 'password')))
		{
            $user = auth()->user();

            if ($user->hasRole(Role::ADMINPUSAT))
            {
                return redirect('dashboard/admin/pusat');
            }
            else if ($user->hasRole(Role::ADMINDAERAH))
            {
            	return redirect('dashboard/admin/daerah');
            }
            else if ($user->hasRole(Role::ANGGOTA))
            {
                return redirect('dashboard/users');
            }
		}

		return redirect('/auth/login')->withErrors([
			'email' => 'The credentials you entered did not match our records. Try again?',
		]);
	}

}
