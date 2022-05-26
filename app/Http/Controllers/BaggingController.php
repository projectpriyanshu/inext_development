<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaggingController extends Controller
{
    public function index(){
        return view('admin.operation.bagging.index');
    }
}
