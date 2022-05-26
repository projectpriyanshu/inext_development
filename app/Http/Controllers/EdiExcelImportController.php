<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EdiExcelImportController extends Controller
{
    public function index(){
        return view('admin.inbound.edi_excel_import.index');
    }
}
