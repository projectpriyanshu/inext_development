<?php

namespace App\Http\Controllers;

use App\Exports\CustomerListExport;
use App\Exports\ExportData;
use App\Models\City;
use App\Models\Country;
use App\Models\CustomerAccount;
use App\Models\CustomerAccountSetting;
use App\Models\CustomerAddress;
use App\Models\CustomerBankDetails;
use App\Models\CustomerCredit;
use App\Models\CustomerKycDocsDetails;
use App\Models\CustomerKycDocument;
use App\Models\CustomerManager;
use App\Models\CustomerSecurityCheck;
use App\Models\ForwarderMaster;
use App\Models\ServiceMaster;
use App\Models\State;
use DB;
use Excel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
use Validator;

class CustomerAccountController extends Controller
{
    public function index()
    {
        return view('admin/customer_account/index');
    }

    public function store(Request $request)
    {

        $id = $request->id;
        if ($id) {
            $validation = Validator::make($request->all(), [
                'type' => 'required',
                'name' => 'required|max:250',
                'slno1' => 'max:250',
                'slno2' => 'max:250',
                'business_type' => 'required',
                'code' => 'required|max:20|unique:customer_accounts,code,' . $id,
                'telephone' => 'required|max:12|unique:customer_addresses,telephone,' . $id,
                'billing_email' => 'required|email|max:255|unique:customer_addresses,billing_email,' . $id,
                'cs_email' => 'required|email|max:255|unique:customer_addresses,cs_email,' . $id,
                'website' => 'max:255|unique:customer_addresses,website,' . $id,
                'gst_no' => 'nullable|max:255',
                'pan_no' => 'required|max:255|unique:customer_accounts,pan_no,' . $id,
                'aadhar_no' => 'required|max:12|unique:customer_accounts,aadhar_no,' . $id,
                'passport_no' => 'nullable|max:255',
                'contact_person' => 'required',
                'address1' => 'required',
                'address2' => 'required',
                'address3' => 'required',
                'pincode' => 'required|numeric|max:6',
                'branch' => 'required',
                'opening_balance' => 'numeric',
                'credit_limit' => 'numeric',
                'credit_balance' => 'numeric',
                'bank_name' => 'required|max:250',
                'account_no' => 'required|max:250|unique:customer_bank_details,account_no,' . $id,
                'ifsc' => 'required|max:250',
                'bank_address' => 'required|max:250',
                'branch_office' => 'required|max:250',
                'total_sale' => 'numeric',
                'total_payment' => 'numeric',
                'total_debit_note' => 'numeric',
                'total_credit_note' => 'numeric',
                'outstanding' => 'numeric',
                'from_stock' => 'numeric',
                'to_stock' => 'numeric',
                'min_value' => 'numeric',
                'weight' => 'numeric',
            ]);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect()->back()->withErrors($messages)->withInput();
            }

            DB::beginTransaction();
            try {
                // Customer detal & GST no Pan No Subsec
                $accArr = array(
                    "type" => $request->type,
                    "serial_no1" => $request->slno1,
                    "serial_no2" => $request->slno2,
                    "business_type" => $request->business_type,
                    "name" => $request->name,
                    "code" => $request->code,
                    "gst_no" => $request->gst_no,
                    "pan_no" => $request->pan_no,
                    "iec_no" => $request->iec_no,
                    "aadhar_no" => $request->aadhar_no,
                    "passport_no" => $request->passport_no,
                );
                CustomerAccount::where('id', $id)->update($accArr);
                // Customer detal & GST no Pan No Subsec
                // address details
                $addArr = array(
                    "contact_person" => $request->contact_person,
                    "address1" => $request->address1,
                    "address2" => $request->address2,
                    "address3" => $request->address3,
                    "pincode" => $request->pincode,
                    "country_code" => $request->country_code,
                    "country" => $request->country,
                    "city_code" => $request->city_code,
                    "city" => $request->city,
                    "state_code" => $request->state_code,
                    "state" => $request->state,
                    "branch_code" => $request->branch_code,
                    "branch" => $request->branch,
                    "telephone" => $request->telephone,
                    "billing_email" => $request->billing_email,
                    "cs_email" => $request->cs_email,
                    "website" => $request->website,
                );
                CustomerAddress::where('customer_id', $id)->update($addArr);
                // address details
                // Manager section
                $manArr = array(
                    "finance_name" => $request->finance_name,
                    "finance_contact" => $request->finance_contact,
                    "finance_email" => $request->finance_email,
                    "authorized_name" => $request->authorized_name,
                    "authorized_contact" => $request->authorized_contact,
                    "authorized_email" => $request->authorized_email,
                    "sales_person" => $request->sales_person,
                    "sales_contact" => $request->sales_contact,
                    "sales_email" => $request->sales_email,
                );
                CustomerManager::where('customer_id', $id)->update($manArr);
                // Manager section

                //Security Check
                $file = $request->file('upload_file');
                if ($file) {
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('public/customer/security/'), $fileName);
                    $oldFile = CustomerKycDocument::where('customer_id', $id)->first();
                    // if ($oldFile) {
                    //     unlink(base_path('public/customer/security/' . $oldFile->upload));
                    // }
                    $secArr = array(
                        "security_status" => $request->security_status,
                        "check_no" => $request->check_no,
                        "amount" => $request->amount,
                        "textarea" => $request->textarea,
                        "upload" => $fileName,
                    );
                } else {
                    $secArr = array(
                        "security_status" => $request->security_status,
                        "check_no" => $request->check_no,
                        "amount" => $request->amount,
                        "textarea" => $request->textarea,
                    );
                }
                CustomerSecurityCheck::where('customer_id', $id)->update($secArr);
                //Security Check

                // Manager section
                $setArr = array(
                    "tariff" => $request->tariff,
                    "gst" => $request->gst,
                    "activate" => $request->activate,
                    "billing" => $request->billing,
                    "auto_email" => $request->auto_email,
                    "fuel_option" => $request->fuel_option,
                    "fuel_value" => $request->fuel_value,
                    "fuel_imp_option" => $request->fuel_imp_option,
                    "fuel_imp_value" => $request->fuel_imp_value,
                    "payment" => $request->payment,
                    "currency" => $request->currency,
                    "group_code1" => $request->group_code1,
                    "group_code2" => $request->group_code2,
                    "covid_charges" => $request->covid_charges,
                    "rate_markup" => $request->rate_markup,
                    "markup_type" => $request->markup_type,
                );
                CustomerAccountSetting::where('customer_id', $setArr)->update($setArr);
                // Manager section

                // Customer credit
                $crArr = array(
                    "credit_status" => $request->credit_status,
                    "opening_balance" => ($request->opening_balance == null) ? 0 : $request->opening_balance,
                    "credit_limit" => ($request->credit_limit == null) ? 0 : $request->credit_limit,
                    "credit_balance" => ($request->credit_balance == null) ? 0 : $request->credit_balance,
                    "notify" => $request->notify ? '0' : '1',
                    "total_sale" => ($request->total_sale == null) ? 0 : $request->total_sale,
                    "total_payment" => ($request->total_payment == null) ? 0 : $request->total_payment,
                    "total_debit_note" => ($request->total_debit_note == null) ? 0 : $request->total_debit_note,
                    "total_credit_note" => ($request->total_credit_note == null) ? 0 : $request->total_credit_note,
                    "outstanding" => ($request->outstanding == null) ? 0 : $request->outstanding,
                    "network" => $request->network,
                    "divisible" => $request->divisible,
                    "note" => $request->note,
                );
                CustomerCredit::where('customer_id', $id)->update($crArr);
                // Customer credit

                // Customer bank Details
                $bankArr = array(
                    "account_no" => $request->account_no,
                    "bank_name" => $request->bank_name,
                    "account_name" => $request->account_name,
                    "ifsc" => $request->ifsc,
                    "bank_address" => $request->bank_address,
                    "branch_office" => $request->branch_office,
                );
                CustomerBankDetails::where('customer_id', $id)->update($bankArr);
                // Customer bank Details

                // Kyc Doocuments
                $docsArr = array(
                    // "is_verified" => $request->is_verified,
                    "is_verified" => '1',
                    "verify_by" => $request->verify_by,
                    "verify_date_time" => $request->verify_date_time,
                    "remarks" => $request->remarks,
                    "open_by" => $request->open_by,
                    "modify_by" => $request->modify_by,
                );
                CustomerKycDocument::where('customer_id', $id)->update($docsArr);
                $dcsid = CustomerKycDocument::where('customer_id', $id)->first()->id;
                // add new docs
                $docsd = $request->document;
                $img = $request->file('image');
                for ($i = 0; $i < count($docsd); $i++) {
                    $dd = new CustomerKycDocsDetails;
                    $dd->kyc_docs_id = $docs->id;
                    $dd->document = $request->document[$i];
                    $dd->kyc_no = $request->documnet_no[$i];

                    $image = $img[$i];
                    $name = time() . '_' . $i . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/customer/kyc/');
                    $image->move($destinationPath, $name);
                    $dd->image = $name;

                    $dd->save();
                }
                // add new docs

                DB::commit();
                Session::flash('success', 'Customer Account updated successfully!');
                return back();
            } catch (Exception $e) {
                DB::rollBack();
                return back()->with('error', $e->getMessage())->withInput();
            }
        } else {
            $validation = Validator::make($request->all(), [
                'type' => 'required',
                'name' => 'required|max:250',
                'slno1' => 'max:250',
                'slno2' => 'max:250',
                'business_type' => 'required',
                'code' => 'required|max:250|unique:customer_accounts,code',
                'contact_person' => 'required',
                'address1' => 'required',
                'address2' => 'required',
                'address3' => 'required',
                'pincode' => 'required|numeric',
                'branch' => 'required',
                'telephone' => 'required|max:12|unique:customer_addresses,telephone',
                'billing_email' => 'required|email|max:255|unique:customer_addresses,billing_email',
                'cs_email' => 'required|email|max:255|unique:customer_addresses,cs_email',
                'website' => 'required|max:255|unique:customer_addresses,website',
                'gst_no' => 'nullable|max:255',
                'pan_no' => 'required|max:255|unique:customer_accounts,pan_no',
                'aadhar_no' => 'required|max:255|unique:customer_accounts,aadhar_no',
                'passport_no' => 'nullable|max:255',
                'opening_balance' => 'numeric',
                'credit_limit' => 'numeric',
                'credit_balance' => 'numeric',
                'bank_name' => 'required|max:250',
                'account_no' => 'required|max:250|unique:customer_bank_details,account_no',
                'ifsc' => 'required|max:250',
                'bank_address' => 'required|max:250',
                'branch_office' => 'required|max:250',
                'total_sale' => 'numeric',
                'total_payment' => 'numeric',
                'total_debit_note' => 'numeric',
                'total_credit_note' => 'numeric',
                'outstanding' => 'numeric',
                'from_stock' => 'numeric',
                'to_stoc' => 'numeric',
                'min_value' => 'numeric',
                'weight' => 'numeric',
            ]);

            if ($validation->fails()) {
                $messages = $validation->errors();
                return redirect()->back()->withErrors($messages)->withInput();
            }

            // Customer detal & GST no Pan No Subsec
            DB::beginTransaction();
            try {
                $acc = new CustomerAccount;
                $acc->type = $request->type;
                $acc->serial_no1 = $request->slno1;
                $acc->serial_no2 = $request->slno2;
                $acc->business_type = $request->business_type;
                $acc->name = $request->name;
                $acc->code = $request->code;
                $acc->gst_no = $request->gst_no;
                $acc->pan_no = $request->pan_no;
                $acc->iec_no = $request->iec_no;
                $acc->aadhar_no = $request->aadhar_no;
                $acc->passport_no = $request->passport_no;
                $acc->save();

                // Customer detal & GST no Pan No Subsec

                // address details
                $add = new CustomerAddress;
                $add->customer_id = $acc->id;
                $add->contact_person = $request->contact_person;
                $add->address1 = $request->address1;
                $add->address2 = $request->address2;
                $add->address3 = $request->address3;
                $add->pincode = $request->pincode;
                $add->country_code = $request->country_code;
                $add->country = $request->country;
                $add->city_code = $request->city_code;
                $add->city = $request->city;
                $add->state_code = $request->state_code;
                $add->state = $request->state;
                $add->branch_code = $request->branch_code;
                $add->branch = $request->branch;
                $add->telephone = $request->telephone;
                $add->billing_email = $request->billing_email;
                $add->cs_email = $request->cs_email;
                $add->website = $request->website;
                $add->save();
                // address details

                // Manager section
                $man = new CustomerManager;
                $man->customer_id = $acc->id;
                $man->finance_name = $request->finance_name;
                $man->finance_contact = $request->finance_contact;
                $man->finance_email = $request->finance_email;
                $man->authorized_name = $request->authorized_name;
                $man->authorized_contact = $request->authorized_contact;
                $man->authorized_email = $request->authorized_email;
                $man->sales_person = $request->sales_person;
                $man->sales_contact = $request->sales_contact;
                $man->sales_email = $request->sales_email;
                $man->save();
                // Manager section

                //Security Check
                $sec = new CustomerSecurityCheck;
                $sec->customer_id = $acc->id;
                $sec->security_status = $request->security_status;
                $sec->check_no = $request->check_no;
                $sec->amount = $request->amount;
                $sec->textarea = $request->textarea;

                if ($request->hasFile('upload_file')) {
                    $image = $request->file('upload_file');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/customer/security/');
                    $image->move($destinationPath, $name);
                    $sec->upload = $name;
                }

                $sec->save();
                //Security Check

                // Manager section
                $set = new CustomerAccountSetting;
                $set->customer_id = $acc->id;
                $set->tariff = $request->tariff;
                $set->gst = $request->gst;
                $set->activate = $request->activate;
                $set->billing = $request->billing;
                $set->auto_email = $request->auto_email;
                $set->fuel_option = $request->fuel_option;
                $set->fuel_value = $request->fuel_value;
                $set->fuel_imp_option = $request->fuel_imp_option;
                $set->fuel_imp_value = $request->fuel_imp_value;
                $set->payment = $request->payment;
                $set->currency = $request->currency;
                $set->group_code1 = $request->group_code1;
                $set->group_code2 = $request->group_code2;
                $set->covid_charges = $request->covid_charges;
                $set->save();
                // Manager section

                // Customer credit
                $cr = new CustomerCredit;
                $cr->customer_id = $acc->id;
                $cr->credit_status = $request->credit_status;
                $cr->opening_balance = ($request->opening_balance == null) ? 0 : $request->opening_balance;
                $cr->credit_limit = ($request->credit_limit == null) ? 0 : $request->credit_limit;
                $cr->credit_balance = ($request->credit_balance == null) ? 0 : $request->credit_balance;
                $cr->notify = $request->notify ? '0' : '1';
                $cr->total_sale = ($request->total_sale == null) ? 0 : $request->total_sale;
                $cr->total_payment = ($request->total_payment == null) ? 0 : $request->total_payment;
                $cr->total_debit_note = ($request->total_debit_note == null) ? 0 : $request->total_debit_note;
                $cr->total_credit_note = ($request->total_credit_note == null) ? 0 : $request->total_credit_note;
                $cr->outstanding = ($request->outstanding == null) ? 0 : $request->outstanding;
                $cr->network = $request->network;
                $cr->divisible = $request->divisible;
                $cr->note = $request->note;
                $cr->save();
                // Customer credit

                // Customer bank Details
                $bank = new CustomerBankDetails;
                $bank->customer_id = $acc->id;
                $bank->account_no = $request->account_no;
                $bank->bank_name = $request->bank_name;
                $bank->account_name = $request->account_name;
                $bank->ifsc = $request->ifsc;
                $bank->bank_address = $request->bank_address;
                $bank->branch_office = $request->branch_office;
                $bank->save();
                // Customer bank Details

                // Kyc Doocuments
                $docs = new CustomerKycDocument;
                $docs->customer_id = $acc->id;
                // $docs->is_verified = $request->is_verified;
                $docs->is_verified = '1';
                $docs->verify_by = $request->verify_by;
                $docs->verify_date_time = $request->verify_date_time;
                $docs->remarks = $request->remarks;
                $docs->open_by = $request->open_by;
                $docs->modify_by = $request->modify_by;
                $docs->save();

                $docsd = $request->document;
                $img = $request->file('image');
                for ($i = 0; $i < count($docsd); $i++) {
                    $dd = new CustomerKycDocsDetails;
                    $dd->kyc_docs_id = $docs->id;
                    $dd->document = $request->document[$i];
                    $dd->kyc_no = $request->documnet_no[$i];

                    $image = $img[$i];
                    $name = time() . '_' . $i . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/customer/kyc/');
                    $image->move($destinationPath, $name);
                    $dd->image = $name;

                    $dd->save();
                }

                // Kyc Doocuments
                DB::commit();
                //send the mail
                try {
                    $email =
                        [
                        'sender_email' => $request->billing_email,
                        'inext_email' => env('MAIL_USERNAME'),
                        'sender_name' => $request->name,
                        'title' => 'Customer Account Registration',
                    ];
                    Mail::send('mail', $email, function ($messages) use ($email) {
                        $messages->to($email['sender_email'])->from($email['inext_email'], $email['sender_name'], $email['title']);
                        $messages->subject("Account Has been Registered Successfully!!");
                    });
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                //send the mail

                Session::flash('success', 'Customer Account added successfully!');
                return redirect()->back();
            } catch (Exception $e) {
                DB::rollBack();
                return back()->with('error', $e->getMessage())->withInput();
            }
        }
    }

    function list() {
        $customerAccount = cache('customerAccount', function () {
            return CustomerAccount::paginate(10);
        });
        return view('admin.customer_account.customer-list', [
            'customerAccount' => $customerAccount,
        ]);
    }

    public function searchCustomerAccount(Request $request)
    {
        $code = $request->searchcode;
        $data = DB::table('customer_accounts')
            ->rightjoin('customer_account_settings', 'customer_accounts.id', '=', 'customer_account_settings.customer_id')
            ->rightjoin('customer_addresses', 'customer_accounts.id', '=', 'customer_addresses.customer_id')
            ->rightjoin('customer_security', 'customer_accounts.id', 'customer_security.customer_id')
            ->rightjoin('customer_bank_details', 'customer_accounts.id', '=', 'customer_bank_details.customer_id')
            ->rightjoin('customer_credits', 'customer_accounts.id', '=', 'customer_credits.customer_id')
            ->rightjoin('customer_kyc_documents', 'customer_accounts.id', '=', 'customer_kyc_documents.customer_id')
            ->rightjoin('customer_managers', 'customer_accounts.id', '=', 'customer_managers.customer_id')
            ->where('customer_accounts.code', $code)
            ->first();
        //dd($data);
        if ($data) {
            return response()->json(array('status' => 200, 'data' => $data));
        } else {
            return response()->json(array('status' => 400, 'message' => 'No data found!'));
        }
    }

    public function searchCountry(Request $request)
    {
        $key = $request->key;
        $check_data = Country::where('name', 'like', $key . '%')->select('code', 'name')->get();
        $response = array();
        foreach ($check_data as $data) {
            $response[] = array("country_code" => $data->code, "label" => $data->name);
        }
        return response()->json($response);
    }

    public function searchState(Request $request)
    {
        $key = $request->search;
        $ccode = $request->ccode;

        $cdata = Country::where('code', $ccode)->first();
        $check_data = State::where('name', 'like', $key . '%')->where('country_id', $cdata->id)->select('code', 'name')->get();

        $response = array();
        foreach ($check_data as $data) {
            $response[] = array("state_code" => $data->code, "label" => $data->name);
        }
        //dd($response);
        return response()->json($response);
    }

    public function searchCity(Request $request)
    {
        $key = $request->key;

        $country = $request->country;
        $ccode = $request->ccode;

        $scode = $request->scode;
        $state = $request->state;

        $cdata = Country::where('code', $ccode)->first();

        $sdata = State::where('code', $scode)->first();

        $check_data = City::where('name', 'like', $key . '%')->where(['country_id' => $cdata->id, 'state_id' => $sdata->id])->get();
        foreach ($check_data as $data) {
            $response[] = array("city_code" => $data->code, "label" => $data->name);
        }
        return response()->json($response);
    }

    public function searchForwarderMaster(Request $request)
    {
        $key = $request->key;
        $data = ForwarderMaster::select('name')->where('name', 'like', $key . '%')->get();
        $sugestion = "<div class='col-8 offset-2 bg-dark forwarder-suggestion search-suggestion'>";
        foreach ($data as $dataRow) {
            $sugestion = $sugestion . "<div class='text-white border-bottom' onclick=searchForwarderMasterData('" . str_replace(' ', '_', $dataRow->name) . "')>" . $dataRow->name . "</div>";
        }
        $sugestion = $sugestion . "</div>";

        return response()->json(array('sugestion' => $sugestion));
    }

    public function serviceMasterSearch(Request $request)
    {
        $key = $request->key;
        $data = ServiceMaster::select('name', 'code')->where('name', 'like', $key . '%')->get();
        $sugestion = "<div class='bg-dark service-suggestion search-suggestion'>";
        foreach ($data as $dataRow) {
            $sugestion = $sugestion . "<div class='text-white border-bottom' onclick=serviceMasterSearchData('" . str_replace(' ', '_', $dataRow->code) . "','" . str_replace(' ', '_', $dataRow->name) . "')>" . $dataRow->name . "</div>";
        }
        $sugestion = $sugestion . "</div>";

        return response()->json(array('sugestion' => $sugestion));
    }

    public function customerAccountList()
    {
        return view('admin/customer_account/list');
    }

    public function searchCustomerAccountList(Request $request)
    {
        $gst = $request->gst;
        $aadhar = $request->aadhar;
        $data = DB::table('customer_accounts')
            ->join('customer_account_settings', 'customer_accounts.id', '=', 'customer_account_settings.customer_id')
            ->join('customer_addresses', 'customer_accounts.id', '=', 'customer_addresses.customer_id')
            ->join('customer_bank_details', 'customer_accounts.id', '=', 'customer_bank_details.customer_id')
            ->join('customer_credits', 'customer_accounts.id', '=', 'customer_credits.customer_id')
            ->join('customer_kyc_documents', 'customer_accounts.id', '=', 'customer_kyc_documents.customer_id')
            ->join('customer_managers', 'customer_accounts.id', '=', 'customer_managers.customer_id')
        // ->join('customer_other_charges', 'customer_accounts.id', '=', 'customer_other_charges.customer_id')
        // ->join('customer_portal_settings', 'customer_accounts.id', '=', 'customer_portal_settings.customer_id')
        // ->join('customer_service_settings', 'customer_accounts.id', '=', 'customer_service_settings.customer_id')
            ->orWhere('customer_accounts.aadhar_no', $aadhar)
            ->orWhere('customer_accounts.gst_no', $gst)
            ->first();

        $docs = DB::table('customer_accounts')
            ->join('customer_kyc_documents', 'customer_accounts.id', '=', 'customer_kyc_documents.customer_id')
            ->join('customer_kyc_docs_details', 'customer_kyc_documents.id', '=', 'customer_kyc_docs_details.kyc_docs_id')
            ->select('customer_kyc_docs_details.id', 'customer_kyc_docs_details.document', 'customer_kyc_docs_details.kyc_no', 'customer_kyc_docs_details.image')
            ->orWhere('customer_accounts.aadhar_no', $aadhar)
            ->orWhere('customer_accounts.gst_no', $gst)
            ->get();

        return view('admin/customer_account/list_data')->with(['data' => $data, 'docs' => $docs]);
    }
    public function export()
    {
        $headArr[] = array('Name', 'Code', 'GST No', 'Pan No', 'IEC No', 'Aadhar No', 'status', 'Added Date', 'Updated Date');
        $data = CustomerAccount::select('name', 'code', 'gst_no', 'pan_no', 'iec_no', 'aadhar_no', 'status', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
        $dataArr[] = array();
        foreach ($data as $dataRow) {
            $dataArr[] = array($dataRow->name, $dataRow->code, $dataRow->gst_no, $dataRow->pan_no, $dataRow->iec_no, $dataRow->aadhar_no, $dataRow->status, $dataRow->created_at, $dataRow->updated_at);
        }

        $export = new ExportData($headArr, $dataArr);
        return Excel::download($export, 'customer_account.xlsx');
    }

    public function exportCustomerData(Request $request)
    {
        $aadhar = $request->aadhar;
        $gst = $request->gst;
        return Excel::download(new CustomerListExport($aadhar, $gst), 'customer-list.xlsx');
    }

    public function searchCityWithNoPram(Request $request)
    {
        $key = $request->key;

        $check_data = City::where('name', 'like', $key . '%')->get();
        foreach ($check_data as $data) {
            $response[] = array("city_code" => $data->code, "label" => $data->name);
        }
        return response()->json($response);
    }
}
