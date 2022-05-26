<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutstandingReportController extends Controller
{
    public function index(){
        return view('admin.account.outstanding_report.index');
    }
}
