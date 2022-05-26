<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Commodity;
use App\Models\Ups_shipment;
use App\Models\ups_shipment_product;
use App\Models\ups_shipment_service;
use App\Models\ups_shipment_reference;
use App\Models\ups_shipment_payment;
use App\Models\ups_schedule_collection;
use App\Models\ups_from_shipment;
use App\Models\ups_export_payment;

class UpsController extends Controller
{
    public function index()
    {
        return view('admin.ups.index');
    }
    public function store(Request $request)
    {
        $dhl = $request->all();
         
        $rules = [
            'company_name' => 'required',
            'from_country' => 'required',
            'email' =>'required',
            'from_city' => 'required',
            'postal_code' => 'required|numeric|digits:6',
            'address1' => 'required',
            'telephone' => 'required|numeric|digits:10',
            'shipment_weight' => 'required |numeric',
            'packages_dimensions' => 'required |numeric',
            'shipment_value' => 'required |numeric',
            'service' => 'required',
            'refrence1' => 'required',
            'shipment_charge' => 'required',
            'address_books' => 'required',
            'company' => 'required',
            'contact_name' => 'required',
            'email_id' => 'required',
            'town' => 'required',
            'address_line1' => 'required',
            'telephone1' => 'required|numeric|digits:10',
            'payment_method' => 'required',
            'promotion_code1' => 'required',
            'taxes' => 'required',
        ];
        $validator = Validator::make($dhl, $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()->withErrors($validator)->with('error', $messages)->withInput();
        }

        $upsshipment = new Ups_shipment();
        $upsshipment->id = $request->id;
        $upsshipment->awb_no = 'UPS' . time();
        $upsshipment->address_book = $request->address_book;
        $upsshipment->new_address = $request->new_address;
        $upsshipment->company_name = $request->company_name;
        $upsshipment->contact = $request->contact;
        $upsshipment->email = $request->email;
        $upsshipment->country = $request->from_country;
        $upsshipment->city = $request->from_city;
        $upsshipment->postal_code = $request->postal_code;
        $upsshipment->address1 = $request->address1;
        $upsshipment->address2 = $request->address2;
        $upsshipment->address3 = $request->address3;
        $upsshipment->telephone = $request->telephone;
        $upsshipment->ext = $request->ext;
        $upsshipment->resident_address = ($request->resident_address == 'on') ? '1' : '0';
        $upsshipment->save_address = $request->save_address;
        $upsshipment->address_book1 = $request->address_book1;
        $upsshipment->access_point = ($request->access_point == 'on') ? '1' : '0';
        $upsshipment->save();

        $upsshipmentproduct = new ups_shipment_product();
        $upsshipmentproduct->ups_shipment_id = $upsshipment->id;
        $upsshipmentproduct->packages = $request->packages;
        $upsshipmentproduct->same_packages = $request->same_packages;
        $upsshipmentproduct->packages_type = $request->packages_type;
        $upsshipmentproduct->shipment_weight = $request->shipment_weight;
        $upsshipmentproduct->packages_dimensions = $request->packages_dimensions;
        $upsshipmentproduct->shipment_value = $request->shipment_value;
        $upsshipmentproduct->large_packages = implode(',', $request->large_packages);
        $upsshipmentproduct->packages_include_batteries = $request->packages_include_batteries;
        $upsshipmentproduct->save();


        $upsshipmentservice = new ups_shipment_service();
        $upsshipmentservice->ups_shipment_id = $upsshipment->id;
        $upsshipmentservice->service = $request->service;
        $upsshipmentservice->additional_service = implode(',', $request->additional_service);
        $upsshipmentservice->save();

        $upsshipmentrefere = new ups_shipment_reference();
        $upsshipmentrefere->ups_shipment_id = $upsshipment->id;
        $upsshipmentrefere->refrence1 = $request->refrence1;
        $upsshipmentrefere->refrence2 = $request->refrence2;
        $upsshipmentrefere->save();

        $upsshipmentpayment = new ups_shipment_payment();
        $upsshipmentpayment->ups_shipment_id = $upsshipment->id;
        $upsshipmentpayment->shipment_charge = $request->shipment_charge;
        $upsshipmentpayment->promotion_code = $request->promotion_code;
        $upsshipmentpayment->save();

        $upsshipmentcollection = new ups_schedule_collection();
        $upsshipmentcollection->ups_schedule = $request->ups_schedule;
        $upsshipmentcollection->tearm_condition = $request->tearm_condition;
        $upsshipmentcollection->save();

        $upsfromshipment = new ups_from_shipment();
        $upsfromshipment->ups_shipment_id = $upsshipment->id;
        $upsfromshipment->address_books = $request->address_books;
        $upsfromshipment->company = $request->company;
        $upsfromshipment->contact_name = $request->contact_name;
        $upsfromshipment->email_id = $request->email_id;
        $upsfromshipment->country_name = $request->country_name;
        $upsfromshipment->town = $request->town;
        $upsfromshipment->postal_code1 = $request->postal_code1;
        $upsfromshipment->address_line1 = $request->address_line1;
        $upsfromshipment->address_line2 = $request->address_line2;
        $upsfromshipment->address_line3 = $request->address_line3;
        $upsfromshipment->telephone1 = $request->telephone1;
        $upsfromshipment->ext1 = $request->ext1;
        $upsfromshipment->resident = ($request->resident == 'on') ? '1' : '0';
        $upsfromshipment->add_information = $request->save_address;
        $upsfromshipment->select_add = $request->address_book1;
        $upsfromshipment->address_book_save = $request->address_book_save;
        $upsfromshipment->save();

        $upsexportpayment = new ups_export_payment();
        $upsexportpayment->ups_shipment_id = $upsshipment->id;
        $upsexportpayment->payment_method = $request->payment_method;
        $upsexportpayment->promotion_code1 = $request->promotion_code1;
        $upsexportpayment->taxes = $request->taxes;
        $upsexportpayment->ups_account_no = $request->ups_account_no;
        $upsexportpayment->territory = $request->territory;
        $upsexportpayment->postal_code2 = $request->postal_code2;
        $upsexportpayment->schedule_collection = ($request->schedule_collection == 'on') ? '1' : '0';
        $upsexportpayment->tearm_and_condition = ($request->tearm_and_condition == 'on') ? '1' : '0';
        $upsexportpayment->paperless_shipment = ($request->paperless_shipment == 'on') ? '1' : '0';
        $upsexportpayment->export_form = ($request->export_form == 'on') ? '1' : '0';
        $upsexportpayment->comercial_invoice = implode(',', $request->comercial_invoice);
        $upsexportpayment->form_history = ($request->form_history == 'on') ? '1' : '0';
        $upsexportpayment->export_document = ($request->export_document == 'on') ? '1' : '0';
        $upsexportpayment->completing_shipment = ($request->completing_shipment == 'on') ? '1' : '0';
        $upsexportpayment->save();

        return redirect()->route('ups.index')->with('success', 'Ups Details added Successfully!');
    }
}
