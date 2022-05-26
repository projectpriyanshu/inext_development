<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\flight;
use App\Helper\CustomHelper;
use Illuminate\Http\Request;
use App\Exports\ExportData;
use Excel;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        $code = $request->code;
        $search = $request->search;
        if(!empty($code) || !empty($search))
        {
            if(!empty($code))
            {
                $check_data = flight::where(array('code'=>$code))->first();
            }
            else
            {
                $check_data = flight::orWhere(array('code'=>$search))->orWhere('name','like','%'.$search.'%')->first();
            }
            $return = array();
            if(!empty($check_data))
            {
                $return['id'] = $check_data->id;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['flight_no'] = $check_data->flight_no;
                $return['status'] = '200';
                $return['message'] = 'flight no Found!';
            }
            else
            {
                $return['id'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['flight_no'] = '';
                $return['status'] = '400';
                $return['message'] = 'flight does not exist!';
            }
            return json_encode($return);
        }
        
      return view('admin.operation.flight_master.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $flight = cache('flight', function () {
            return flight::paginate(10);
        });
        return view('admin.operation.flight_master.list',[
            'flight' => $flight
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $flight = $request->all();
        if ($request->id) {
            $rules = [
                'code'              => 'required',
                'name'              => 'required',
                'flight_no'              => 'required',
            ];

            $validation = Validator::make($flight, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/flight-index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $data = array(
                "code" => $request->code,
                "name"          => $request->name,
                "flight_no"          => $request->flight_no,
                
            );
            flight::where('id', $request->id)->update($data);
        } else {
             $rules = [
                'code'              => 'required',
                'name'              => 'required',
                'flight_no'              => 'required',
            ];

            $validation = Validator::make($flight, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/flight-index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $flight = new flight;
            $flight->code          =$request->code;
            $flight->name          = $request->name;
            $flight->flight_no          = $request->flight_no;
          
            $flight->save();
        }
        return redirect()->route('flight-master.index')->with('success', 'flight_no added Successfully!');
    }
}
