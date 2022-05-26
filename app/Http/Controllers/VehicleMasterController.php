<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\VehicleMaster;
use App\Helper\CustomHelper;
use Illuminate\Http\Request;
use App\Exports\ExportData;
use Excel;

class VehicleMasterController extends Controller
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
                $check_data = VehicleMaster::where(array('code'=>$code))->first();
            }
            else
            {
                $check_data = VehicleMaster::orWhere(array('code'=>$search))->orWhere('name','like','%'.$search.'%')->first();
            }
            $return = array();
            if(!empty($check_data))
            {
                $return['id'] = $check_data->id;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['status'] = '200';
                $return['message'] = 'Vehicle Found!';
            }
            else
            {
                $return['id'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['status'] = '400';
                $return['message'] = 'Vehicle does not exist!';
            }
            return json_encode($return);
        }
        
      return view('admin.vehicle.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $VehicleMaster = cache('Vehicle', function () {
            return VehicleMaster::paginate(10);
        });
        return view('admin.vehicle.list',[
            'vehicle' => $VehicleMaster
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
        $vehicle = $request->all();
        if(!empty($request->id))
        {
            $rules = [
                'code' => 'required|max:20|unique:vehicle_masters,code,'.$request->id,
                'name' => 'required|max:20|unique:vehicle_masters,name,'.$request->id,
               
            ]; 
            
            $validation = Validator::make($vehicle, $rules);   

            if($validation->fails())
            {
                $messages = $validation->errors();
                return redirect('/vehicle-index')->withErrors($messages);
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $vehicle = VehicleMaster::find($request->id);
            $vehicle->code              = $request->code;
            $vehicle->name              = $request->name; 
            $vehicle->slug              = $slug;
            $vehicle->save();
        }
        else
        {
            $rules = [
                'code'              => 'required|unique:vehicle_masters|max:20',  
                'name'              => 'required|unique:vehicle_masters|max:20', 
            ]; 
            
            $validation = Validator::make($vehicle, $rules);   

            if($validation->fails())
            {
                $messages = $validation->errors();
                return redirect('/vehicle-index')->withErrors($messages)->with('error','All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $vehicle = new VehicleMaster([ 
                "code"              => $request->code,
                "name"              => $request->name, 
                "slug"              => $slug,  
            ]);
            $vehicle->save();
        }
        return redirect('/vehicle-index')->with('success', 'Vehicle added successfully!');
    }

    //export vehicle

    public function export()
    {
        $headArr[] = array('Code','Name','Status','Added Date','Updated Date');
        $data = VehicleMaster::select('code','name','status','created_at','updated_at')->orderBy('created_at','desc')->get();
        $dataArr[] = array();
        foreach($data as $dataRow){
            $dataArr[] = array($dataRow->code,$dataRow->name,$dataRow->status,$dataRow->created_at,$dataRow->updated_at);
        }

        $export = new ExportData($headArr,$dataArr);
        return Excel::download($export, 'vehicle_master.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleMaster  $vehicleMaster
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleMaster $vehicleMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleMaster  $vehicleMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleMaster $vehicleMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleMaster  $vehicleMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleMaster $vehicleMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleMaster  $vehicleMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleMaster $vehicleMaster)
    {
        //
    }
}