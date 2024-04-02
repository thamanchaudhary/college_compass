<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends DM_BaseController
{
    protected $panel = 'Entity';
    protected $base_route = 'admin.entity';
    protected $view_path = 'admin.entity';
    protected $model;
    protected $table;

    public function __construct(Entity $model)
    {
        $this->model = $model;
    }
    public function index(Request $request)
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }
    public function store(Request $request)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        $data = $request->all();
        $this->model->fill($data);
        $success =  $this->model->save();
        if ($success) {
            session()->flash('alert-success', 'Entity added successfully.');
        } else {
            session()->flash('alert-danger', 'Entity could not be added.');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        // $request->validate($this->model->getRules(), $this->model->getMessage());
        $this->model = $this->model->findOrFail($id);
        $data = $request->all();
        $this->model->fill($data);
        $success =  $this->model->save();
        if ($success) {
            session()->flash('alert-success', 'Entity updated successfully.');
        } else {
            session()->flash('alert-danger', 'Entity could not be updated.');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
        return response()->json($data);
    }
}
