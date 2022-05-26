<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DummyReportController extends Controller
{
    public function index(){
        return view('admin.operation.dummy_report.index');
    }
}
