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
        //Multilevel Search
        $program = $request->program;
        if (isset($program['0']) && $program['0'] != '') {
            $data['rows'] = CollegeList::where('program_id', $program['0'])
                ->orderBy('id', 'desc')
                ->get();
        } else if (isset($program['1']) && $program['1'] != '') {
            $data['rows'] = CollegeList::where('program_id', $program['1'])
                ->orderBy('id', 'desc')
                ->get();
        } else if (isset($program['2']) && $program['2'] != '') {
            $data['rows'] = CollegeList::where('program_id', $program['2'])
                ->orderBy('id', 'desc')
                ->get();
        } else if (isset($program['3']) && $program['3'] != '') {
            $data['rows'] = CollegeList::where('program_id', $program['3'])
                ->orderBy('id', 'desc')
                ->get();
        } else if (isset($program['4']) && $program['4'] != '') {
            $data['rows'] = CollegeList::where('program_id', $program['4'])
                ->orderBy('id', 'desc')
                ->get();
        } else {
            // return null;
            return redirect()->back()->with('error', 'Please Select Program');
        }

        $city = $request->city;
        $university_id = $request->university_id;
        $examp_required = $request->examp_required;

        $data['rows'] = CollegeList::where('city', 'LIKE', '%' . $city . '%')
            ->where('university_id', 'LIKE', '%' . $university_id . '%')
            ->orderBy('id', 'desc')
            ->get();


        // Searching Data
        // dd($data['rows']);
        $data['university'] = University::get();
        $data['program'] = Program::get();
        return view(parent::loadView($this->view_path . '.search'), compact('data'));
    }

    //Career Page
    public function Career()
    {
        return view(parent::loadView($this->view_path . '.career'));
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
