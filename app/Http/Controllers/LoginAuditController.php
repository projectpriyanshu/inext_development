<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginAuditController extends Controller
{
    public function index(){
        return view('admin.setting.login_audit.index');
    }
}
