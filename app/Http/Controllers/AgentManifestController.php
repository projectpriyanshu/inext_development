<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentManifestController extends Controller
{
    public function index(){
        return view('admin.outbound.agent_manifest.index');
    }
}
