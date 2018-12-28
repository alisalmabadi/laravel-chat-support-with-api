<?php

namespace App\Http\Controllers\CompanyAuth;

use App\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/seller';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:sellers',
            'mobile_number' => 'required|string|max:255|unique:sellers',
            'password' => 'required|string|min:6|confirmed',


        ],[
           'captcha' => 'کد اعتبار سنجی صحیح نیست',]);
    }
	protected function guard()
	{

		return \Auth::guard('seller');

	}
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {


        return Seller::create([
            'company_name' => $data['company_name'],
            'email' => $data['email'],
            'mobile_number' => $data['mobile_number'],
            'tel_number' => $data['tel_number'],
            'address' => $data['address'],
            'postal_code' => $data['postal_code'],
            'logo' => $data['logo'],
            'password' => bcrypt($data['password']),
        ]);

    }
}
