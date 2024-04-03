<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anudann;
use App\Models\CollegeList;
use App\Models\Farm;
use App\Models\GeneralProfile;
use App\Models\InventoryEquipmentCategory;
use App\Models\InventoryFuelCategory;
use App\Models\InventoryIrrigationCategory;
use App\Models\InventoryLandCategory;
use App\Models\InventoryStoreCategory;
use App\Models\Talim;
use App\Models\Udhyog;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends DM_BaseController
{
    protected $panel = 'Dashboard';
    protected $base_route = '';
    protected $view_path = 'admin.';
    protected $user;
    protected $collegeList;
    protected $university;


    public function __construct(Request $request, User $user, CollegeList $collegeList, University $university)
    {
        $this->user = $user;
        $this->collegeList = $collegeList;
        $this->university = $university;
    }
    public function index()
    {
        $data['count_user'] = $this->user->where('role', 'user')->count();
        $data['count_admin'] = $this->user->where('role', 'admin')->count();
        $data['count_college'] = $this->collegeList->count();
        $data['count_university'] = $this->university->count();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
}
