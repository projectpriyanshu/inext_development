<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\City;
use App\Models\Franchise;
use App\Models\Country;
use App\Models\State;
use DB;
use Illuminate\Http\Request;

class FranchiseController extends Controller
{

    public function index(Request $request)
    {
        // $code = 66;
        // $code = $request->code;
        // dd($code);

        if (isset($request->code)) {
            // dd($request->code);
            $check_data = DB::table('franchises')
                ->select('franchises.*', 'states.code as statecode', 'states.name as statename', 'cities.code as citycode', 'cities.name as cityname', 'countries.code as countrycode', 'countries.name as countriename')
                ->join('states', 'franchises.state_id', '=', 'states.id')
                ->join('cities', 'franchises.city_id', '=', 'cities.id')
                ->join('countries', 'franchises.country_id', '=', 'countries.id')
                ->where('franchises.code', $request->code)
                ->first();
                
            if ($check_data) {
                return response()->json(array('status' => true, "data" => $check_data));
            } else {
                return response()->json(array('status' => false, "message" => 'No data found!'));
            }
            dd($check_data);
        }
        return view('admin.setting.franchise.index');
    }


    public function store(Request $request)
    {
        // return $request->all();
        $frenchise = $request->all();
        $countryid = Country::where(['code' => $request->country_code, 'name' => $request->country])->first();
        $cid = City::where(['code' => $request->city_code, 'name' => $request->city])->first();
        $sid = State::where(['code' => $request->state_code, 'name' => $request->state])->first();
        //dd($frenchise);

        $rules = [
            // 'name'              => 'required',
            // 'address'              => 'required',
            'city_code'          => 'required',
            'city'          => 'required',
            'state_code'        => 'required ',
            'state'          => 'required',
            'country_code'        => 'required ',
            'country'          => 'required',
            'pincode'          => 'required',
            'telephone'        => 'required',
            'email'        => 'required',
            // 'website'        => 'required',
            // 'bankname'        => 'required',
            'ac_no'        => 'required',
            // 'ifsc'        => 'required',
            // 'bank_address'        => 'required',
            // 'gst'        => 'required',
            // 'pan_no'        => 'required',
            'cin_no'        => 'required',
        ];

        $validation = Validator::make($frenchise, $rules);

        if ($validation->fails()) {
            $message = $validation->errors();
            return redirect()->back()->withErrors($message)->with('error', 'All fields are required!')->withInput();
        }

        if ($request->id) {
            $data = array(
                "code"             => $request->code,
                "name"             => $request->name,
                "address"          => $request->address,
                "city_id"          => $cid->id,
                "state_id"         => $sid->id,
                "country_id"       => $countryid->id,
                "pincode"          => $request->pincode,
                "telephone"        => $request->telephone,
                "email"            => $request->email,
                "website"          => $request->website,
                "bank_name"        => $request->bankname,
                "ac_no"            => $request->ac_no,
                "ifsc"             => $request->ifsc,
                "bank_address"     => $request->bank_address,
                "gst_no"           => $request->gst,
                "pan_no"           => $request->pan_no,
                "cin_no"           => $request->cin_no,
            );
            Franchise::where('id', $request->id)->update($data);
            return redirect()->back()->with('success', 'Franchise updated successfully!');
        } else {
            $franchise = new Franchise;

            $franchise->code             = $request->code;
            $franchise->name             = $request->name;
            $franchise->address          = $request->address;
            $franchise->city_id          = $cid->id;
            $franchise->state_id         = $sid->id;
            $franchise->country_id       = $countryid->id;
            $franchise->pincode          = $request->pincode;
            $franchise->telephone        = $request->telephone;
            $franchise->email            = $request->email;
            $franchise->website          = $request->website;
            $franchise->bank_name        = $request->bankname;
            $franchise->ac_no            = $request->ac_no;
            $franchise->ifsc             = $request->ifsc;
            $franchise->bank_address     = $request->bank_address;
            $franchise->gst_no           = $request->gst;
            $franchise->pan_no           = $request->pan_no;
            $franchise->cin_no           = $request->cin_no;
            $franchise->save();
            // dd($franchise);

            return redirect()->back()->with('success', 'Data added successfully!');
        }
        // return redirect()->with('/franchise.index')->with('success', 'Franchise added Successfully!');

    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $franchise = Franchise::find($id);
        if ($franchise) {
            $franchise->delete();
            // return redirect('/franchise-index')->with('success', 'Franchise  deleted successfully!');
            return redirect('/franchise-index')->with('success', 'Franchise  deleted successfully!');
        } else {
            return redirect('/franchise-index')->with('error', 'Data Not Found!');
        }
    }

    public function list()
    {
        $franchise = cache('franchise', function () {
            return franchise::paginate(10);
        });
        return view('admin.setting.franchise.list', [
            'franchise' => $franchise
        ]);
    }
}
