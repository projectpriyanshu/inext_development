<?php

namespace App\Http\Controllers;

use App\Models\CashEntry;
use App\Models\CustomerAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CashEntryController extends Controller
{
    public function index()
    {
        return view('admin.outbound.cash_entry.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $cid = CustomerAccount::where(['code' => $request->customer_code, 'name' => $request->customer_name])->first();
        $rules = [
            'awb_no' => 'required',
            'customer_name' => 'required',
            'customer_code' => 'required',
            'consignor' => 'required',
            'address' => 'required',
            'cash_amount' => 'required',
            'received_amt' => 'required',
            'recover' => 'required',
            'refund' => 'required',
            'date' => 'required',
            'rcpt_no' => 'required',
            'balance' => 'required',
            'remark' => 'required',
        ];

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            $message = $validation->errors();
            return redirect()->back()->withErrors($message)->with('error', 'All fields are required!')->withInput();
        } else {

            $cash = new CashEntry;

            $cash->awb_no = $request->awb_no;
            $cash->customer_id = $cid->id;
            $cash->consignor = $request->consignor;
            $cash->address = $request->address;
            $cash->cash_amount = $request->cash_amount;
            $cash->received_mt = $request->received_amt;
            $cash->recover = $request->recover;
            $cash->refund = $request->refund;
            $cash->receive_date = $request->date;
            $cash->rcpt_no = $request->rcpt_no;
            $cash->balance = $request->balance;
            $cash->remark = $request->remark;

            $cash->save();


            return redirect()->back()->with('success', 'Data added successfully!');
        }
    }

    public function searchCustomer(Request $request)
    {
        $key = $request->key;

        $check_data = CustomerAccount::where('name', 'like', '%' . $key . '%')->get();
        foreach ($check_data as $data) {
            $response[] = array("customer_code"   => $data->code, "label"   => $data->name);
        }
        return response()->json($response);
    }
}

  