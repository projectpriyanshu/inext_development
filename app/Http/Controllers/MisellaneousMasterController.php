<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Helper\CustomHelper;
use App\Models\MisellaneousMaster;
use Excel;
use Illuminate\Http\Request;
use Validator;

class MisellaneousMasterController extends Controller
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
                $check_data = MisellaneousMaster::where(array('code' => $code))->first();
            } else {
                $check_data = MisellaneousMaster::orWhere(array('code' => $search))->orWhere('name', 'like', '%' . $search . '%')->orWhere(array('gst' => $search))->orWhere(array('fuel_charges' => $search))->first();
            }
            $return = array();
            if (!empty($check_data)) {
                $return['id'] = $check_data->id;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['gst'] = $check_data->gst;
                $return['fuel_charges'] = $check_data->fuel_charges;
                $return['status'] = '200';
                $return['message'] = 'Misellaneous Found!';
            } else {
                $return['id'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['gst'] = '';
                $return['fuel_charges'] = '';
                $return['status'] = '400';
                $return['message'] = 'Misellaneous does not exist!';
            }
            return json_encode($return);
        }

        return view('admin.misellaneous.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function list() {
        $misellaneous = cache('misellaneous', function () {
            return MisellaneousMaster::paginate(10);
        });
        return view('admin.misellaneous.list', [
            'misellaneous' => $misellaneous,
        ]);
    }

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
        $misellaneous = $request->all();
        if (!empty($request->id)) {
            $rules = [
                'code' => 'required|max:20|unique:misellaneous_masters,code,' . $request->id,
                'name' => 'required|max:20|unique:misellaneous_masters,name,' . $request->id,
                'gst' => 'required|max:20',
                'fuel_charges' => 'required|max:20',
            ];

            $validation = Validator::make($misellaneous, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/misellaneous-index')->withErrors($messages)->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $misellaneous = MisellaneousMaster::find($request->id);
            $misellaneous->code = $request->code;
            $misellaneous->name = $request->name;
            $misellaneous->slug = $slug;
            $misellaneous->gst = $request->gst;
            $misellaneous->fuel_charges = $request->fuel_charges;
            $misellaneous->save();
        } else {
            $rules = [
                'code' => 'required|unique:misellaneous_masters|max:20',
                'name' => 'required|unique:misellaneous_masters|max:20',
                'gst' => 'required|max:20',
                'fuel_charges' => 'required|max:20',
            ];

            $validation = Validator::make($misellaneous, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/misellaneous-index')->withErrors($messages)->with('error', 'All fields are required!')->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $misellaneous = new MisellaneousMaster([
                "code" => $request->code,
                "name" => $request->name,
                "slug" => $slug,
                "gst" => $request->gst,
                "fuel_charges" => $request->fuel_charges,
            ]);
            $misellaneous->save();
        }
        return redirect('/misellaneous-index')->with('success', 'Misellaneous added successfully!');
    }

    //export shipment type
    public function export()
    {
        $headArr[] = array('Code', 'Name', 'GST', 'Fuel_Charges', 'Status', 'Added Date', 'Updated Date');
        $data = MisellaneousMaster::select('code', 'name', 'gst', 'fuel_charges', 'status', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $dataArr[] = array($dataRow->code, $dataRow->name, $dataRow->gst, $dataRow->fuel_charges, $dataRow->status, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'miscellaneous.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MisellaneousMaster  $misellaneousMaster
     * @return \Illuminate\Http\Response
     */
    public function show(MisellaneousMaster $misellaneousMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MisellaneousMaster  $misellaneousMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(MisellaneousMaster $misellaneousMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MisellaneousMaster  $misellaneousMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MisellaneousMaster $misellaneousMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MisellaneousMaster  $misellaneousMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(MisellaneousMaster $misellaneousMaster)
    {
        //
    }
}
