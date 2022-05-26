<?php

namespace App\Http\Controllers;

use App\Models\ServiceMaster;
use Illuminate\Http\Request;
use App\Helper\CustomHelper;
use App\Exports\ExportData;
use Excel;
use Validator;
use Session;

class ServiceMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.service.index');
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
                'code'  =>  'required|max:20|unique:service_masters,code,'.$request->id,
                'name'  =>  'required|max:20|unique:service_masters,name,'.$request->id,
            ],[
                'code.required'  => 'Code is required field!',
                'code.unique'  => 'Code must be unique!',
                'code.max'  => 'Code length must be less than 20 charecter!',
                'name.required'  => 'Name is required field!',
                'name.unique'  => 'Name must be unique!',
                'name.max'  => 'Name length must be less than 20 charecter!',
            ]);
            if($validation->fails())
            {
                $messages = $validation->errors();
                return redirect()->back()->withErrors($messages)->withInput();
            }
            $data = array(
                'code'  =>  $request->code,
                'name' => $request->name,
            );
            ServiceMaster::where('id',$request->id)->update($data);
            Session::flash('success','Updated successfully!');
        }else{
            $validation = Validator::make($request->all(),[
                'code'  =>  'required|max:20|unique:service_masters,code',
                'name'  =>  'required|max:20|unique:service_masters,name',
            ],[
                'code.required'  => 'Code is required field!',
                'code.unique'  => 'Code must be unique!',
                'code.max'  => 'Code length must be less than 20 charecter!',
                'name.required'  => 'Name is required field!',
                'name.unique'  => 'Name must be unique!',
                'name.max'  => 'Name length must be less than 20 charecter!',
            ]);
            if($validation->fails())
            {
                $messages = $validation->errors();
                return redirect()->back()->withErrors($messages)->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $s = new ServiceMaster;
            $s->code = $request->code;
            $s->name = $request->name;
            $s->slug = $slug;
            $s->save();
            Session::flash('success','Added successfully!');
        }
        return redirect()->back();

    }

    //export service
    public function export(){
        $headArr[] = array('Code','Name','Status','Added Date','Updated Date');
        $data = ServiceMaster::select('code','name','status','created_at','updated_at')->orderBy('created_at','desc')->get();
        $dataArr[] = array();
        foreach($data as $dataRow){
            $dataArr[] = array($dataRow->code,$dataRow->name,$dataRow->status,$dataRow->created_at,$dataRow->updated_at);
        }

        $export = new ExportData($headArr,$dataArr);
        return Excel::download($export, 'service_master.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceMaster  $serviceMaster
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceMaster $serviceMaster)
    {
        $data = ServiceMaster::orderBy('name')->paginate(10);
        return view('admin/service/list')->with(['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceMaster  $serviceMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceMaster $serviceMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceMaster  $serviceMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceMaster $serviceMaster)
    {
        //
    }

    public function searchServiceMaster(Request $request){
        $searchkey = $request->searchkey;
        $searchcode = $request->searchcode;

        if($searchkey){
            $data = ServiceMaster::select('id','code','name','slug')->orWhere('code',$searchkey)->orWhere('name','like','%'.$searchkey.'%')->first();
        }else{
            $data = ServiceMaster::select('id','code','name','slug')->where('code',$searchcode)->first();
        }

        if ($data) {
            return response()->json(array('status'=>200,'data'=>$data));
        }else{
            return response()->json(array('status'=>400,'message'=>'Sorry! No data found!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceMaster  $serviceMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceMaster $serviceMaster)
    {
        //
    }
}
