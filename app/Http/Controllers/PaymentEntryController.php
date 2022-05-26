<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreditDetails;
use App\Models\Summary;
use App\Models\CustomerDetail;
use App\Models\ReceiptAmount;
use App\Models\ReceiptNo;
use App\Models\CustomerAccount;
use Illuminate\Support\Facades\Validator;

class PaymentEntryController extends Controller
{
    public function index(Request $request)
    {
        $code = $request->code;
        if (!empty($code)) {
        }

        return view('admin.account.payment_entry.index');
    }

    public function store(Request $request)
    {
        $customer_detail = $request->all();
        $ca = CustomerAccount::where(['code' => $request->customer_code, 'name' => $request->customer_name])->first();

        $rule = [
            'customer_code' => 'required',
            'customer_name' => 'required',
            'branch' => 'required',
            'amount' => 'required',
            'cash' => 'required',
            'cheque' => 'required',
            'bankname' => 'required',
            'receipt' => 'required',
            'debit_amt' => 'required',
            'credit_amt' => 'required',
            'debit_no' => 'required',
            'credit_no' => 'required',
            'receipt_no' => 'required',
            'date' => 'required',
            'opening_balance' => 'required',
            'total_sales' => 'required',
            'total_receipt' => 'required',
            'total_debit' => 'required',
            'total_credit' => 'required',
            'total_balance' => 'required',
            'remark' => 'required',
            'verify_remark' => 'required',
        ];
        $validation = Validator::make($customer_detail, $rule);
        if ($validation->fails()) {
            $message = $validation->errors();
            return redirect()->back()->withErrors($message)->with('error', 'All fields are required!')->withInput();
        } else {
            // customer details
            $customerdetails = new CustomerDetail;
            $customerdetails->id = $request->id;
            $customerdetails->customer_id = $ca->id;
            $customerdetails->branch = $request->branch;
            $customerdetails->save();

            //receipt amount
            $receiptamt = new ReceiptAmount;
            $receiptamt->payment_customer_id = $customerdetails->id;
            $receiptamt->amount = $request->amount;
            $receiptamt->mode = $request->cash;
            $receiptamt->cheque_no = $request->cheque;
            $receiptamt->bank_name = $request->bankname;
            $receiptamt->save();

            //credit detail
            $creditdetail = new CreditDetails;
            $creditdetail->payment_customer_id = $customerdetails->id;
            $creditdetail->receipt_type = $request->receipt;
            $creditdetail->debit_amt = $request->debit_amt;
            $creditdetail->credit_amt = $request->credit_amt;
            $creditdetail->debit_no = $request->debit_no;
            $creditdetail->credit_no = $request->credit_no;
            $creditdetail->save();

            //receipt no
            $recieptno = new ReceiptNo;
            $recieptno->payment_customer_id = $customerdetails->id;
            $recieptno->receipt_no = $request->receipt_no;
            $recieptno->date = $request->date;
            $recieptno->save();

            //summary
            $summary = new Summary;
            $summary->payment_customer_id = $customerdetails->id;
            $summary->opening_balance = $request->opening_balance;
            $summary->total_sales = $request->total_sales;
            $summary->total_receipt = $request->total_receipt;
            $summary->total_debit = $request->total_debit;
            $summary->total_credit = $request->total_credit;
            $summary->total_balance = $request->total_balance;
            $summary->remark = $request->remark;
            $summary->verify_remark = $request->verify_remark;
            $summary->save();
            return redirect()->back()->with('success', 'Data added successfully!');
        }
    }
}
