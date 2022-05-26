<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PickUpRegisterController extends Controller
{
    public function index(){
        return view('admin.outbound.pickup_register.index');
    }
}
