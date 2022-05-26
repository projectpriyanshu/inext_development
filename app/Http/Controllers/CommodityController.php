<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commodity;
use App\Helper\CustomHelper;
use App\Exports\ExportData;
use Excel;
use Session;

class CommodityController extends Controller
{
    public function index()
    {
        return view('admin/commodity/index');
    }

    public function add(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $this->validate($request, [
                'code'  =>  'required|max:250|unique:commodities,code,' . $id,
                'name'  =>  'required|max:250|unique:commodities,name,' . $id,
                'status'  =>  'required|max:10',
            ]);
            $data = array(
                'code' => $request->code,
                'name' => $request->name,
                'slug' => CustomHelper::getSlugOfString($request->name),
                'status' => $request->status,
            );
            Commodity::where('id', $id)->update($data);
            Session::flash('success', 'updated successfully!');
        } else {
            $this->validate($request, [
                'code'  =>  'required|max:250|unique:commodities,code',
                'name'  =>  'required|max:250|unique:commodities,name',
                'status'  =>  'required|max:10',
            ]);
            $com = new Commodity;
            $com->code = $request->code;
            $com->name = $request->name;
            $com->slug = CustomHelper::getSlugOfString($request->name);
            $com->status = $request->status;
            $com->save();
            Session::flash('success', 'Added successfully!');
        }
        return redirect()->back();
    }

    public function list()
    {
        $data = Commodity::select('id', 'code', 'name', 'status')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin/commodity/list')->with(['data' => $data]);
    }

    public function search(Request $request)
    {

        if ($request->search) {
            $data = Commodity::select('id', 'code', 'name', 'status')->where('name', 'like', $request->search . '%')->first();
            if ($data) {
                return response()->json(array('status' => true, 'data' => $data));
            } else {
                return response()->json(array('status' => false, 'message' => 'No data found!'));
            }
        } else if ($request->code) {
            $data = Commodity::select('id', 'code', 'name', 'status')->where('code', 'like', $request->code . '%')->first();
            if ($data) {
                return response()->json(array('status' => true, 'data' => $data));
            } else {
                return response()->json(array('status' => false, 'message' => 'No data found!'));
            }
        } else {
            return response()->json(array('status' => false, 'message' => 'Invalid Search!'));
        }
    }

    public function export()
    {
        $headArr[] = array('Code', 'Name', 'Status', 'Added Date', 'Last Updated Date');
        $data = Commodity::select('code', 'name', 'status', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $status = '';
            if ($dataRow->status == 1) {
                $status = "Enable";
            }
            if ($dataRow->status == 0) {
                $status = "Disable";
            }
            $dataArr[] = array($dataRow->code, $dataRow->name, $status, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'commodity.xlsx');
    }
}
