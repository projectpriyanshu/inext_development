<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Helper\CustomHelper;
use App\Models\Country;
use Excel;
use Illuminate\Http\Request;
use Validator;

class CountryController extends Controller
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
                $check_data = Country::where(array('code' => $code))->first();
            } else {
                $check_data = Country::orWhere(array('code' => $search))->orWhere('name', 'like', '%' . $search . '%')->orWhere(array('iso_code' => $search))->first();
            }
            $return = array();
            if (!empty($check_data)) {
                $return['id'] = $check_data->id;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['iso_code'] = $check_data->iso_code;
                $return['status'] = '200';
                $return['message'] = 'Country Found!';
            } else {
                $return['id'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['iso_code'] = '';
                $return['status'] = '400';
                $return['message'] = 'Country does not exist!';
            }
            return json_encode($return);
        }

        return view('admin.country.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function list() {
        $country = cache('country', function () {
            return country::paginate(10);
        });
        return view('admin.country.list', [
            'country' => $country,
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

        $country = $request->all();
        if (!empty($request->id)) {
            $rules = [
                'code' => 'required|max:20|unique:countries,code,' . $request->id,
                'name' => 'required|max:20|unique:countries,name,' . $request->id,
                'iso_code' => 'required|max:20|unique:countries,iso_code,' . $request->id,
            ];

            $validation = Validator::make($country, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/country-index')->withErrors($messages);
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $country = country::find($request->id);
            $country->code = $request->code;
            $country->name = $request->name;
            $country->iso_code = $request->iso_code;
            $country->slug = $slug;
            $country->save();
        } else {
            $rules = [
                'code' => 'required|unique:countries|max:20',
                'name' => 'required|unique:countries|max:20',
                'iso_code' => 'required|unique:countries|max:20',
            ];

            $validation = Validator::make($country, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/country-index')->withErrors($messages)->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $country = new Country([
                "code" => $request->code,
                "name" => $request->name,
                "iso_code" => $request->iso_code,
                "slug" => $slug,
            ]);
            $country->save();
        }
        return redirect('/country-index')->with('success', 'Country added successfully!');
    }
    /**
     * Export Country
     */
    public function export()
    {
        $headArr[] = array('Code', 'Name', 'ISO Code', 'Status', 'Added Date', 'Last Updated Date');
        $data = Country::select('code', 'name', 'iso_code', 'status', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $dataArr[] = array($dataRow->code, $dataRow->name, $dataRow->iso_code, $dataRow->slug, $dataRow->status, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'country.xlsx');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
