<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightUpdateController extends Controller
{
    public function index(){
        return view('admin.inbound.flight_update.index');
    }
}
