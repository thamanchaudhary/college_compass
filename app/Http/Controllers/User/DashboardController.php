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
        $data['user'] = User::where('id', Auth::user()->id)->first();
        return view(parent::loadView($this->view_path . '.user-information'), compact('data'));
    }
}
