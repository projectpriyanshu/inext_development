<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcomController extends Controller
{
    public function index(){
        return view('admin.ecom.index');
    }
}
