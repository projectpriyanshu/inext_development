<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportManifestController extends Controller
{
    public function index(){
        return view('admin.operation.export_manifest.index');
    }
}
