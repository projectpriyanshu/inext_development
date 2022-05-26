<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function index(){
        return view('admin.setting.api_user.index');
    }
}
