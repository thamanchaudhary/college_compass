<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;


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
    // protected $redirectTo = RouteServiceProvider::HOME;

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
        return Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'max:20', 'min:3'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'program_id' => ['required', 'integer'], // Add this line
                'city_id' => ['required', 'integer', 'max:255'], // Add this line
                'address_id' => ['required', 'integer', 'max:255'], // Add this line
                'password' => ['required', 'string', 'min:4', 'confirmed'],
            ],

        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
     
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'program_id' => $data['program_id'], // Add this line
            'address_id' => $data['address_id'], // Add this line
            // Default Role is 'user
            'password' => Hash::make($data['password']),
        ]);
    }
    public function registered(Request $request, $user)
    {
        return redirect()->route('login')->with('status', 'Registration successful! Please log in.');
    }
    public function redirectTo()
    {

        // User Type
        $type = Auth::user()->type;
        // Check user Type
        switch ($type) {
            case 'admin':
                return 'admin/dashboard';
                break;
            default:
                return 'user/dashboard';
                break;
        }
    }
}
