<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\NetworkMaster;
use App\Helper\CustomHelper;
use Illuminate\Http\Request;
use App\Exports\ExportData;
use Excel;

class NetworkMasterController extends Controller
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
        
        if(!empty($code) || !empty($search))
        {
            if(!empty($code))
            {
                $check_data = NetworkMaster::where(array('code'=>$code))->first();
            }
            else
            {
                $check_data = NetworkMaster::orWhere(array('code'=>$search))->orWhere('name','like','%'.$search.'%')->orWhere(array('map_code'=>$search))->first();
            }
            $return = array();
            if(!empty($check_data))
            {
                $return['id'] = $check_data->id;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['map_code'] = $check_data->map_code;
                $return['status'] = '200';
                $return['message'] = 'Network Found!';
            }
            else
            {
                $return['id'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['map_code'] = '';
                $return['status'] = '400';
                $return['message'] = 'Network does not exist!';
            }
            return json_encode($return);
        }
        return view('admin.network.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $network = cache('network', function () {
            return NetworkMaster::orderBy('id','DESC')->paginate(10);
        });
        return view('admin.network.list',[
            'network' => $network
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
        $network = $request->all();
        //dd($network);
        if(!empty($request->id))
        {
            $rules = [
                'code' => 'required|max:20|unique:network_masters,code,'.$request->id,
                'name' => 'required|max:20|unique:network_masters,name,'.$request->id,
                'map_code' => 'required|max:20|unique:network_masters,map_code,'.$request->id,
            ]; 
            
            $validation = Validator::make($network, $rules);   
           
            if($validation->fails())
            {
                print_r($request->old());
                exit;
                $messages = $validation->errors();
                return redirect()->route('network-index')->withErrors($messages)->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $network = NetworkMaster::find($request->id);
            $network->code              = $request->code;
            $network->name              = $request->name; 
            $network->slug              = $slug;
            $network->map_code          = $request->map_code; 
            $network->save();
        }
        else
        {
            $rules = [
                'code'              => 'required|unique:network_masters|max:20',
                'name'              => 'required|unique:network_masters|max:20',
                'map_code'    => 'required|unique:network_masters|max:20',
            ]; 
            
            $validation = Validator::make($network, $rules);   

            if($validation->fails())
            {
                
                $messages = $validation->errors();
                return redirect()->route('network-index')->withErrors($messages)->with('error','All fields are required!')->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $network = new NetworkMaster([ 
                "code"              => $request->code,
                "name"              => $request->name, 
                "slug"              => $slug, 
                "map_code"          => $request->map_code, 
            ]);
            $network->save();
        }
        return redirect()->route('network-index')->with('success','Network added successfully!');
    }
    /**
     * Export Data
     */
    public function export() 
    {
        $headArr[] = array('Code','Name','Map Code','Status','Added Date','Updated Date');
        $data = NetworkMaster::select('code','name','map_code','status','created_at','updated_at')->orderBy('created_at','desc')->get();
        $dataArr[] = array();
        foreach($data as $dataRow){
            $dataArr[] = array($dataRow->code,$dataRow->name,$dataRow->map_code,$dataRow->status,$dataRow->created_at,$dataRow->updated_at);
        }

        $export = new ExportData($headArr,$dataArr);
        return Excel::download($export, 'network_master.xlsx');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NetworkMaster  $networkMaster
     * @return \Illuminate\Http\Response
     */
    public function show(NetworkMaster $networkMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NetworkMaster  $networkMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(NetworkMaster $networkMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NetworkMaster  $networkMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NetworkMaster $networkMaster)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NetworkMaster  $networkMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(NetworkMaster $networkMaster)
    {
        //
    }
    
    
}
