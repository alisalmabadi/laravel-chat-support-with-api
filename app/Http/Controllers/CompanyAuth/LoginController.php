<?php

namespace App\Http\Controllers\CompanyAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

	protected $redirectTo = '/company/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('guest')->except('logout');
    }
	protected function guard()
	{
		return \Auth::guard('company');
	}

	public function showLoginForm()
	{
		return view('company.auth.login');
	}

/*
	public function showRegistrationForm()
	{
		return view('admin.seller.auth.register');
	}*/

	public function logout(Request $request)
	{
		$this->guard()->logout();

		$request->session()->invalidate();

		return redirect('/company/login');
	}
	protected function redirectTo()
	{
		return '/company/';
	}

}
