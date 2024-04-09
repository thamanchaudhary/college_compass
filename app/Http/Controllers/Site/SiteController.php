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
use App\Models\Program;
use App\Models\Setting;
use App\Models\University;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Mail;

class SiteController extends DM_BaseController
{
    protected $panel;
    protected $base_route = 'site';
    protected $view_path = 'site';
    protected $model;
    protected $table;
    protected $contact_email;
    protected $dm_post;

    public function __construct(Request $request, DM_Post $dm_post, Setting $setting)
    {
        $this->dm_post = $dm_post;
        $this->contact_email = $setting::pluck('site_email')->first();
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
        $data['university'] = University::get();
        $data['program'] = Program::get();
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

    // Content Search

    public function search(Request $request)
    {
        $program = $request->program_id;
        $city = $request->city;
        $university_id = $request->university_id;
        $examp_required = $request->examp_required;

        $data['rows'] = CollegeList::where('program_id', 'LIKE', '%' .$program. '%')
            ->where('city', 'LIKE', '%' .$city. '%')
            ->orwhere('university_id', 'LIKE', '%' .$university_id.'%')
            ->orwhere('examp_required', 'LIKE', '%' .$examp_required. '%')
            ->orderBy('id', 'desc')
            ->get();
        // Searching Data
        // dd($data['rows']);
        $data['university'] = University::get();
        $data['program'] = Program::get();
        return view(parent::loadView($this->view_path . '.search'), compact('data'));
    }


    //Contact Us 
    public function contact()
    {
        return view(parent::loadView($this->view_path . '.contact'));
    }

    //Message send in Email
    public function Message(Request $request)
    {
        // dd($request->all());
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        \Mail::to('thaman@softechfoundation.com')->send(new \App\Mail\Contact($data));
        dd("Email is Sent.");

        return redirect()->back()->with('success', 'Message Send Successfully');
    }
}
