<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InboundHubscanController extends Controller
{
    public function index(){
        return view('admin.inbound.hub_scan.index');
    }
}
