<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
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
    protected $location;
    protected $university;

    public function __construct(User $model, Location $location, University $university)
    {
        $this->model = $model;
        $this->location = $location;
        $this->university = $university;
        $this->middleware('auth');
    }

    public function index()
    {

        return view(parent::loadView($this->view_path . '.index'));
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
        $data['rows'] = DB::table('wishlists')
            ->join('college_lists', 'college_lists.id', '=', 'wishlists.college_id')
            ->select('college_lists.*', 'wishlists.id as wishlist_id')
            ->where('wishlists.user_id', Auth::user()->id)
            ->get();
        return view(parent::loadView($this->view_path . '.user-wishlist-show'), compact('data'));
    }

    // Recomamded College
    public function RecommendedCollege()
    {
        $this->panel = 'Recomamded College';
        $data['rows'] = DB::table('college_lists')
            ->join('programs', 'programs.id', '=', 'college_lists.program_id')
            ->join('locations', 'locations.id', '=', 'college_lists.location_id')
            ->join('universities', 'universities.id', '=', 'college_lists.university_id')
            ->select('college_lists.*', 'programs.name as program_name', 'locations.name as location_name', 'universities.name as university_name')
            ->where('college_lists.program_id', Auth::user()->program_id)
            ->get();
        return view(parent::loadView($this->view_path . '.user-recomamded-college'), compact('data'));
    }
}
