<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\ForwarderMaster;
use App\Models\City;
use App\Helper\CustomHelper;
use Illuminate\Http\Request;
use App\Exports\ExportData;
use Excel;

class ForwarderMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $code = $request->code;
        $search = $request->search;

        if (!empty($code) || !empty($search)) {
            if (!empty($code)) {
                $check_data = ForwarderMaster::select(
                    'forwarder_masters.*',
                    'cities.code as city_code',
                    'cities.name as city_name',
                    'states.name as state',
                    'states.code as state_code'
                )
                    ->join('cities', 'cities.id', 'forwarder_masters.city_id')
                    ->join('states', 'states.id', 'cities.state_id')
                    ->where(array('forwarder_masters.code' => $code))->first();
            } else {
                $check_data = ForwarderMaster::select(
                    'forwarder_masters.*',
                    'cities.code as city_code',
                    'cities.name as city_name',
                    'states.name as state',
                    'states.code as state_code'
                )
                    ->join('cities', 'cities.id', 'forwarder_masters.city_id')
                    ->join('states', 'states.id', 'cities.state_id')
                    ->orWhere(array('forwarder_masters.code' => $search))->orWhere('forwarder_masters.name', 'like', '%' . $search . '%')->orWhere(array('email' => $search))->first();
            }
            $return = array();
            if (!empty($check_data)) {
                $return['id'] = $check_data->id;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['email'] = $check_data->email;
                $return['address'] = $check_data->address;
                $return['city_code'] = $check_data->city_code;
                $return['city_name'] = $check_data->city_name;
                $return['state_code'] = $check_data->state_code;
                $return['state'] = $check_data->state;
                $return['pincode'] = $check_data->pincode;
                $return['telephone'] = $check_data->telephone;
                $return['website'] = $check_data->website;
                $return['bank_name'] = $check_data->bank_name;
                $return['account_no'] = $check_data->account_no;
                $return['ifsc_code'] = $check_data->ifsc_code;
                $return['bank_address'] = $check_data->bank_address;
                $return['gst_no'] = $check_data->gst_no;
                $return['pan_no'] = $check_data->pan_no;
                $return['cin_no'] = $check_data->cin_no;
                $return['status'] = '200';
                $return['message'] = 'Forwarder Account Found!';
            } else {
                $return['id'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['email'] = '';
                $return['address'] = '';
                $return['city_id'] = '';
                $return['state_id'] = '';
                $return['pincode'] = '';
                $return['telephone'] = '';
                $return['website'] = '';
                $return['bank_name'] = '';
                $return['account_no'] = '';
                $return['ifsc_code'] = '';
                $return['bank_address'] = '';
                $return['gst_no'] = '';
                $return['pan_no'] = '';
                $return['cin_no'] = '';
                $return['status'] = '400';
                $return['message'] = 'Forwarder Account does not exist!';
            }
            return json_encode($return);
        }
        return view('admin.forwarder-account.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $forwardMaster = cache('forwardMaster', function () {
            return ForwarderMaster::orderBy('id', 'DESC')->paginate(10);
        });
        return view('admin.forwarder-account.list', [
            'forwardMaster' => $forwardMaster
        ]);
    }

    /**
     * Display a listing of the city.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forwarder = $request->all();
        $city = City::select('id', 'state_id')->where('name', $request->city_id)->first();

        if (!$city) {
            return back()->with('error', 'Please Select City from the List!')->withInput();
        }
        if (!empty($request->id)) {
            $rules = [
                'code'            => 'required|max:20|unique:forwarder_masters,code,' . $request->id,
                'name'            => 'required|max:20|unique:forwarder_masters,name,' . $request->id,
                'address'         => 'required',
                'city_id'         => 'required',
                'pincode'         => 'required|numeric',
                'telephone'       => 'required|numeric',
                'email'           => 'required|unique:forwarder_masters,email,' . $request->id,
                'website'         => 'required|unique:forwarder_masters,website,' . $request->id,
                'bank_name'       => 'required',
                'account_no'      => 'required|unique:forwarder_masters,account_no,' . $request->id,
                'ifsc_code'       => 'required',
                'bank_address'    => 'required',
                'gst_no'          => 'required|unique:forwarder_masters,gst_no,' . $request->id,
                'pan_no'          => 'required|unique:forwarder_masters,pan_no,' . $request->id,
                'cin_no'          => 'required|unique:forwarder_masters,cin_no,' . $request->id,
            ];

            $validation = Validator::make($forwarder, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect()->route('forwarder-account-index')->withErrors($messages)->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $forwarder = ForwarderMaster::find($request->id);
            $forwarder->code              = $request->code;
            $forwarder->name              = $request->name;
            $forwarder->slug              = $slug;
            $forwarder->address           = $request->address;
            $forwarder->city_id           = $city->id;
            $forwarder->state_id          = $city->state_id;
            $forwarder->pincode           = $request->pincode;
            $forwarder->telephone         = $request->telephone;
            $forwarder->email             = $request->email;
            $forwarder->website           = $request->website;
            $forwarder->bank_name         = $request->bank_name;
            $forwarder->account_no        = $request->account_no;
            $forwarder->ifsc_code         = $request->ifsc_code;
            $forwarder->bank_address      = $request->bank_address;
            $forwarder->gst_no            = $request->gst_no;
            $forwarder->pan_no            = $request->pan_no;
            $forwarder->cin_no            = $request->cin_no;
            $forwarder->save();
        } else {
            $rules = [
                'code'            => 'required|max:20|unique:forwarder_masters,code',
                'name'            => 'required|max:20|unique:forwarder_masters,name',
                'address'         => 'required',
                'city_id'         => 'required',
                'state'      => 'required',
                'pincode'         => 'required|numeric',
                'telephone'       => 'required|numeric',
                'email'           => 'required|unique:forwarder_masters,email',
                'website'         => 'required|unique:forwarder_masters,website',
                'bank_name'       => 'required',
                'account_no'      => 'required|unique:forwarder_masters,account_no',
                'ifsc_code'       => 'required',
                'bank_address'    => 'required',
                'gst_no'          => 'required|unique:forwarder_masters,gst_no',
                'pan_no'          => 'required|unique:forwarder_masters,pan_no',
                'cin_no'          => 'required|unique:forwarder_masters,cin_no',
            ];

            $validation = Validator::make($forwarder, $rules);

            if ($validation->fails()) {
                //dd($request->all());
                $messages = $validation->errors();
                return redirect()->route('forwarder-account-index')->withErrors($messages)->with('error', 'All fields are required!')->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);

            $forwarder = new ForwarderMaster([
                "code"              => $request->code,
                "name"              => $request->name,
                "slug"              => $slug,
                "address"           => $request->address,
                "city_id"           => $city->id,
                "state_id"          => $city->state_id,
                "pincode"           => $request->pincode,
                "telephone"         => $request->telephone,
                "email"             => $request->email,
                "website"           => $request->website,
                "bank_name"         => $request->bank_name,
                "account_no"        => $request->account_no,
                "ifsc_code"         => $request->ifsc_code,
                "bank_address"      => $request->bank_address,
                "gst_no"            => $request->gst_no,
                "pan_no"            => $request->pan_no,
                "cin_no"            => $request->cin_no,
            ]);

            $forwarder->save();
        }
        return redirect()->route('forwarder-account-index')->with('success', 'Forwarder Account added successfully!');
    }

    /**
     * Export Excel
     */
    public function export()
    {
        $headArr[] = array('Code', 'Name', 'Address', 'City Name', 'State Name', 'Pincode', 'Telephone', 'Email', 'Website', 'Bank Name', 'Account No', 'IFSC', 'Bank Address', 'GST No', 'Pan No', 'Cin No', 'Added Date', 'Updated Date');

        $data = ForwarderMaster::select('forwarder_masters.*', 'cities.name as city_name', 'states.name as state_name')
            ->join('cities', 'cities.id', 'forwarder_masters.city_id')
            ->join('states', 'states.id', 'forwarder_masters.state_id')
            ->orderBy('created_at', 'desc')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $dataArr[] = array($dataRow->code, $dataRow->name, $dataRow->address, $dataRow->city_name, $dataRow->state_name, $dataRow->pincode, $dataRow->telephone, $dataRow->email, $dataRow->website, $dataRow->bank_name, $dataRow->account_no, $dataRow->ifsc_code, $dataRow->bank_address, $dataRow->gst_no, $dataRow->pan_no, $dataRow->cin_no, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'forwarder_account.xlsx');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForwarderMaster  $forwarderMaster
     * @return \Illuminate\Http\Response
     */
    public function show(ForwarderMaster $forwarderMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForwarderMaster  $forwarderMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ForwarderMaster $forwarderMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForwarderMaster  $forwarderMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForwarderMaster $forwarderMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForwarderMaster  $forwarderMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForwarderMaster $forwarderMaster)
    {
        //
    }
}
