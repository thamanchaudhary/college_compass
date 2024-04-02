<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anudann;
use App\Models\Farm;
use App\Models\GeneralProfile;
use App\Models\InventoryEquipmentCategory;
use App\Models\InventoryFuelCategory;
use App\Models\InventoryIrrigationCategory;
use App\Models\InventoryLandCategory;
use App\Models\InventoryStoreCategory;
use App\Models\Talim;
use App\Models\Udhyog;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends DM_BaseController
{
    protected $panel = 'Dashboard';
    protected $base_route = '';
    protected $view_path = 'admin.';
    protected $user;


    public function __construct(Request $request, User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $data['count_user'] = $this->user->where('role', 'user')->count();
        $data['count_admin'] = $this->user->where('role', 'admin')->count();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
}
