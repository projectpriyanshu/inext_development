<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registration(){
        return view('admin.setting.users.user_registration');
    }
    public function list(){
        return view('admin.setting.users.list');
    }
}
