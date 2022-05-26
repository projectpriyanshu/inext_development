<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HubscanController extends Controller
{
    public function index(){
        return view('admin.outbound.hubscan.index');
    }
}
