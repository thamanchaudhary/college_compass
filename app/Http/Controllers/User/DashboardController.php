<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\GeneralProfile;
use App\Models\Location;
use App\Models\University;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;

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

    public function __construct(User $model, City $city, University $university)
    {
        $this->model = $model;
        $this->city = $city;
        $this->university = $university;
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
        return view(parent::loadView($this->view_path . '.user-information'), compact('data'));
    }
    // SHow Information
    public function ShowInformation()
    {
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
        $data['rows'] = DB::table('college_lists')
            ->join('programs', 'programs.id', '=', 'college_lists.program_id')
            ->join('cities', 'cities.id', '=', 'college_lists.city_id')
            ->join('universities', 'universities.id', '=', 'college_lists.university_id')
            ->select('college_lists.*', 'programs.name as program_name', 'cities.name as city_name', 'universities.name as university_name')
            ->where('college_lists.program_id', Auth::user()->program_id)
            ->get();
        // dd($data['rows']);
        return view(parent::loadView($this->view_path . '.user-recomamded-college'), compact('data'));
    }
}
