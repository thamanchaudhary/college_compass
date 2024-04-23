<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\CollegeList;
use App\Models\GeneralProfile;
use App\Models\Location;
use App\Models\Program;
use App\Models\University;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends DM_BaseController
{
    protected $panel = 'Dashboard';
    protected $base_route = '';
    protected $view_path = 'site.';
    protected $folder = 'user';
    protected $action = '';
    protected $model;
    protected $city;
    protected $university;
    protected $collegeList;

    public function __construct(User $model, City $city, University $university, CollegeList $collegeList)
    {
        $this->model = $model;
        $this->city = $city;
        $this->university = $university;
        $this->collegeList = $collegeList;
        $this->middleware('auth');
    }

    public function index()
    {
        return view(parent::loadView($this->view_path . '.user-information'));
    }
    public function DetailInformation()
    {
        $this->panel = 'Dashboard';
        $data['user'] = User::where('id', Auth::user()->id)->first();
        $data['wish_count'] = DB::table('wishlists')->where('user_id', Auth::user()->id)->count();
        $data['recommended_college'] = DB::table('college_lists')->where('city_id', Auth::user()->city_id)->count();
        return view(parent::loadView($this->view_path . '.user-information'), compact('data'));
    }
    // SHow Information
    public function ShowInformation()
    {
        $data['program'] = Program::get();
        $data['city'] = City::get();
        $data['address'] = Address::get();
        $this->panel = 'Show Information';
        $data['user'] = User::where('id', Auth::user()->id)->first();
        return view(parent::loadView($this->view_path . '.user-information-show'), compact('data'));
    }
    // Show Wishlist
    public function ShowWishlist()
    {
        //show wishlist
        $this->panel = 'Show Wishlist';
        // $data['rows'] = DB::table('wishlists')
        //     ->join('college_lists', 'college_lists.id', '=', 'wishlists.college_id')
        //     ->join('locations', 'locations.id', '=', 'college_lists.location_id')
        //     ->select('college_lists.*', 'wishlists.id as wishlist_id', 'locations.name as location_name')
        //     ->where('wishlists.user_id', Auth::user()->id)
        //     ->get();

        $data['rows'] = DB::table('wishlists')
            ->join('college_lists', 'college_lists.id', '=', 'wishlists.college_id')
            ->join('cities', 'cities.id', '=', 'college_lists.city_id')
            ->join('addresses', 'addresses.id', '=', 'college_lists.address_id')
            ->select('college_lists.*', 'wishlists.id as wishlist_id', 'cities.name as city_name', 'addresses.name as address_name')
            ->where('wishlists.user_id', Auth::user()->id)
            ->get();
        // dd($data['rows']);
        return view(parent::loadView($this->view_path . '.user-wishlist-show'), compact('data'));
    }

    // Recomamded College
    public function RecommendedCollege()
    {
        $this->panel = 'Recomamded College';
        $data['city_id'] = Auth::user()->city_id;
        $data['program_id'] = Auth::user()->program_id;
        $data['program_list'] = json_decode($data['program_id'], true);
        //gert simiar program_list  in college_list table
        $data['rows'] = DB::table('college_lists')
            ->join('cities', 'cities.id', '=', 'college_lists.city_id')
            ->join('addresses', 'addresses.id', '=', 'college_lists.address_id')
            ->select('college_lists.*', 'cities.name as city_name', 'addresses.name as address_name')
            ->where('college_lists.city_id', Auth::user()->city_id)
            
            ->get();
        return view(parent::loadView($this->view_path . '.user-recomamded-college'), compact('data'));
    }
    public function passwordChange(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'current_password' =>                            ['required', 'max:255'],
            'password' =>                                    ['required', 'string', 'confirmed', 'min:5']
        ]);
        if (Hash::check($request->current_password, Auth::user()->password)) {
            $row = $this->model::findOrFail(Auth::user()->id);
            $row->password = Hash::make($request->password);
            $row->save();
            session()->flash('alert-success', 'Password changed successfully.');
            Auth::logout();
            return redirect()->route('login');
        } else {
            session()->flash('alert-warning', 'Password did not match.');
            return redirect()->back();
        }
    }

    // USer Profile Update
    public function updateProfile(Request $request)
    {
        // dd($request->all());

        $row = $this->model::findOrFail(Auth::user()->id);
        $row->name = $request->name;
        $row->username = $request->username;
        $row->email = $request->email;
        $row->program_id = $request->program_id;
        $row->city_id = $request->city_id;
        $row->address_id = $request->address_id;
        $row->save();
        session()->flash('alert-success', 'Profile updated successfully.');
        return redirect()->back();
    }
}
