<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Models\City;
use App\Models\CompanyProfile;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Validator;

class CompanyProfileController extends Controller
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
                $check_data = CompanyProfile::where(array('code' => $code))->first();
            } else {
                $check_data = CompanyProfile::orWhere(array('code' => $search))->orWhere('name', 'like', '%' . $search . '%')->first();
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
                $return['country_code'] = $cdata->code;
                $return['country'] =  $cdata->name;
                $return['state_code'] = $sdata->code;
                $return['state'] = $sdata->name;
                $return['city_code'] = $vdata->code;
                $return['city'] = $vdata->name;
                $return['pincode'] = $check_data->pincode;
                $return['telephone'] = $check_data->telephone;
                $return['email'] = $check_data->email;
                $return['website'] = $check_data->website;
                $return['bank_name'] = $check_data->bank_name;
                $return['account_no'] = $check_data->account_no;
                $return['ifsc'] = $check_data->ifsc;
                $return['bank_address'] = $check_data->bank_address;
                $return['gst_no'] = $check_data->gst_no;
                $return['pan_no'] = $check_data->pan_no;
                $return['cin_no'] = $check_data->cin_no;
                $return['status'] = '200';
                $return['message'] = 'company Found!';
            } else {
                $return['id'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['address'] = '';
                $return['country_code'] = '';
                $return['country'] = '';
                $return['state_code'] = '';
                $return['state'] = '';
                $return['city_code'] = '';
                $return['city'] = '';
                $return['pincode'] = '';
                $return['telephone'] = '';
                $return['email'] = '';
                $return['website'] = '';
                $return['bank_name'] = '';
                $return['account_no'] = '';
                $return['ifsc'] = '';
                $return['bank_address'] = '';
                $return['gst_no'] = '';
                $return['pan_no'] = '';
                $return['cin_no'] = '';

                $return['status'] = '400';
                $return['message'] = 'city does not exist!';
            }
            return json_encode($return);
        }

        return view('admin/setting/company/index');
    }

    public function list()
    {
        $company = cache('company', function () {
            return CompanyProfile::paginate(10);
        });
        return view('admin.setting.company.list', [
            'company' => $company
        ]);
    }

    public function store(Request $request)
    {
        $company = $request->all();
        if ($request->id) {
            $cid = Country::where(['code' => $request->country_code, 'name' => $request->country])->first();
            $sid = State::where(['code' => $request->state_code, 'name' => $request->state])->first();
            $vid = City::where(['code' => $request->city_code, 'name' => $request->city])->first();
            $rules = [
                'code'                   => 'required|unique:company_profiles,code,' . $request->id,
                'name'                   => 'required|unique:company_profiles,name,' . $request->id,
                'address'                => 'required',
                'country_code'           => 'required',
                'country'                => 'required',
                'state_code'             => 'required',
                'state'                  => 'required',
                'city_code'              => 'required ',
                'city'                   => 'required ',
                'pincode'                => 'required',
                'telephone'              => 'required',
                'email'                  => 'required',
                'website'                => 'required',
                'bank_name'              => 'required',
                'account_no'             => 'required',
                'ifsc'                   => 'required',
                'bank_address'           => 'required',
                'gst_no'                 => 'required',
                'pan_no'                 => 'required',
                'cin_no'                 => 'required',
            ];

            $validation = Validator::make($company, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/company.index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $data = array(
                "code"              => $request->code,
                "name"              => $request->name,
                "address"           => $request->address,
                "country_id"          => $cid->id,
                "state_id"        => $sid->id,
                "city_id"          => $vid->id,
                "pincode"           => $request->pincode,
                "telephone"           => $request->telephone,
                "email"           => $request->email,
                "website"           => $request->website,
                "bank_name"           => $request->bank_name,
                "account_no"           => $request->account_no,
                "ifsc"           => $request->ifsc,
                "bank_address"           => $request->bank_address,
                "gst_no"           => $request->gst_no,
                "pan_no"           => $request->pan_no,
                "cin_no"           => $request->cin_no,
                "file"           => $request->file,

            );
            CompanyProfile::where('id', $request->id)->update($data);
        } else {
            $cid = Country::where(['code' => $request->country_code, 'name' => $request->country])->first();
            $sid = State::where(['code' => $request->state_code, 'name' => $request->state])->first();
            $vid = City::where(['code' => $request->city_code, 'name' => $request->city])->first();
            $rules = [
                'code'             => 'required',
                'name'              => 'required',
                'address'              => 'required',
                'country_code'        => 'required',
                'country'              => 'required',
                'state_code'        => 'required',
                'state'              => 'required',
                'city_code'        => 'required ',
                'city'        => 'required ',
                'pincode'          => 'required',
                'telephone'              => 'required',
                'email'              => 'required',
                'website'              => 'required',
                'bank_name'              => 'required',
                'account_no'              => 'required',
                'ifsc'              => 'required',
                'bank_address'              => 'required',
                'gst_no'              => 'required',
                'pan_no'              => 'required',
                'cin_no'              => 'required',
            ];

            $validation = Validator::make($company, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/company.index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $company = new CompanyProfile;
            $company->code              = $request->code;
            $company->name              = $request->name;
            $company->address           = $request->address;
            $company->country_id        = $cid->id;
            $company->city_id           = $vid->id;
            $company->state_id          = $sid->id;
            $company->pincode           = $request->address;
            $company->telephone         = $request->telephone;
            $company->email             = $request->email;
            $company->website           = $request->website;
            $company->bank_name         = $request->bank_name;
            $company->account_no        = $request->account_no;
            $company->ifsc              = $request->ifsc;
            $company->bank_address      = $request->bank_address;
            $company->gst_no            = $request->gst_no;
            $company->pan_no            = $request->pan_no;
            $company->cin_no            = $request->cin_no;
            if ($request->hasfile('file')) {
                $file = $request->file('file');
                $extention = $file->getclientoriginalextension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/company/', $filename);
                $company->file = $filename;
            }
            $company->save();
        }
        return redirect()->route('company.index')->with('success', 'Data added Successfully!');
    }
}
