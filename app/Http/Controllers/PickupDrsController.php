<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\City;
use App\Models\PickUp;
use Illuminate\Http\Request;
use DB;
use SebastianBergmann\Environment\Console;

class PickupDrsController extends Controller
{
    public function index(Request $request)
    {


        if (isset($request->code)) {

            // return $request->all();

            $check_data = DB::table('pick_ups')
                ->select('pick_ups.*',  'cities.code as citycode', 'cities.name as cityname')
                ->join('cities', 'pick_ups.city_id', '=', 'cities.id')
                ->where('pick_ups.drs_no', $request->code)
                ->first();
            if ($check_data) {
                return response()->json(array('status' => true, "data" => $check_data));
            } else {
                return response()->json(array('status' => false, "message" => 'No data found!'));
            }
        }


        return view('admin.outbound.pickup_drs.index');


        // return view('admin.outbound.pickup_drs.index');
    }


    public function store(Request $request)
    {
        $pickup = $request->all();
        $cid = City::where(['code' => $request->city_code, 'name' => $request->city])->first();

        $rule = [
            'company'              => 'required',
            'drs_no'              => 'required',
            'city_code'          => 'required',
            'city'          => 'required',
            'date'        => 'required ',
            'time'          => 'required',
            'from_date'        => 'required ',
            'to_date'          => 'required',
            'pickup_boy'          => 'required',
        ];

        $validation = Validator::make($pickup, $rule);

        if ($validation->fails()) {
            $message = $validation->errors();
            return redirect()->back()->withErrors($message)->with('error', 'All fields are required!')->withInput();
        } else {
            $pickup = new PickUp;

            $pickup->company =   $request->company;
            $pickup->drs_no =   $request->drs_no;
            $pickup->date =   $request->date;
            $pickup->time =   $request->time;
            $pickup->city_id =   $cid->id;
            $pickup->from_date =   $request->from_date;
            $pickup->to_date =   $request->to_date;
            $pickup->pickup_boy =   $request->pickup_boy;
            $pickup->save();

            return redirect()->back()->with('success', 'Data added successfully!');
        }
    }

    public function print(Request $request)
    {

        if (isset($request->code)) {

            $check_data = DB::table('pick_ups')
                ->select('pick_ups.*',  'cities.code as citycode', 'cities.name as cityname')
                ->join('cities', 'pick_ups.city_id', '=', 'cities.id')
                ->where('pick_ups.drs_no', $request->code)
                ->first();
            if ($check_data) {
                return response()->json(array('status' => true, "data" => $check_data));
            } else {
                return response()->json(array('status' => false, "message" => 'No data found!'));
            }
        }

        return view('admin.outbound.pickup_drs.index');


        // return view('admin.outbound.pickup_drs.index');
    }
}
