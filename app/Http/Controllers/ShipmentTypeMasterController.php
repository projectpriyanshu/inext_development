<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Helper\CustomHelper;
use App\Models\ShipmentTypeMaster;
use Excel;
use Illuminate\Http\Request;
use Validator;

class ShipmentTypeMasterController extends Controller
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
                $check_data = ShipmentTypeMaster::where(array('code' => $code))->first();
            } else {
                $check_data = ShipmentTypeMaster::orWhere(array('code' => $search))->orWhere('name', 'like', '%' . $search . '%')->first();
            }
            $return = array();
            if (!empty($check_data)) {
                $return['id'] = $check_data->id;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['status'] = '200';
                $return['message'] = 'Shipment Type Found!';
            } else {
                $return['id'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['status'] = '400';
                $return['message'] = 'Shipment Type does not exist!';
            }
            return json_encode($return);
        }

        return view('admin.shipment_type.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function list() {
        $shipment_type = cache('shipment_type', function () {
            return ShipmentTypeMaster::paginate(10);
        });
        return view('admin.shipment_type.list', [
            'shipment_type' => $shipment_type,
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
        $shipment_type = $request->all();
        if (!empty($request->id)) {
            $rules = [
                'code' => 'required|max:20|unique:shipment_type_masters,code,' . $request->id,
                'name' => 'required|max:20|unique:shipment_type_masters,name,' . $request->id,
            ];

            $validation = Validator::make($shipment_type, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/shipment-type-index')->withErrors($messages)->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $shipment_type = ShipmentTypeMaster::find($request->id);
            $shipment_type->code = $request->code;
            $shipment_type->name = $request->name;
            $shipment_type->slug = $slug;
            $shipment_type->save();
        } else {
            $rules = [
                'code' => 'required|unique:shipment_type_masters|max:20',
                'name' => 'required|unique:shipment_type_masters|max:20',
            ];

            $validation = Validator::make($shipment_type, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/shipment-type-index')->withErrors($messages)->with('error', 'All fields are required!')->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $shipment_type = new ShipmentTypeMaster([
                "code" => $request->code,
                "name" => $request->name,
                "slug" => $slug,
            ]);
            $shipment_type->save();
        }
        return redirect('/shipment-type-index')->with('success', 'Shipment Type added successfully!');
    }

    //export shipment type
    public function export()
    {
        $headArr[] = array('Code', 'Name', 'Status', 'Added Date', 'Updated Date');
        $data = ShipmentTypeMaster::select('code', 'name', 'status', 'created_at', 'updated_at', )->orderBy('created_at', 'desc')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $dataArr[] = array($dataRow->code, $dataRow->name, $dataRow->status, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'shipment_type_master.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShipmentTypeMaster  $shipmentTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function show(ShipmentTypeMaster $shipmentTypeMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShipmentTypeMaster  $shipmentTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ShipmentTypeMaster $shipmentTypeMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShipmentTypeMaster  $shipmentTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShipmentTypeMaster $shipmentTypeMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShipmentTypeMaster  $shipmentTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShipmentTypeMaster $shipmentTypeMaster)
    {
        //
    }
}
