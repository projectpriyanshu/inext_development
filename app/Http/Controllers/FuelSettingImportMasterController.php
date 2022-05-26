<?php

namespace App\Http\Controllers;
use App\Models\CustomerAccount;
use App\Models\FuelSettingImportMaster;
use App\Models\NetworkMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exports\ExportData;
use Excel;

class FuelSettingImportMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        
        if(!empty($search))
        {
            $check_data = FuelSettingImportMaster::select('fuel_setting_import_masters.*','network_masters.code as client_code')
            ->join('network_masters','network_masters.code','fuel_setting_import_masters.network')
            ->orWhere(array('fuel_setting_import_masters.network'=>$search))->first();
            $return = array();
            if(!empty($check_data))
            {
                $return['id'] = $check_data->id;
                $return['client_code'] = $check_data->client_code;
                $return['client_name'] = $check_data->client_name;
                $return['network'] = $check_data->network;
                $return['amount'] = $check_data->amount;
                $return['from_date'] = $check_data->from_date;
                $return['to_date'] = $check_data->to_date;
                $return['status'] = '200';
                $return['message'] = 'Fuel Setting Import Found!';
            }
            else
            {
                $return['id'] = '';
                $return['client_code'] = '';
                $return['client_name'] = '';
                $return['network'] = '';
                $return['amount'] = '';
                $return['from_date'] = '';
                $return['to_date'] = '';
                $return['status'] = '400';
                $return['message'] = 'Fuel Setting Import does not exist!';
            }
            return json_encode($return);
        }
        return view('admin.fuel-setting-import.index');
    }
    /**
     * Export
     */
    public function export() 
    {
        $headArr[] = array('Client Name','Network','Amount','From Date','To Date','Status','Added Date','Updated Date');
        $data = FuelSettingImportMaster::select('client_name','network','amount','from_date','to_date','status','created_at','updated_at')->orderBy('created_at','desc')->get();
        
        $dataArr[] = array();

        foreach($data as $dataRow){
            $dataArr[] = array($dataRow->client_name,$dataRow->network,$dataRow->amount,$dataRow->from_date,$dataRow->to_date,$dataRow->status,$dataRow->created_at,$dataRow->updated_at);
        }

        $export = new ExportData($headArr,$dataArr);
        return Excel::download($export, 'fuel_setting_import.xlsx');
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

    public function list()
    {
        $fuelSetting = cache('fuelSetting', function () {
            return FuelSettingImportMaster::orderBy('id','DESC')->paginate(10);
        });
        return view('admin.fuel-setting-import.list',[
            'fuelSetting' => $fuelSetting
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
        $fuel = $request->all();

        $client = CustomerAccount::select('name','code')->where('name',$request->client)
        ->orWhere('code', $request->client_code)->first();
        if (!$client) {
            return back()->with('error', 'Please Select Client from the List')->withInput();
        }
        $network = NetworkMaster::where('code',$request->network)->first();
        if(!$network){
            return back()->with('error', 'Please Select Network from the List')->withInput();
        }

        if(!empty($request->id))
        {
            $rules = [
                'client_name'    => 'required',
                'network'        => 'required|unique:fuel_setting_import_masters,network,'.$request->id,
                'amount'         => 'required|numeric',
                'from_date'      => 'required',
                'to_date'        => 'required'
            ]; 
            
            $validation = Validator::make($fuel, $rules);   

            if($validation->fails())
            {
                $messages = $validation->errors();
                return redirect()->route('fuel-setting-index')->withErrors($messages)->withInput();
            }
            $fuel = FuelSettingImportMaster::find($request->id);
            $fuel->client_name              = $request->client_name;
            $fuel->network                  = $request->network; 
            $fuel->amount                   = $request->amount;
            $fuel->from_date                = $request->from_date; 
            $fuel->to_date                  = $request->to_date;
            $fuel->save();
        }
        else
        {
            $rules = [
                'client_name'    => 'required',
                'network'        => 'required|unique:fuel_setting_import_masters',
                'amount'         => 'required|numeric',
                'from_date'      => 'required',
                'to_date'        => 'required'
            ]; 
            
            $validation = Validator::make($fuel, $rules);   

            if($validation->fails())
            {
                $messages = $validation->errors();
                return redirect()->route('fuel-setting-index')->withInput()->withErrors($messages)->with('error','All fields are required!');
            }
         
            $fuel = new FuelSettingImportMaster([ 
                "client_name"              => $request->client_name,
                "network"                  => $request->network, 
                "amount"                   => $request->amount, 
                "from_date"                => $request->from_date, 
                "to_date"                  => $request->to_date
            ]);
            $fuel->save();
        }
        return redirect()->route('fuel-setting-import-index')->with('success','Fuel Setting Import added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FuelSettingImportMaster  $fuelSettingImportMaster
     * @return \Illuminate\Http\Response
     */
    public function show(FuelSettingImportMaster $fuelSettingImportMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FuelSettingImportMaster  $fuelSettingImportMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(FuelSettingImportMaster $fuelSettingImportMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FuelSettingImportMaster  $fuelSettingImportMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FuelSettingImportMaster $fuelSettingImportMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FuelSettingImportMaster  $fuelSettingImportMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $fuelSetting = FuelSettingImportMaster::find($id);
        if($fuelSetting){
            $fuelSetting->delete();
            return redirect()->route('fuel-setting-import-index')->with('danger', 'Fuel Import Data deleted successfully!');
        }
        else{
            return redirect()->route('fuel-setting-import-index')->with('danger', 'Data Not Found!');
        }
    }
}
