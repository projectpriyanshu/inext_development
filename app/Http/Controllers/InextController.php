<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InextController extends Controller
{
    public function index(){
        return view('admin.inext.index');
    }
}
