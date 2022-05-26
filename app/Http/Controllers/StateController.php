<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\State;
use App\Helper\CustomHelper;
use Illuminate\Http\Request;
use App\Exports\StateExport as Export;
use App\Models\Country;
use App\Exports\ExportData;
use Excel;

class StateController extends Controller
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
                $check_data = State::select('states.*', 'countries.code as country_code', 'countries.name as country')
                    ->join('countries', 'countries.id', 'states.country_id')
                    ->where(array('states.code' => $code))->first();
            } else {
                $check_data = State::select('states.*', 'countries.code as country_code', 'countries.name as country')
                    ->join('countries', 'countries.id', 'states.country_id')
                    ->orWhere(array('states.code' => $search))->orWhere('states.name', 'like', '%' . $search . '%')->orWhere(array('states.gst_state_code' => $search))->first();
            }
            $return = array();
            if (!empty($check_data)) {
                $return['id'] = $check_data->id;
                $return['country'] = $check_data->country;
                $return['country_code'] = $check_data->country_code;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['gst_state_code'] = $check_data->gst_state_code;
                $return['status'] = '200';
                $return['message'] = 'State Found!';
            } else {
                $return['id'] = '';
                $return['country'] = '';
                $return['country_code'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['gst_state_code'] = '';
                $return['status'] = '400';
                $return['message'] = 'State does not exist!';
            }
            return json_encode($return);
        }

        return view('admin.state.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $state = cache('state', function () {
            return State::paginate(10);
        });
        return view('admin.state.list', [
            'state' => $state
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
        $state = $request->all();
        $country = Country::where('name', $request->country)
            ->orWhere('code', $request->country_code)
            ->first();
        $country = $country->id;
        if (!empty($request->id)) {
            $rules = [
                'code' => 'required|max:20|unique:states,code,' . $request->id,
                'name' => 'required|max:20|unique:states,name,' . $request->id,
                'gst_state_code' => 'required|max:20|unique:states,gst_state_code,' . $request->id,
            ];

            $validation = Validator::make($state, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/state-index')->withInput()->withErrors($messages);
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $state = State::find($request->id);
            $state->country_id        = $country;
            $state->code              = $request->code;
            $state->name              = $request->name;
            $state->slug              = $slug;
            $state->gst_state_code    = $request->gst_state_code;
            $state->save();
        } else {
            $rules = [
                'code'              => 'required|unique:states|max:20',
                'name'              => 'required|unique:states|max:20',
                'gst_state_code'    => 'required|unique:states|max:20',
            ];

            $validation = Validator::make($state, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/state-index')->withErrors($messages)->withInput()->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $state = new State([
                "country_id"        => $country,
                "code"              => $request->code,
                "name"              => $request->name,
                "slug"              => $slug,
                "gst_state_code"    => $request->gst_state_code,
            ]);
            $state->save();
        }
        return redirect('/state-index')->with('success', 'State added successfully!');
    }
    /**
     * Export File
     */
    public function export()
    {
        $headArr[] = array('Code', 'Name', 'State Code(GST)', 'Status', 'Added Date', 'Updated Date');
        $data = State::select('code', 'name', 'gst_state_code', 'status', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $dataArr[] = array($dataRow->code, $dataRow->name, $dataRow->gst_state_code, $dataRow->status, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'states.xlsx');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
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
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }
}
