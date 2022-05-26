<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodCollectionController extends Controller
{
    public function index(){
        return view('admin.inbound.cod_collection.index');
    }
}
