<?php

namespace App\Http\Controllers;

use App\Models\ForwarderMaster;
use App\Models\ForwarderServiceMaster;
use Illuminate\Http\Request;
use App\Helper\CustomHelper;
use Validator;
use Session;
use DB;
use App\Exports\ExportData;
use Excel;

class ForwarderServiceMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/forwarder_service/index');
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
    public function store(Request $request){

        if($request->id){
            $validation = Validator::make($request->all(),[
                'code'  =>  'required|max:20|unique:forwarder_service_masters,code,'.$request->id,
                'name'  =>  'required|max:20|unique:forwarder_service_masters,name,'.$request->id,
                'forwarder_name'  =>  'required',
                'forwarder_code'  =>  'required',
            ],[
                'code.required'  => 'Code is required field!',
                'code.unique'  => 'Code must be unique!',
                'code.max'  => 'Code length must be less than 20 charecter!',
                'name.required'  => 'Name is required field!',
                'name.unique'  => 'Name must be unique!',
                'name.max'  => 'Name length must be less than 20 charecter!',
                'forwarder_name.required' => 'forwarder name is required',
                'forwarder_code.required' => 'forwarder code is required'
            ]);
            if($validation->fails())
            {
                $messages = $validation->errors();
                return redirect()->back()->withErrors($messages)->withInput();
            }

            $forwarder_id = ForwarderMaster::where(['code'=>$request->forwarder_code,'name'=>$request->forwarder_name])->first()->id;
            $data = array(
                'code'  =>  $request->code,
                'name' => $request->name,
                'forwarder_id' => $forwarder_id,
            );
            ForwarderServiceMaster::where('id',$request->id)->update($data);
            Session::flash('success','Updated successfully!');
        }else{
            $validation = Validator::make($request->all(),[
                'code'  =>  'required|max:20|unique:forwarder_service_masters,code',
                'name'  =>  'required|max:20|unique:forwarder_service_masters,name',
                'forwarder_name'  =>  'required',
                'forwarder_code'  =>  'required',
            ],[
                'code.required'  => 'Code is required field!',
                'code.unique'  => 'Code must be unique!',
                'code.max'  => 'Code length must be less than 20 charecter!',
                'name.required'  => 'Name is required field!',
                'name.unique'  => 'Name must be unique!',
                'name.max'  => 'Name length must be less than 20 charecter!',
                'forwarder_name.required' => 'forwarder name is required',
                'forwarder_code.required' => 'forwarder code is required'
            ]);
            if($validation->fails())
            {
                $messages = $validation->errors();
                return redirect()->back()->withErrors($messages)->withInput();
            }

            $forwarder_id = ForwarderMaster::where(['code'=>$request->forwarder_code,'name'=>$request->forwarder_name])->first()->id;

            $slug = CustomHelper::getSlugOfString($request->name);
            $s = new ForwarderServiceMaster;
            $s->code = $request->code;
            $s->name = $request->name;
            $s->slug = $slug;
            $s->forwarder_id = $forwarder_id;
            $s->save();
            Session::flash('success','Added successfully!');
        }
        return redirect()->back();
    }


    public function searchForwarderService(Request $request){
        $searchkey = $request->searchkey;
        $searchcode = $request->searchcode;

        if($searchkey){
            $data = DB::table('forwarder_service_masters')
                    ->join('forwarder_masters','forwarder_service_masters.forwarder_id','=','forwarder_masters.id')
                    ->select('forwarder_service_masters.id','forwarder_service_masters.code','forwarder_service_masters.name','forwarder_masters.code as forwarder_code','forwarder_masters.name as forwarder_name')
                    ->orWhere('forwarder_service_masters.code',$searchkey)
                    ->orWhere('forwarder_service_masters.name','like','%'.$searchkey.'%')
                    ->first();
        }else{
            $data = DB::table('forwarder_service_masters')
                    ->join('forwarder_masters','forwarder_service_masters.forwarder_id','=','forwarder_masters.id')
                    ->select('forwarder_service_masters.id','forwarder_service_masters.code','forwarder_service_masters.name','forwarder_masters.code as forwarder_code','forwarder_masters.name as forwarder_name')
                    ->where('forwarder_service_masters.code',$searchcode)->first();
        }

        if ($data) {
            return response()->json(array('status'=>200,'data'=>$data));
        }else{
            return response()->json(array('status'=>400,'message'=>'Sorry! No data found!'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ForwarderServiceMaster  $forwarderServiceMaster
     * @return \Illuminate\Http\Response
     */
    public function show(ForwarderServiceMaster $forwarderServiceMaster)
    {
        $data = ForwarderServiceMaster::orderBy('name')->paginate(10);
        return view('admin/forwarder_service/list')->with(['data'=>$data]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ForwarderServiceMaster  $forwarderServiceMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ForwarderServiceMaster $forwarderServiceMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ForwarderServiceMaster  $forwarderServiceMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ForwarderServiceMaster $forwarderServiceMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ForwarderServiceMaster  $forwarderServiceMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForwarderServiceMaster $forwarderServiceMaster)
    {
        //
    }
    
    public function searchForwarder(Request $request){
        $key = $request->key;
        $data = ForwarderMaster::select('id','name','code')->where('name','like',$key.'%')->limit(10)->get();

        $sugestion = "<div class='bg-dark search-suggestion'>";
        foreach($data as $dataRow){
            $sugestion = $sugestion."<div class='text-white border-bottom' onclick=searchData('".str_replace(' ','_',$dataRow->name)."','".$dataRow->code."')>".$dataRow->name."</div>";
        }
        $sugestion = $sugestion."</div>";

        return response()->json(array('data'=>$sugestion));

        // return view('admin/forwarder_service/suggestion')->with(['data'=>$data]);
    }
    public function export(){
        $headArr[] = array('Code','Name','Forwarder Name','Status','Added Date','Updated Date');
        $data = DB::table('forwarder_service_masters')
                ->join('forwarder_masters','forwarder_service_masters.forwarder_id','=','forwarder_masters.id')
                ->select('forwarder_service_masters.code','forwarder_service_masters.name','forwarder_service_masters.status','forwarder_service_masters.created_at','forwarder_service_masters.updated_at','forwarder_masters.name as forwarder_name')->orderBy('forwarder_service_masters.created_at','desc')->get();
        $dataArr[] = array();
        foreach($data as $dataRow){
            $dataArr[] = array($dataRow->code,$dataRow->name,$dataRow->forwarder_name,$dataRow->status,$dataRow->created_at,$dataRow->updated_at);
        }

        $export = new ExportData($headArr,$dataArr);
        return Excel::download($export, 'forwarder_service_master.xlsx');
    }
}
