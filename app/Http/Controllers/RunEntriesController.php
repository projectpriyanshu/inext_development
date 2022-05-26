<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\RunEntries;
use App\Models\flight;
use App\Helper\CustomHelper;


use Illuminate\Http\Request;
use App\Exports\ExportData;
use Excel;

class RunEntriesController extends Controller
{
    public function index(Request $request)       
    {
        $code = $request->code;
        $search = $request->search;
        if(!empty($code) || !empty($search))
        {
            if(!empty($code))
            {
                $check_data = RunEntries::where(array('code'=>$code))->first();
            }
            else
            {
                $check_data = RunEntries::orWhere(array('code'=>$search))->orWhere('name','like','%'.$search.'%')->first();
            }
            $return = array();
            if(!empty($check_data))
            {
                $return['id'] = $check_data->id;
                $return['run_no'] = $check_data->run_no;
                $return['sector'] = $check_data->sector;
                $return['counter'] = $check_data->counter;
                $return['flight_date'] = $check_data->flight_date;
                $return['flight'] = $check_data->flight;
                $return['flight_no'] = $check_data->flight_no;
                $return['obc'] = $check_data->obc;
                $return['AL_MawbNo'] = $check_data->AL-MawbNo;
                $return['status'] = '200';
                $return['message'] = 'flight no Found!';
            }
            else
            {
                $return['id'] = '';
                $return['run_no'] = '';
                $return['sector'] = '';
                $return['counter'] = '';
                $return['flight_date'] = '';
                $return['flight'] = '';
                $return['flight_no'] = '';
                $return['obc'] = '';
                $return['AL_MawbNo'] = '';
                $return['status'] = '400';
                $return['message'] = 'run entries does not exist!';
            }
            return json_encode($return);
        }
        return view('admin.operation.run_entries.index');

    }
    public function list()
    {
        $run = cache('run', function () {
            return RunEntries::paginate(10);
        });
        return view('admin.operation.run_entries.list',[
            'run' => $run
        ]);
    }
    public function store(Request $request)
    {

        $run = $request->all();
        if ($request->id) {
            $rules = [
                'run_no'              => 'required',
                'sector'              => 'required',
                'counter'              => 'required',
                'flight_date'              => 'required',
                'flight'              => 'required',
                'flight_no'              => 'required',
                'obc'              => 'required',
                'AL_MawbNo'              => 'required',
            ];

            $validation = Validator::make($run, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/run-entries.index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $data = array(
                "run_no" => $request->run_no,
                "sector"          => $request->sector,
                "counter"          => $request->counter,
                "flight_date"          => $request->flight_date,
                "flight"          => $request->flight,
                "flight_no"          => $request->flight_no,
                "obc"          => $request->obc,
                "AL_MawbNo"          => $request->AL_MawbNo,
                
            );
            RunEntries::where('id', $request->id)->update($data);
        } else {
             $rules = [
                'run_no'              => 'required',
                'sector'              => 'required',
                'counter'              => 'required',
                'flight_date'              => 'required',
                'flight'              => 'required',
                'flight_no'              => 'required',
                'obc'              => 'required',
                'AL_MawbNo'              => 'required',
            ];

            $validation = Validator::make($run, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/run-entries.index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $run = new RunEntries;
            $run->run_no          =$request->run_no;
            $run->sector          = $request->sector;
            $run->counter          = $request->counter;
            $run->flight_date          = $request->flight_date;
            $run->flight          = $request->flight;
            $run->flight_no          = $request->flight_no;
            $run->obc          = $request->obc;
            $run->AL_MawbNo          = $request->AL_MawbNo;
          
            $run->save();
        }
        return redirect()->route('run-entries.index')->with('success', 'run_entry added Successfully!');
    }
    public function searchflight(Request $request)
    {
        $key = $request->key;
        $check_data = flight::where('flight_no', 'like', $key . '%')->select('name', 'flight_no')->get();
        $response = array();
        foreach ($check_data as $data) {
            $response[] = array("flight_no" => $data->flight_no,'fname'=>$data->name, "label" => $data->flight_no.'-'.$data->name);
        }
        return response()->json($response);
    }
}
