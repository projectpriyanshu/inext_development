<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Helper\CustomHelper;
use App\Models\ShipmentEventMaster;
use Excel;
use Illuminate\Http\Request;
use Validator;

class ShipmentEventMasterController extends Controller
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
                $check_data = ShipmentEventMaster::where(array('code' => $code))->first();
            } else {
                $check_data = ShipmentEventMaster::orWhere(array('code' => $search))->orWhere('name', 'like', '%' . $search . '%')->first();
            }
            $return = array();
            if (!empty($check_data)) {
                $return['id'] = $check_data->id;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['status'] = '200';
                $return['message'] = 'ShipmentEvent Found!';
            } else {
                $return['id'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['status'] = '400';
                $return['message'] = 'ShipmentEvent does not exist!';
            }
            return json_encode($return);
        }

        return view('admin.shipmentevent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function list() {
        $shipment = cache('ShipmentEventMaster', function () {
            return ShipmentEventMaster::paginate(10);
        });
        return view('admin.shipmentevent.list', [
            'shipment' => $shipment,
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
        $shipment = $request->all();
        if (!empty($request->id)) {
            $rules = [
                'code' => 'required|max:20|unique:shipment_event_masters,code,' . $request->id,
                'name' => 'required|max:20|unique:shipment_event_masters,name,' . $request->id,
            ];

            $validation = Validator::make($shipment, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/shipmentevent-index')->withErrors($messages)->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $shipment = ShipmentEventMaster::find($request->id);
            $shipment->code = $request->code;
            $shipment->name = $request->name;
            $shipment->slug = $slug;
            $shipment->save();
        } else {
            $rules = [
                'code' => 'required|unique:shipment_event_masters|max:20',
                'name' => 'required|unique:shipment_event_masters|max:20',
            ];

            $validation = Validator::make($shipment, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/shipmentevent-index')->withErrors($messages)->with('error', 'All fields are required!')->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $shipment = new ShipmentEventMaster([
                "code" => $request->code,
                "name" => $request->name,
                "slug" => $slug,
            ]);
            $shipment->save();
        }

        return redirect('/shipmentevent-index')->with('success', 'ShipmentEvent added successfully!');
    }

    //export shipment
    public function export()
    {
        $headArr[] = array('Code', 'Name', 'Tag', 'status', 'Added Date', 'Updated Date');
        $data = ShipmentEventMaster::select('code', 'name', 'tag', 'status', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $dataArr[] = array($dataRow->code, $dataRow->name, $dataRow->tag, $dataRow->status, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'shipment_event.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShipmentEventMaster  $shipmentEventMaster
     * @return \Illuminate\Http\Response
     */
    public function show(ShipmentEventMaster $shipmentEventMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShipmentEventMaster  $shipmentEventMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ShipmentEventMaster $shipmentEventMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShipmentEventMaster  $shipmentEventMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShipmentEventMaster $shipmentEventMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShipmentEventMaster  $shipmentEventMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShipmentEventMaster $shipmentEventMaster)
    {
        //
    }
}
