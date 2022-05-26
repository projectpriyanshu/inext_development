<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\RouteMaster;
use App\Helper\CustomHelper;
use Illuminate\Http\Request;
use App\Exports\ExportData;
use Excel;



class RouteMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $code = $request->code;
        $search = $request->searchkey;
        if (!empty($code) || !empty($search)) {
            if (!empty($code)) {
                $check_data =RouteMaster::where(array('code' => $code))->first();
            } else {
                $check_data = RouteMaster::orWhere(array('code' => $search))->orWhere('name', 'like', '%' . $search . '%')->first();
            }
            $return = array();

            if (!empty($check_data)) {
                $return['id']               = $check_data->id;
                $return['code']             = $check_data->code;
                $return['name']             = $check_data->name;
                $return['status']           = '200';
                $return['message']          = 'Route Found!';
            } else {
                $return['id']               = '';
                $return['code']             = '';
                $return['name']             = '';
                $return['status']           = '400';
                $return['message']          = 'Route does not exist!';
            }
            return json_encode($return);
        }

        return view('admin.route.index');
    }
    public function list()
    {
        $route = cache('route', function () {
            return RouteMaster::paginate(10);
        });
        return view('admin.route.list', [
            'route' => $route
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $route = $request->all();
        if ($request->id) {
            $rules = [
                'code'              => 'required|unique:route_masters,code,'.$request->id,
                'name'              => 'required|unique:route_masters,name,'.$request->id,
            ];

            $validation = Validator::make($route, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/route-index')->withErrors($messages)->withInput()->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $data = array(
                "code"          => $request->code,
                "name"          => $request->name,
                "slug"          => $slug,
            );
            RouteMaster::where('id', $request->id)->update($data);
          
        } else {
            $rules = [
                'code'              => 'required|unique:route_masters',
                'name'              => 'required|unique:route_masters',
            ];

            $validation = Validator::make($route, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/route-index')->withErrors($messages)->withInput()->with('error', 'All fields are required!');
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $route              = new RouteMaster;
            $route->code        = $request->code;
            $route->name        = $request->name;
            $route->slug        = $slug;
            $route->save();
            
        }
        return redirect()->route('route-index')->with('success','Route added Successfully!');
    }
    public function export(){
        $headArr[] = array('Code','Name','Status','Added Date','Updated Date');
        $data = RouteMaster::select('code','name','status','created_at','updated_at')->orderBy('created_at','desc')->get();
        $dataArr[] = array();
        foreach($data as $dataRow){
            $dataArr[] = array($dataRow->code,$dataRow->name,$dataRow->status,$dataRow->created_at,$dataRow->updated_at);
        }

        $export = new ExportData($headArr,$dataArr);
        return Excel::download($export, 'route.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    
}
