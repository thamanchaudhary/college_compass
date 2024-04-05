<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Models\Eloquent\DM_Post;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Clients;
use App\Models\CollegeList;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class SiteController extends DM_BaseController
{
    protected $panel;
    protected $base_route = 'site';
    protected $view_path = 'site';
    protected $model;
    protected $table;
    protected $contact_email;

    public function __construct(Request $request, DM_Post $dm_post, Setting $setting)
    {
        $this->dm_post = $dm_post;
    }

    //Home Page 
    public function index()
    {
        return view(parent::loadView($this->view_path . '.index'));
    }

    // All College
    public function allCollege()
    {
        $data['rows'] = CollegeList::orderBy('id', 'desc')->get();
        return view(parent::loadView($this->view_path . '.all-college'), compact('data'));
    }

    // College Details
    public function collegeDetails($id)
    {
        $data['single'] = CollegeList::findorFail($id);
        return view(parent::loadView($this->view_path . '.college-details'), compact('data'));
    }

    //Category Detail
    public function ProgramCategory($id)
    {
        $data['single'] = CollegeList::where('program_id', $id)->get();
        return view(parent::loadView($this->view_path . '.category'), compact('data'));
    }

   
    //Contact Us 
    public function contact()
    {
        return view(parent::loadView($this->view_path . '.contact'));
    }

   
}
