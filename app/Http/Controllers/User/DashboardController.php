<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Http\Controllers\Controller;
use App\Http\Middleware\User;
use App\Models\GeneralProfile;
use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends DM_BaseController
{
    protected $panel = 'Dashboard';
    protected $base_route = '';
    protected $view_path = 'user.';
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
      
        return view(parent::loadView($this->view_path.'.index'));    }
}
