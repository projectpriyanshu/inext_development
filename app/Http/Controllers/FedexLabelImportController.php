<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FedexLabelImportController extends Controller
{
    public function index(){
        return view('admin.inbound.fedex_label_import.index');
    }
}
