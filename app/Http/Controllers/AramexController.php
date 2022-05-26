<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AramexController extends Controller
{
    public function index(){
        return view('admin.aramex.index');
    }
}
