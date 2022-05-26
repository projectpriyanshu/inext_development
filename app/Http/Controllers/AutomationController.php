<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\CommodityInformation;
use App\Models\FromAddress;
use App\Models\Shipment;
use App\Models\ShipmentDetail;
use App\Models\SpecialService;
use App\Models\ToAddress;
use Auth;
use Illuminate\Http\Request;
use Mail;
use Session;
use Validator;

class AutomationController extends Controller
{
    public function index()
    {
        $commodity = Commodity::where('status', '1')->get();
        return view('admin/automation/index')->with(['commodity' => $commodity]);
    }
    public function store(Request $request)
    {
        // return $request->all();
        $validation = Validator::make($request->all(), [
            'sender' => 'required|max:250',
            'country' => 'required|max:250',
            'contact_name' => 'required|max:250',
            'address1' => 'required|max:250',
            'address2' => 'required|max:250',
            'post_code' => 'required|max:250',
            'city' => 'required|max:250',
            'state' => 'required|max:250',
            'phone_no' => 'required|max:11',
            'extension' => 'required|max:11',
            'to_country' => 'required|max:255',
            'to_contact_name' => 'required|max:255',
            'to_address1' => 'required|max:255',
            'to_address2' => 'required|max:255',
            'to_post_code' => 'required|max:255',
            'to_city' => 'required|max:255',
            'to_state' => 'required|max:255',
            'to_phone_no' => 'required|max:11',
            'to_extension' => 'required|max:11',
            'vat_no' => 'required|max:255',
            'tax_id' => 'required|max:255',
            'ship_date' => 'required|max:255',
            'packages_no' => 'required|max:255',
            'are_identical' => 'required|max:255',
            'weight' => 'required|numeric',
            'weight_unit' => 'required|max:255',
            'service_type' => 'required|max:255',
            'package_type' => 'required|max:255',
            'package_content' => 'required|max:255',
            'shipment_purpose' => 'required|max:255',
            'custom_value' => 'required|numeric',
            'custom_value_unit' => 'required|max:255',
            'bill_transportation_to' => 'required|max:255',
            'taxes' => 'required|max:255',
            'broker_address1' => 'required|max:255',
            'broker_address2' => 'required|max:255',
            'broker_post_code' => 'required|max:255',
            'broker_city' => 'required|max:255',
            'broker_state' => 'required|max:255',
            'broker_phone_no' => 'required|numeric',
            'broker_tax_id' => 'required|max:255',
            // 'quantity'  =>  'numeric',
            // 'commodity_weight'  =>  'numeric',
            // 'commodity_custom_value'  =>  'numeric',
        ]);
        if ($validation->fails()) {
            $messages = $validation->errors();
            return redirect()->back()->withErrors($messages)->withInput();
        }
        $ship = new Shipment;
        $ship->admin_id = Auth::user()->id;
        $ship->awb_no = 'fedex' . time();
        $ship->sender = $request->sender;
        $ship->ship_date = ($request->ship_date == null) ? null : date('Y-m-d', strtotime($request->ship_date));
        $ship->total_shipment_weight = ($request->total_shipment_weight == null) ? 0 : $request->total_shipment_weight;
        $ship->total_carrige_value = ($request->total_carrige_value == null) ? 0 : $request->total_carrige_value;
        $ship->status = '0';
        $ship->save();

        $fromAdd = new FromAddress;
        $fromAdd->shipment_id = $ship->id;
        $fromAdd->sender = $request->sender;
        $fromAdd->country = $request->country;
        $fromAdd->contact_id = $request->contact_id;
        $fromAdd->company = $request->company;
        $fromAdd->contact_name = $request->contact_name;
        $fromAdd->address1 = $request->address1;
        $fromAdd->address2 = $request->address2;
        $fromAdd->city = $request->city;
        $fromAdd->state = $request->state;
        $fromAdd->post_code = $request->post_code;
        $fromAdd->phone_no = $request->phone_no;
        $fromAdd->extension = $request->extension;
        $fromAdd->from_default = ($request->from_default == 'on') ? '1' : '0';
        $fromAdd->from_address_book = ($request->from_default == 'on') ? '1' : '0';
        $fromAdd->save();

        $toAdd = new ToAddress;
        $toAdd->shipment_id = $ship->id;
        $toAdd->sender = $request->sender;
        $toAdd->to_contact_id = $request->to_contact_id;
        $toAdd->to_country = $request->to_country;
        $toAdd->to_company = $request->to_company;
        $toAdd->to_contact_name = $request->to_contact_name;
        $toAdd->to_address1 = $request->to_address1;
        $toAdd->to_address2 = $request->to_address2;
        $toAdd->to_post_code = $request->to_post_code;
        $toAdd->to_city = $request->to_city;
        $toAdd->to_state = $request->to_state;
        $toAdd->to_phone_no = $request->to_phone_no;
        $toAdd->to_extension = $request->to_extension;
        $toAdd->tax_id = $request->tax_id;
        $toAdd->vat_no = $request->vat_no;
        $toAdd->is_residential = ($request->is_residential == 'on') ? '1' : '0';
        $toAdd->to_address_book = ($request->to_address_book == 'on') ? '1' : '0';
        $toAdd->save();

        $shipd = new ShipmentDetail;
        $shipd->shipment_id = $ship->id;
        $shipd->ship_date = ($request->ship_date == null) ? null : date('Y-m-d', strtotime($request->ship_date));
        $shipd->packages_no = $request->packages_no;
        $shipd->weight = $request->weight;
        $shipd->weight_unit = $request->weight_unit;
        $shipd->package_value = ($request->package_value == null) ? 0 : $request->package_value;
        $shipd->package_value_unit = $request->package_value_unit;
        $shipd->service_type = $request->service_type;
        $shipd->package_type = $request->package_type;
        // $shipd->dimensions = $request->dimensions;
        $shipd->length = $request->length;
        $shipd->breadth = $request->breadth;
        $shipd->height = $request->height;
        $shipd->package_content = $request->package_content;
        $shipd->shipment_purpose = $request->shipment_purpose;
        $shipd->custom_value = $request->custom_value;
        $shipd->custom_value_unit = $request->custom_value_unit;
        $shipd->bill_transportation_to = $request->bill_transportation_to;
        $shipd->account_no = $request->account_no;
        $shipd->po_no = $request->po_no;
        $shipd->invoice_no = $request->invoice_no;
        $shipd->dept_no = $request->dept_no;
        $shipd->save();

        $ss = new SpecialService;
        $ss->shipment_id = $ship->id;
        $ss->none_standard_packaging = $request->none_standard_packaging;
        $ss->battery = $request->battery;
        $ss->select_broker = $request->select_broker;
        $ss->broker_accno = $request->broker_accno;
        $ss->broker_company_name = $request->broker_company_name;
        $ss->broker_contact_name = $request->broker_contact_name;
        $ss->broker_address1 = $request->broker_address1;
        $ss->broker_address2 = $request->broker_address2;
        $ss->broker_post_code = $request->broker_post_code;
        $ss->broker_city = $request->broker_city;
        $ss->broker_state = $request->broker_state;
        $ss->broker_country = $request->broker_country;
        $ss->broker_phone_no = $request->broker_phone_no;
        $ss->broker_tax_id = $request->broker_tax_id;
        $ss->save();

        $commodity = $request->commodity;
        if (count($commodity) > 0) {
            for ($i = 0; $i < count($commodity); $i++) {
                $cinfo = new CommodityInformation;
                $cinfo->shipment_id = $ship->id;
                $cinfo->commodity = $commodity[$i];
                $cinfo->description = $request->description[$i];
                $cinfo->unit_of_measure = $request->unit_of_measure[$i];
                $cinfo->quantity = ($request->quantity[$i] == null) ? 0 : $request->quantity[$i];
                $cinfo->weight = ($request->commodity_weight[$i] == null) ? 0 : $request->commodity_weight[$i];
                $cinfo->custom_value = ($request->commodity_custom_value[$i] == null) ? 0 : $request->commodity_custom_value[$i];
                $cinfo->country_of_manufacturer = $request->country_of_manufacturer[$i];
                $cinfo->harmonized_code = $request->harmonized_code[$i];
                $cinfo->save();
            }
        }
        //send the mail
        try {
            $email = array(
                'reciption' => 'project.test8112@gmail.com',
                'fromEmail' => 'project.test8112@gmail.com',
                'fromName' => $request->contact_name,
                'fromAddress' => $request->address1,
                'title' => 'RamLal',
                'sender_name' => 'Mohan Lal',
                'sender_email' => 'abc@gmail.com',
            );
            Mail::send('mail', $email, function ($messages) use ($email) {
                $messages->to($email['reciption'])->from($email['fromEmail'], $email['fromName'], $email['fromAddress']);
                $messages->subject("registered succesfuly!!");
            });
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        //send the mail

        Session::flash('success', 'Request placed successfully!');
        return redirect()->back();
    }
}
