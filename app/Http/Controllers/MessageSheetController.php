<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Sheet;
use Illuminate\Http\Request;
use App\Models\Counterpart;

class MessageSheetController extends Controller
{
    public function index()
    {
        return view('admin.operation.message_sheet.index');
    }

    public function store(Request $request)
    {
        $sheet = $request->all();
        // dd($data);
        $rules = [
            'company'              => 'required',
            'runno'              => 'required',
            'sector'          => 'required',
            'counterpart'          => 'required',
            'al'        => 'required ',
            'flight'          => 'required',
            'date'        => 'required ',
            'obc'          => 'required',
        ];
        $validation = Validator::make($sheet, $rules);

        if ($validation->fails()) {
            $message = $validation->errors();
            return redirect()->back()->withErrors($message)->with('error', 'All fields are required!')->withInput();
        }
        // if ($request->id) {
        //     $data = array(
        //         "company"          => $request->company,
        //         "run_no"           => $request->runno,
        //         "sector"           => $request->sector,
        //         "counter_part"     => $request->counterpart,
        //         "al_mawb"          => $request->al,
        //         "flight"           => $request->flight,
        //         "date"             => $request->date,
        //         "obc"              => $request->obc,
        //     );
        // } 
        else {
            $sheet = new Sheet;

            $sheet->company  = $request->company;
            $sheet->run_no  = $request->runno;
            $sheet->sector  = $request->sector;
            $sheet->counter_part  = $request->counterpart;
            $sheet->al_mawb  = $request->al;
            $sheet->flight  = $request->flight;
            $sheet->date  = $request->date;
            $sheet->obc  = $request->obc;
            $sheet->save();

            return redirect()->back()->with('success', 'Data added successfully!');
        }
    }

    public function list()
    {
        $sheet = cache('sheet', function () {
            return sheet::paginate(10);
        });
        return view('admin.operation.message_sheet.list', [
            'sheet' => $sheet
        ]);
    }


    public function destroy($id)
    {
        $sheet = Sheet::find($id);
        $sheet->delete();
        return redirect()->back()->with('status', 'Data Deleted Successfully');
    }
    public function searchcounterpart(Request $request)
    {
        $key = $request->key;
        $check_data = Counterpart::where('name', 'like','%'. $key . '%')->select('code', 'name')->get();
        $response = array();
        foreach ($check_data as $data) {
            $response[] = array("name" => $data->name,'fname'=>$data->code, "label" => $data->name.'-'.$data->code);
        }
        return response()->json($response);
    }
}
