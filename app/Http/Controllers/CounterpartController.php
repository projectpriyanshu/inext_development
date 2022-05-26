<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Models\City;
use App\Models\Counterpart;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Validator;

class CounterpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $code = $request->code;
        // dd($code);
        $search = $request->searchkey;
        if (!empty($code) || !empty($search)) {
            if (!empty($code)) {
                $check_data = Counterpart::where(array('code' => $code))->first();
            } else {
                $check_data = Counterpart::orWhere(array('code' => $search))->orWhere('name', 'like', '%' . $search . '%')->first();
            }
            $return = array();

            if (!empty($check_data)) {
                $cdata = Country::where('id', $check_data->country_id)->first();
                $sdata = State::where('id', $check_data->state_id)->first();
                $vdata = City::where('id', $check_data->city_id)->first();
                $return['id'] = $check_data->id;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['address'] = $check_data->address;
                $return['address1'] = $check_data->address1;
                $return['zipcode'] = $check_data->zipcode;
                $return['country_code'] = $cdata->code;
                $return['country'] = $cdata->name;
                $return['state_code'] = $sdata->code;
                $return['state'] = $sdata->name;
                $return['city_code'] = $vdata->code;
                $return['city'] = $vdata->name;
                $return['contact'] = $check_data->contact;
                $return['telephone'] = $check_data->telephone;
                $return['email'] = $check_data->email;
                $return['website'] = $check_data->website;
                $return['sector'] = $check_data->sector;
                $return['status'] = '200';
                $return['message'] = 'counter Found!';
            } else {
                $return['id'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['address'] = '';
                $return['address1'] = '';
                $return['zipcode'] = '';
                $return['country_code'] = '';
                $return['country'] = '';
                $return['state_code'] = '';
                $return['state'] = '';
                $return['city_code'] = '';
                $return['city'] = '';
                $return['contact'] = '';
                $return['telephone'] = '';
                $return['email'] = '';
                $return['website'] = '';
                $return['sector'] = '';
                $return['status'] = '400';
                $return['message'] = 'counter part does not exist!';
            }
            return json_encode($return);
        }

        return view('admin/operation/counter_part/index');
    }

    function list() {
        $counter = cache('counter', function () {
            return Counterpart::paginate(10);
        });
        return view('admin.operation.counter_part.list', [
            'counter' => $counter,
        ]);
    }

    public function store(Request $request)
    {

        $counter = $request->all();
        if ($request->id) {
            $cid = Country::where(['code' => $request->country_code, 'name' => $request->country])->first();
            $sid = State::where(['code' => $request->state_code, 'name' => $request->state])->first();
            $vid = City::where(['code' => $request->city_code, 'name' => $request->city])->first();
            $rules = [
                'code' => 'required|unique:counterparts,code,' . $request->id,
                'name' => 'required|unique:counterparts,name,' . $request->id,
                'address' => 'required',
                'address1' => 'required',
                'zipcode' => 'required',
                'country_code' => 'required',
                'country' => 'required',
                'state_code' => 'required',
                'state' => 'required',
                'city_code' => 'required ',
                'city' => 'required ',
                'contact' => 'required',
                'telephone' => 'required',
                'email' => 'required',
                'website' => 'required',
                'sector' => 'required',

            ];

            $validation = Validator::make($counter, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/counter-part-index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $data = array(
                "code" => $request->code,
                "name" => $request->name,
                "address" => $request->address,
                "address1" => $request->address1,
                "zipcode" => $request->zipcode,
                "country_id" => $cid->id,
                "state_id" => $sid->id,
                "city_id" => $vid->id,
                "contact" => $request->contact,
                "telephone" => $request->telephone,
                "email" => $request->email,
                "website" => $request->website,
                "sector" => $request->sector,
            );
            Counterpart::where('id', $request->id)->update($data);

        } else {
            $cid = Country::where(['code' => $request->country_code, 'name' => $request->country])->first();
            $sid = State::where(['code' => $request->state_code, 'name' => $request->state])->first();
            $vid = City::where(['code' => $request->city_code, 'name' => $request->city])->first();

            $rules = [
                'code' => 'required',
                'name' => 'required',
                'address' => 'required',
                'address1' => 'required',
                'zipcode' => 'required',
                'country_code' => 'required',
                'country' => 'required',
                'state_code' => 'required',
                'state' => 'required',
                'city_code' => 'required ',
                'city' => 'required ',
                'contact' => 'required',
                'telephone' => 'required',
                'email' => 'required',
                'website' => 'required',
                'sector' => 'required',

            ];

            $validation = Validator::make($counter, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/counter-part-index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $counter = new Counterpart;
            $counter->code = $request->code;
            $counter->name = $request->name;
            $counter->address = $request->address;
            $counter->address1 = $request->address1;
            $counter->zipcode = $request->zipcode;
            $counter->country_id = $cid->id;
            $counter->city_id = $vid->id;
            $counter->state_id = $sid->id;
            $counter->contact = $request->contact;
            $counter->telephone = $request->telephone;
            $counter->email = $request->email;
            $counter->website = $request->website;
            $counter->sector = $request->sector;

            $counter->save();

        }
        return redirect()->route('counter-part.index')->with('success', 'Data added Successfully!');
    }
}
