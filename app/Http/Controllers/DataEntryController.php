<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataEntryController extends Controller
{
    public function index(){
        return view('admin.inbound.data_entry.index');
    }
}
