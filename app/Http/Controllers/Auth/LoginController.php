<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    // https://laracasts.com/discuss/channels/laravel/login-redirect-not-working-with-laravel-7
    // https://laracasts.com/discuss/channels/laravel/login-redirect-not-working-with-laravel-7
    public function redirectTo()
    {
        // User Type
        $type = Auth::user()->role;
        // Check user Type
        switch ($type) {
            case 'admin':
                return '/admin/dashboard';
                break;
            default:
            // site index page
                return '/user/my-account';
                break;}
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
