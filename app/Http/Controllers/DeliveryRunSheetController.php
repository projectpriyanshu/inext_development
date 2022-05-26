<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryRunSheetController extends Controller
{
    public function index(){
        return view('admin.inbound.delivery_run_sheet.index');
    }
}
