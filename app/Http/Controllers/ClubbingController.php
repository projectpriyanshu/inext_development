<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubbingController extends Controller
{
    public function index(){
        return view('admin.operation.clubbing.index');
    }
}
