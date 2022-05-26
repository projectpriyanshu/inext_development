<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Helper\CustomHelper;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        //dd($search);
        if (!empty($search)) {
            //dd($search);
            $check_data = Role::where('name', 'like', $search . '%')->first();
            //dd($check_data);
            if (!empty($check_data)) {
                $return['id'] = $check_data->id;
                $return['name'] = $check_data->name;
                $return['status'] = '200';
                $return['message'] = 'User Found!';
            } else {
                $return['id'] = '';
                $return['name'] = '';
                $return['status'] = '400';
                $return['message'] = 'User does not exist!';
            }
            return json_encode($return);
        }
        return view('admin.user_type.index');
    }


    public function store(Request $request)
    {
        $usertype = $request->all();

        $rules = [
            'name' => 'required|unique:roles,name,' . $request->id,

        ];

        $validation = Validator::make($usertype, $rules);

        if ($validation->fails()) {
            $messages = $validation->errors();
            return redirect()->back()->withErrors($messages);
            // return Redirect::back()->with('msg', 'The Message');
        }

        $role = new Role;
        $role->name          = $request->name;
        $role->save();

        return redirect()->back()->with('success', 'UserType added successfully!');
    }


    public function list()
    {
        $role = cache('role', function () {
            return role::paginate(10);
        });
        return view('admin.user_type.list', [
            'role' => $role
        ]);
    }


    // public function destory(Request $request)
    // {
    //     $id = $request->id;
    //     Role::where('id', $id)->delete();
    // }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $role = Role::find($id);
        if ($role) {
            $role->delete();
            return redirect('/user_type.index')->with('success', 'UserType deleted successfully!');
            // return redirect()->back()->with('danger', 'UserType deleted successfully!');
        } else {
            return redirect('/user_type.index')->with('error', 'Data Not Found!');
            // return redirect()->back()->with('danger', 'Data not found!');
        }
    }
}
