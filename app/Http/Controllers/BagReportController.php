<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BagReportController extends Controller
{
    public function index(){
        return view('admin.operation.bag_report.index');
    }
}
