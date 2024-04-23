<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected  $user = null;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function registerUser(Request $request)
    {
        $rules = array(
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            // 'mobile' => 'required|numeric',
            //            'program_id' => 'required|numeric',
            //'city_id'   => 'required|numeric',
            //   'address_id' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
        );
        $request->validate($rules);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['program_id'] = json_encode($request->program_id);
        $data['city_id'] = $request->city_id;
        $data['address_id'] = json_encode($request->address_id);
        $data['email_token'] = \Str::random(100);
        $data['password'] = Hash::make($request->password);
        $this->user->fill($data);
        $status = $this->user->save();
        if ($status) {
            $request->session()->flash('success', 'Thank you for the registration. Your account has been created. Please Login for further processing.');
            // email
            // route('activate', [$this->>user->id, $this->user->email_token])
            return redirect()->route('login');
        } else {
            $request->session()->flash('error', 'Sorry! Your account could not be created at this time. Please contact our administration.');
            return redirect()->route('login');
        }
    }
}
