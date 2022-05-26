<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Models\CovidFuel;
use App\Models\NetworkMaster;
use DB;
use Excel;
use Illuminate\Http\Request;
use Session;
use Validator;

class CovidFuelController extends Controller
{

    public function index()
    {
        return view('admin/covid_fuel/index');
    }

    public function add(Request $request)
    {

        if (!$request->id) {
            $validation = Validator::make($request->all(), [
                'shipper_code' => 'required|max:250|unique:covid_fuels,shipper_code',
                'shipper' => 'required|max:250|unique:covid_fuels,shipper',
                'network_code' => 'required',
                'network' => 'required',
                'tag' => 'required|max:250',
            ]);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect()->back()->withErrors($messages)->withInput();
            }
            $netid = NetworkMaster::where(['code' => $request->network_code, 'name' => $request->network])->first();
            $fuel = new CovidFuel;
            $fuel->shipper_code = $request->shipper_code;
            $fuel->shipper = $request->shipper;
            $fuel->network_id = $netid->id;
            $fuel->tag = $request->tag;
            $fuel->save();
            Session::flash('success', 'added successfully!');
        } else {
            $validation = Validator::make($request->all(), [
                'shipper_code' => 'required|max:250|unique:covid_fuels,shipper_code,' . $request->id,
                'shipper' => 'required|max:250|unique:covid_fuels,shipper,' . $request->id,
                'network_code' => 'required',
                'network' => 'required',
                'tag' => 'required|max:250',
            ]);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect()->back()->withErrors($messages)->withInput();
            }

            $netid = NetworkMaster::where(['code' => $request->network_code, 'name' => $request->network])->first();

            $data = array(
                "shipper_code" => $request->shipper_code,
                "shipper" => $request->shipper,
                "network_id" => $netid->id,
                "tag" => $request->tag,
            );

            Session::flash('success', 'updated successfully!');
            CovidFuel::where('id', $request->id)->update($data);
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $searchkey = $request->searchkey;

        $data = CovidFuel::join('network_masters', 'covid_fuels.network_id', '=', 'network_masters.id')->orWhere('shipper', 'like', '%' . $searchkey . '%')
            ->orWhere('shipper_code', 'like', '%' . $searchkey . '%')
            ->orWhere('network_masters.code', 'like', '%' . $searchkey . '%')
            ->orWhere('network_masters.name', 'like', '%' . $searchkey . '%')
            ->select('covid_fuels.id', 'covid_fuels.shipper', 'covid_fuels.shipper_code', 'network_masters.name as network', 'network_masters.code as network_code', 'tag')
            ->first();
        if ($data) {
            return response()->json(array('status' => true, 'data' => $data));
        } else {
            return response()->json(array('status' => false, 'message' => 'No data found!'));
        }
    }

    function list() {
        // $data = CovidFuel::orderBy('id', 'desc')->paginate(10);

        $data = DB::table('covid_fuels')
            ->join('network_masters', 'covid_fuels.network_id', '=', 'network_masters.id')
            ->orderBy('covid_fuels.id', 'desc')->paginate(10);

        return view('admin/covid_fuel/list')->with(['data' => $data]);
    }
    public function export()
    {

        $headArr[] = array('Shipper Code', 'Shipper', 'Network Code', 'Network', 'Tag', 'Added Date', 'Updated Date');
        $data = CovidFuel::join('network_masters', 'covid_fuels.network_id', '=', 'network_masters.id')
            ->select('covid_fuels.shipper', 'covid_fuels.shipper_code', 'network_masters.name as network', 'network_masters.code as network_code', 'tag', 'covid_fuels.created_at', 'covid_fuels.updated_at')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $dataArr[] = array($dataRow->shipper_code, $dataRow->shipper, $dataRow->network_code, $dataRow->network, $dataRow->tag, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'export_data.xlsx');
    }

    public function searchNetwork(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $check_data = NetworkMaster::select('network_masters.name as network', 'network_masters.code as network_code')
                ->get();
        } else {
            $check_data = NetworkMaster::select('network_masters.name as network', 'network_masters.code as network_code')
                ->where('name', 'like', '%' . $search . '%')->get();
        }

        $response = array();

        foreach ($check_data as $data) {
            $response[] = array("label" => $data->network, "network_code" => $data->network_code);
        }

        return response()->json($response);
    }
}
