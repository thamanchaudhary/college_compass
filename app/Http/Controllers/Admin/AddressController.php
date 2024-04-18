<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends DM_BaseController
{
    protected $panel = 'Address';
    protected $base_route = 'admin.address';
    protected $view_path = 'admin.address';
    protected $model;
    protected $table;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'address';
    protected $prefix_path_image = '/upload_file/address/';
    public function __construct(Address $model)
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
        $data['city'] = $this->model->getCity();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }
    public function store(Request $request)
    {
        $model                        = $this->model;
        $model->city_id               = $request->city_id;
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
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        $data['city'] = $this->model->getCity();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        $model                         = $this->model::where('id', '=', $id)->first();
        $model->city_id               = $request->city_id;
        $model->name                  = $request->name;
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
