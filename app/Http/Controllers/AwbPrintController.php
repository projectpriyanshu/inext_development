<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwbPrintController extends Controller
{
    public function index(){
        return view('admin.operation.awb_print.index');
    }
}
