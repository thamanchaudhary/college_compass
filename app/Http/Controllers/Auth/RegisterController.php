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
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'mobile' => ['required', 'string', 'min:6', 'max:10'],
            ],
            [
                'name.required'  => 'प्रयोगकर्ता पुरा नाम अनिवार्य छ ।',
                'email.required' => 'प्रयोगकर्ता इमेल अनिवार्य छ ।',
                'mobile.required' => 'प्रयोगकर्ता फोन नम्बर अनिवार्य छ ।',
                'password.required'    => 'प्रयोगकर्ता पासवर्ड अनिवार्य छ ।',
                'password.min' => 'पासवर्डको लम्बाइ कम्तिमा ४ अक्षर र हुनुपर्छ ।',
                'password.confirmed' => 'पासवर्ड र पुनः पासवर्ड मेल खान्दैनन् ।',
                'email.email' => 'इमेल ठेगाना अमान्य छ ।',
                'email.unique' => 'यो इमेल पहिले नै रेजिष्टर भएको छ ।',
                'mobile.min' => 'फोन नम्बरको लम्बाइ कम्तिमा ६ अक्षर र हुनुपर्छ ।',
                'mobile.max' => 'फोन नम्बरको लम्बाइ बढीमा १० अक्षर र हुनुपर्छ ।',
                'name.max' => 'प्रयोगकर्ता पुरा नामको लम्बाइ बढीमा २५५ अक्षर र हुनुपर्छ ।',
            ]
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
            'mobile' => $data['mobile'],
            'role' => 'user', // Default Role is 'user
            'password' => Hash::make($data['password']),
        ]);
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
