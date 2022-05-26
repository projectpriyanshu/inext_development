<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CustomHelper;
use App\Models\NetworkMaster;
use App\Models\CustomerAccount;
use App\Models\State;
use App\Exports\ExportData;
use Excel;
use App\Models\User;
use App\Models\City;
use App\Models\Country;

class CommonController extends Controller
{
    public function searchCity(Request $request)
    {
        $search = $request->search;
        $check_data = City::orderby('city_name', 'asc')
        ->select('cities.code as city_code', 'cities.name as city_name', 'states.code as state_code', 'states.name as state_name')
        ->join('states', 'states.id', 'cities.state_id')
        ->where('cities.name', 'like', $search . '%')
        ->get();
        $response = array();
        foreach ($check_data as $data) {
            $response[] = array("city_code" => $data->city_code, "label" => $data->city_name, "state_code" => $data->state_code, "state" => $data->state_name);
        }
        return response()->json($response);
    }

    /**
     * Search Client
     */
    public function searchClient(Request $request)
    {  
        $search = $request->search;
        
        if($search == ''){
           $check_data = CustomerAccount::select('customer_accounts.code as client_code','customer_accounts.name as client_name')
           ->get();
        }else{
           $check_data = CustomerAccount::select('customer_accounts.code as client_code','customer_accounts.name as client_name')
           ->where('name', 'like', '%' .$search . '%')
           ->get();
        }
      
        $response = array();
        foreach($check_data as $data){
           $response[] = array("client_code"=>$data->client_code,"label"=>$data->client_name);
        }
  
        return response()->json($response);
     }
     /**
      * Search Network
      */
      public function searchNetwork(Request $request)
    {  
        $search = $request->search;
        if($search == ''){
           $check_data = NetworkMaster::select('network_masters.code as network')
           ->get();
        }else{
            $check_data = NetworkMaster::select('network_masters.code as network')
           ->where('code', 'like', '%' .$search . '%')
           ->get();
        }
  
        $response = array();
        foreach($check_data as $data){
           $response[] = array("label"=>$data->network);
        }
  
        return response()->json($response);
     }


     public static function verifyGstStatewise(Request $request){
        $gst = $request->gst;
        $state = $request->state;
        $statecode = $request->statecode;
        $gstStateCode = substr($gst, 0, 2);
        $data = State::where(['code'=>$statecode,'name'=>$state,'gst_state_code'=>$gstStateCode])->first();
        if($data){
            return response()->json(array('status'=>true,'data'=>$data));
        }else{
            return response()->json(array('status'=>false,'message'=>'Invalid GST No according to state you have selected! Please enter an valid GST No.'));
        }

     }

     public function exportData(){

        $headArr[] = array('Name','Email','Date');
        $data = User::select('name','email','created_at')->orderBy('created_at','desc')->get();
        $dataArr[] = array();
        foreach($data as $dataRow){
            $dataArr[] = array($dataRow->name,$dataRow->email,$dataRow->created_at);
        }

        $export = new ExportData($headArr,$dataArr);
        return Excel::download($export, 'export_data.xlsx');

     }

    public function searchClientAutomation(Request $request){

        $search = $request->search;
        $check_data = CustomerAccount::select('id','code','name')->orderby('name')->where('name','like',$search.'%')->get();
        $response = array();
        foreach ($check_data as $data){
            $response[] = array("id"=>$data->id,"label" => $data->code.'-'.$data->name);
        }
        return response()->json($response);

     }

     public function searchFromState(Request $request){
        $search = $request->search;
        $check_data = State::select('id','code','name')->orderby('name')->where('name','like',$search.'%')->get();
        $response = array();
        foreach ($check_data as $data){
            $response[] = array("id"=>$data->id,"label" => $data->code.'-'.$data->name);
        }
        return response()->json($response);
     }

     public function searchFromCity(Request $request){
        $search = $request->search;
        $check_data = City::select('id','code','name')->orderby('name')->where('name','like',$search.'%')->get();
        $response = array();
        foreach ($check_data as $data){
            $response[] = array("id"=>$data->id,"label" => $data->code.'-'.$data->name);
        }
        return response()->json($response);
     }

    public function searchFromCountry(Request $request){
        $search = $request->search;
        $check_data = Country::select('id','code','name')->orderby('name')->where('name','like',$search.'%')->get();
        $response = array();
        foreach ($check_data as $data){
            $response[] = array("id"=>$data->id,"label" => $data->code.'-'.$data->name);
        }
        return response()->json($response);
    }

}
