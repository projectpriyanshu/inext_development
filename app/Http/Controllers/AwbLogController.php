<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwbLogController extends Controller
{
    public function index(){
        return view('admin.setting.awb_log.index');
    }
}
