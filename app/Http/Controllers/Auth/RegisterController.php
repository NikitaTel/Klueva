<?php

namespace App\Http\Controllers\Auth;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Sender;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CartController;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'company_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'city' => ['required', 'string'],
            'occupation' => ['required', 'string'],
            'country' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            $city = new City();
            $city->name=$data['city'];
            $city->save();

            $country = new Country();
            $country->country = $data['country'];
            $country->save();

        return User::create([
            'company_name' => $data['company_name'],
            'email' => $data['email'],
            'country' => $data['country'],
            'city' => $data['city'],
            'phone_number' => $data['phone_number'],
            'contact_name' => $data['contact_name'],
            'occupation' => $data['occupation'],
            'password' => Hash::make($data['password']),
        ]);

    }

}
