<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Helper\CustomHelper;
use App\Models\CurrencyMaster;
use Excel;
use Illuminate\Http\Request;
use Validator;

class CurrencyMasterController extends Controller
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
                $check_data = CurrencyMaster::where(array('code' => $code))->first();
            } else {
                $check_data = CurrencyMaster::orWhere(array('code' => $search))->orWhere('name', 'like', '%' . $search . '%')->first();
            }
            $return = array();

            if (!empty($check_data)) {
                $return['id'] = $check_data->id;
                $return['code'] = $check_data->code;
                $return['name'] = $check_data->name;
                $return['status'] = '200';
                $return['message'] = 'currencymaster Found!';
            } else {
                $return['id'] = '';
                $return['code'] = '';
                $return['name'] = '';
                $return['state'] = '';
                $return['country'] = '';
                $return['status'] = '400';
                $return['message'] = 'currencymaster does not exist!';
            }
            return json_encode($return);
        }

        return view('admin.currencymaster.index');
    }
    function list() {
        $currencymaster = cache('currencymaster', function () {
            return CurrencyMaster::paginate(10);
        });
        return view('admin.currencymaster.list', [
            'currencymaster' => $currencymaster,
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
        $currencymaster = $request->all();
        if ($request->id) {

            $rules = [
                'code' => 'required|unique:currency_masters,code,' . $request->id,
                'name' => 'required|unique:currency_masters,name,' . $request->id,
            ];

            $validation = Validator::make($currencymaster, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/currencymaster-index')->withErrors($messages)->with('error', 'All fields are required!')->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $data = array(
                "code" => $request->code,
                "name" => $request->name,
                "slug" => $slug,
            );
            CurrencyMaster::where('id', $request->id)->update($data);
        } else {
            $rules = [
                'code' => 'required|unique:currency_masters,code',
                'name' => 'required|unique:currency_masters,name',
            ];

            $validation = Validator::make($currencymaster, $rules);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect('/currencymaster-index')->withErrors($messages)->with('error', 'All fields are required!')->withInput();
            }
            $slug = CustomHelper::getSlugOfString($request->name);
            $currencymaster = new CurrencyMaster;
            $currencymaster->code = $request->code;
            $currencymaster->name = $request->name;
            $currencymaster->slug = $slug;
            $currencymaster->save();
        }
        return redirect()->route('currencymaster-index')->with('success', 'Currency added Successfully!');
    }
    public function export()
    {
        $headArr[] = array('Code', 'Name', 'Status', 'Added Date', 'Updated Date');
        $data = CurrencyMaster::select('code', 'name', 'status', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $dataArr[] = array($dataRow->code, $dataRow->name, $dataRow->status, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'currency_master.xlsx');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $currency = CurrencyMaster::find($id);
        if ($currency) {
            $currency->delete();
            return redirect()->route('currencymaster-index')->with('error', 'Currency Master Data deleted successfully!');
        } else {
            return redirect()->route('currencymaster-index')->with('error', 'Currency Master Not Found!');
        }
    }
    /**
     * Display the specified resource.
     **
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
}
