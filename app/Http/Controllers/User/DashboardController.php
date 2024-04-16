<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Models\GeneralProfile;
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

    public function __construct( User $model)
    {
        $this->model = $model;
        $this->middleware('auth');
    }
   
    public function index()
    {
      
        return view(parent::loadView($this->view_path.'.index'));    
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
}
