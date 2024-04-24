<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollegeList;
use Illuminate\Http\Request;

class CollegeListController extends DM_BaseController
{
    protected $panel = 'College';
    protected $base_route = 'admin.college';
    protected $view_path = 'admin.college';
    protected $model;
    protected $table;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'collegelist';
    protected $prefix_path_image = '/upload_file/collegelist/';


    public function __construct(CollegeList $model)
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
        $data['program'] = $this->model->getProgram();
        $data['city'] = $this->model->getCity();

        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate($this->model->getRules());
        $model                        = $this->model;
        $model->name                  = $request->name;
        $model->city_id               = $request->city_id;
        $model->address_id            = $request->address_id;
        $model->university_id           = $request->university_id;
        $model->website               = $request->website;
        $model->contact               = $request->contact;
        $model->email                 = $request->email;
        $model->college_fee           = $request->college_fee;
        $model->examp_required        = $request->examp_required;
        $model->course                = $request->course;
        $model->degree                = $request->degree;
        $model->description           = $request->description;
        $model->university_id         = $request->university_id;
        // Multiple Program Store
        $model->program_id            = json_encode($request->program_id);
        $success                      = $model->save();
        if ($success) {
            if ($request->hasFile('image_1')) {
                $model->image_1 = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image_1', '', '');
            }
            if ($request->hasFile('image_2')) {
                $model->image_2 = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image_2', '', '');
            }
            if ($request->hasFile('image_3')) {
                $model->image_3 = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image_3', '', '');
            }
            if ($request->hasFile('image_4')) {
                $model->image_4 = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image_4', '', '');
            }
            $model->save();
            session()->flash('success_message', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('error_message', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($id)
    {
        $data['university'] = $this->model->getUniversity();
        $data['program'] = $this->model->getProgram();
        $data['city'] = $this->model->getCity();
        $data['address'] = $this->model->getCollegeAddress();
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate($this->model->getRules());
        $model                         = $this->model::where('id', '=', $id)->first();
        $model->name                   = $request->name;
        $model->city_id               = $request->city_id;
        $model->address_id            = $request->address_id;
        $model->university_id           = $request->university_id;
        $model->website                = $request->website;
        $model->contact                = $request->contact;
        $model->email                  = $request->email;
        $model->college_fee            = $request->college_fee;
        $model->examp_required         = $request->examp_required;
        $model->course                 = $request->course;
        $model->degree                 = $request->degree;
        $model->description            = $request->description;
        // Multiple Program Store
        $model->program_id            = json_encode($request->program_id);
        $success                       = $model->save();
        if ($success) {
            if ($request->hasFile('image_1')) {
                $file_path = getcwd() . $model->image_1;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $model->image_1 = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image_1', '', '');
            }
            if ($request->hasFile('image_2')) {
                $file_path = getcwd() . $model->image_2;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $model->image_2 = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image_2', '', '');
            }
            if ($request->hasFile('image_3')) {
                $file_path = getcwd() . $model->image_3;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $model->image_3 = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image_3', '', '');
            }
            if ($request->hasFile('image_4')) {
                $file_path = getcwd() . $model->image_4;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $model->image_4 = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image_4', '', '');
            }
            $model->save();
            session()->flash('success_message', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('error_message', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        $image_1 = getcwd() . $data->image_1;
        $image_2 = getcwd() . $data->image_2;
        $image_3 = getcwd() . $data->image_3;
        $image_4 = getcwd() . $data->image_4;
        if (is_file($image_1)) {
            unlink($image_1);
        }
        if (is_file($image_2)) {
            unlink($image_2);
        }
        if (is_file($image_3)) {
            unlink($image_3);
        }
        if (is_file($image_4)) {
            unlink($image_4);
        }
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
