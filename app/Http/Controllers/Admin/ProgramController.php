<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends DM_BaseController
{
    protected $panel = 'Program';
    protected $base_route = 'admin.program';
    protected $view_path = 'admin.program';
    protected $model;
    protected $table;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'program';
    protected $prefix_path_image = '/upload_file/program/';
    public function __construct(Program $model)
    {
        $this->model = $model;
        $this->folder_path_image  = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    public function index(Request $request)
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        $data['university'] = $this->model->getUniversity();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate($this->model->getRules());
        $model                        = $this->model;
        $model->university_id         = $request->university_id;
        $model->name                  = $request->name;
        $success                      = $model->save();
        if ($success) {
            session()->flash('success_message', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('error_message', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($id)
    {
        $data['university'] = $this->model->getUniversity();
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate($this->model->getRules());
        $model                         = $this->model::where('id', '=', $id)->first();
        $model->university_id          = $request->university_id;
        $model->name                   = $request->name;
        $success                       = $model->save();
        if ($success) {
            session()->flash('success_message', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('error_message', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);

        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        } else {
            $request->session()->flash('success_message', $this->panel . '  Successfully Deleted !');
        }
        $data->destroy($id);
        return redirect()->route($this->base_route . '.index');
    }
    public function show($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.show'), compact('data'));
    }
}
