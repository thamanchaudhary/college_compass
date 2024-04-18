<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;


class UserController extends DM_BaseController
{
    protected $panel = 'Users';
    protected $base_route = 'admin.users';
    protected $view_path = 'admin.users';
    protected $model;
    protected $table;
    protected $folder = 'document';

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function userOnlineStatus()
    {
        $users = User::all();

        foreach ($users as $user) {

            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " ";
            else {
                if ($user->last_seen != null) {
                    echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " ";
                } else {
                    echo $user->name . " is offline. Last seen: No data ";
                }
            }
        }
    }

    public function index()
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
        if ($this->model->storeData($request, $request->name, $request->username, $request->email, $request->mobile, $request->password, $request->avatar, )) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->password = Hash::make($request->password);
        $data->save();
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


    public function deletedPost()
    {
        $data['rows'] = User::onlyTrashed()->paginate(10);
        return view(parent::loadView($this->view_path . '.deleted'), compact('data'));
    }

    public function restore($id)
    {
        $data = User::where('id', '=', $id)->get();
        foreach ($data as $row) {
            $row->deleted_at = null;
            $row->save();
        }
    }

    public function permanentDelete($id)
    {
        $row = User::findOrFail($id);
        $file_path = getcwd() . $row->image;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        foreach ($row as $row) {
            User::where('id', '=', $id)->delete();
        }
    }

    //toggle Status
    public function status(Request $request)
    {
        $row                                    = $this->model;
        $user                                   = $row->findOrFail($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'SuccessFully Updated !']);
    }
}
