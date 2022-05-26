<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchManifestController extends Controller
{
    public function index(){
        return view('admin.inbound.branch_manifest.index');
    }
}
