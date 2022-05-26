<?php

namespace App\Http\Controllers;

use App\Imports\bulkfileImport;
use App\Models\Bulkdata;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BulkUploadController extends Controller
{
    public function index()
    {
        return view('admin.outbound.bulk_upload.index');
    }

    public function store(Request $request)
    {
        $bulk = $request->all();
        $file = $request->file('file');

        $rules = [
            'date' => 'required',
            'company' => 'required',
            'branch_name' => 'required',
        ];
        $validation = Validator::make($bulk, $rules);
        if ($validation->fails()) {
            $message = $validation->errors();
            return redirect()->back()->withErrors($message)->with('error', 'All fields are required!')->withInput();
        }

        Excel::import(new bulkfileImport, $file);

        $bulkdata = new Bulkdata();
        $bulkdata->id = $request->id;
        $bulkdata->date = $request->date;
        $bulkdata->company = $request->company;
        $bulkdata->branch_name = 'bulk' . time();
        $bulkdata->branch_code = 'bulk1' . time();
        $bulkdata->save();

        return redirect()->route('bulk-upload.index')->with('success', 'bulk Details added Successfully!');

    }
    
}
