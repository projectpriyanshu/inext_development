<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Helper\CustomHelper;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Excel;
use Illuminate\Http\Request;
use Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $code = $request->code;
        $search = $request->searchkey;
        if (!empty($code) || !empty($search)) {
            if (!empty($code)) {
                $check_data = City::where(array('code' => $code))->first();
            } else {
                $check_data = City::orWhere(array('code' => $search))->orWhere('name', 'like', '%' . $search . '%')->first();
            }
            $return = array();

            if (!empty($check_data)) {
                $cdata = Country::where('id', $check_data->country_id)->first();
                $sdata = State::where('id', $check_data->state_id)->first();
                $return['id'] = $check_data->id;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['country_code'] = $cdata->code;
                $return['country'] = $cdata->name;
                $return['state_code'] = $sdata->code;
                $return['state'] = $sdata->name;

                $return['status'] = '200';
                $return['message'] = 'city Found!';
            } else {
                $return['id']                             = '';
                $return['code']                           = '';
                $return['name']                           = '';
                $return['state_code']                     = '';
                $return['country_code']                   = '';
                $return['status']                         = '400';
                $return['message']                        = 'city does not exist!';
            }
            return json_encode($return);
        }

        return view('admin.city.index');
    }
    function list() {
        $city = cache('city', function () {
            return City::paginate(10);
        });
        return view('admin.city.list', [
            'city' => $city,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {-

        $city = $request->all();
        if ($request->id) {
            $cid = Country::where(['code' => $request->country_code, 'name' => $request->country])->first();
            $sid = State::where(['code' => $request->state_code, 'name' => $request->state])->first();
            $rules = [
                'code' => 'required',
                'name' => 'required',
                'state_code' => 'required',
                'state' => 'required',
                'country_code' => 'required ',
                'country' => 'required',
                'pincode' => 'required',
            ];

            $validation = Validator::make($city, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/city-index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $data = array(
                "code" => $request->code,
                "name" => $request->name,
                "slug" => $slug,
                "state_id" => $sid->id,
                "country_id" => $cid->id,
            );
            City::where('id', $request->id)->update($data);
        } else {
            $cid = Country::where(['code' => $request->country_code, 'name' => $request->country])->first();
            $sid = State::where(['code' => $request->state_code, 'name' => $request->state])->first();
            $rules = [
                'code' => 'required',
                'name' => 'required',
                'state_code' => 'required',
                'state' => 'required',
                'country_code' => 'required ',
                'country' => 'required',
            ];

            $validation = Validator::make($city, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/city-index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $city = new City;
            $city->code = $request->code;
            $city->name = $request->name;
            $city->slug = $slug;
            $city->state_id = $sid->id;
            $city->country_id = $cid->id;
            $city->save();
        }
        return redirect()->route('city-index')->with('success', 'City added Successfully!');
    }
    public function export()
    {
        $headArr[] = array('Code', 'Name', 'Status', 'Added Date', 'Updated Date');
        $data = City::select('code', 'name', 'status', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $dataArr[] = array($dataRow->code, $dataRow->name, $dataRow->status, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'cities.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(city $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, city $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
