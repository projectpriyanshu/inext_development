<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\DhlFromAddress;
use App\Models\DhlPackaging;
use App\Models\DhlShipment;
use App\Models\DhlShipmentDetail;
use App\Models\DhlToAddress;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Dhliteams;
use App\Models\DhlCustomDeclaration;

class DhlController extends Controller
{
    public function index(){
        $commodities = Commodity::get();
        return view('admin.dhl.index',compact('commodities'));
    }
    public function store(Request $request){
        $id = $request->id;
        $dhl = $request->all();
        
        $rules = [
            'from_name'                      => 'required',
            'from_country'                   => 'required',
            'from_address1'                  => 'required',
            'from_address2'                  => 'required',
            'from_address3'                  => 'required',
            'from_state'                     => 'required',
            'from_city'                      => 'required',
            'from_postal_code'               => 'required|numeric|digits:6',
            'from_email'                     => 'required',
            'from_code'                      => 'required',
            'from_phone'                     => 'required|numeric|digits:10',
            'to_name'                        => 'required',
            'to_country'                     => 'required',
            'to_state'                       => 'required',
            'to_city'                        => 'required',
            'to_email'                       => 'required',
            'to_code'                        => 'required',
            'to_phone'                       => 'required|numeric|digits:10',
            'shipment_date'                  =>'required',
            'schedule_courier_pickup'        => 'required',
            'tax_payment_option'             => 'required',
            'shipment_summary'               => 'required',
            'shipment_invoice_no'            => 'required',
            'total_value'                    => 'required',
            'gst_invoice_no'                 => 'required',
            'services_invoice_no'            => 'required'
        ];
        $validator = Validator::make($dhl, $rules);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->back()->withErrors($validator)->with('error',$messages)->withInput();
        }
        if($id){
            DB::beginTransaction();
            try{
                //Start DHL From Address
                $dhlFromAdd                     = DhlFromAddress::where('id',$id)->first();
                $dhlFromAdd->update([
                    'awb_no'                    => $request->awb_no,
                    'from_name'                 => $request->from_name,
                    'from_business_contact'     => $request->from_business_contact,
                    'from_company'              =>  $request->from_company,
                    'from_country'              => $request->from_country,
                    'address1'                  =>  $request->address1,
                    'address2'                  => $request->address2,
                    'address3'                  =>  $request->address3,
                    'postal_code'               => $request->postal_code,
                    'from_state'                =>  $request->from_state,
                    'from_city'                 => $request->from_city,
                    'from_email'                =>  $request->from_email,
                    'from_phone_type'           => $request->from_phone_type,
                    'from_code'                 =>  $request->from_code,
                    'from_phone'                => $request->from_phone,
                    'from_sms_enabled'          =>  ($request->from_sms_enabled == NULL) ? 0 : $request->from_sms_enabled,
                    'iec_no'                    => $request->iec_no,
                    'india_tax_id'              =>  $request->india_tax_id,
                    'number'                    => $request->number,
                    'dhl_transporter_id'        =>  $request->dhl_transporter_id,
                    'from_residential_address'  => ($request->from_residential_address == NULL) ? 0 : $request->from_residential_address,
                ]);
                //End DHL FRom Address
                  //Start DHL To Address
                $dhlToAdd                       = DhlToAddress::where('dhl_from_id',$id)->first();
                $dhlToAdd->update([
                    'to_name'                   => $request->to_name,
                    'to_business_contact'       => $request->to_business_contact,
                    'to_company'                => $request->to_company,
                    'to_country'                => $request->to_country,
                    'to_state'                  => $request->to_state,
                    'to_city'                   => $request->to_city,
                    'to_email'                  => $request->to_email,
                    'to_phone_type'             => $request->to_phone_type,
                    'to_code'                   => $request->to_code,
                    'to_phone'                  => $request->to_phone,
                    'to_sms_enabled'            => ($request->to_sms_enabled == NULL) ? 0 : $request->to_sms_enabled,
                    'to_residential_address'    => ($request->to_residential_address == NULL) ? 0 : $request->to_residential_address,
                ]);
                //End DHL To Address
                //Start DHL Packaging 
                $dhlPackage = DhlPackaging::where('dhl_from_id',$id)->first();
                $dhlPackage->update([
                    'packaging_type'                => $request->packaging_type,
                    'quantity'                      => $request->quantity,
                    'weight'                        => $request->weight,
                    'length'                        => $request->length,
                    'breadth'                       => $request->breadth,
                    'height'                        => $request->height,
                    'transportation_charges'        => $request->transportation_charges,
                    'ship_from_address'             => $request->ship_from_address,
                   
                ]);
                //End DHL Packaging
                //STart DHL Shipment
                $dhlShipment                        = DhlShipment::where('dhl_from_id',$id)->first();
                $dhlShipment->update([
                    'shipment_date'                 => $request->shipment_date,
                    'schedule_courier_pickup'       => $request->schedule_courier_pickup,
                    'shipment_details'              => $request->shipment_details,
                    'total'                         => $request->total,
                    'volumetric_weight'             => $request->volumetric_weight,
                    'total_weight'                  => $request->total_weight,
                    'chargeable_weight'             => $request->chargeable_weight,
                ]);
                //End DHL Shipment
                DB::commit();
                return redirect()->route('dhl.index')->with('success','Dhl Details Updated Successfully!');
            }
            catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error',$e->getMessage())->withInput();
            }
        }
        else{
            DB::beginTransaction();
            try {
                //return $request->all();
                //Start DHL From Address
                $dhlFromAdd                                     = new DhlFromAddress();
                $dhlFromAdd->awb_no                             = 'DHL'.time();
                $dhlFromAdd->from_name                          = $request->from_name;
                //$dhlFromAdd->from_business_contact            = $request->from_business_contact;
                $dhlFromAdd->from_company                       = $request->from_company;
                $dhlFromAdd->from_country                       = $request->from_country;
                $dhlFromAdd->address1                           = $request->from_address1;
                $dhlFromAdd->address2                           = $request->from_address2;
                $dhlFromAdd->address3                           = $request->from_address3;
                $dhlFromAdd->postal_code                        = $request->from_postal_code;
                $dhlFromAdd->from_state                         = $request->from_state;
                $dhlFromAdd->from_city                          = $request->from_city;
                $dhlFromAdd->from_email                         = $request->from_email;
                $dhlFromAdd->from_phone_type                    = $request->from_phone_type;
                $dhlFromAdd->from_code                          = $request->from_code;
                $dhlFromAdd->from_phone                         = $request->from_phone;
                $dhlFromAdd->from_sms_enabled                   = ($request->from_sms_enabled == 'on') ? '1' : '0';
                $dhlFromAdd->iec_no                             = $request->iec_no;
                $dhlFromAdd->india_tax_id                       = $request->india_tax_id;
                $dhlFromAdd->number                             = $request->number;
                $dhlFromAdd->dhl_transporter_id                 = $request->dhl_transporter_id;
                $dhlFromAdd->from_residential_address           = ($request->from_residential_address == 'on') ? '1' : '0';
                $dhlFromAdd->save();
                //End DHL From Address
            
                //Start DHLTo Address
                $dhlToAdd = new DhlToAddress();
                $dhlToAdd->dhl_from_id                  = $dhlFromAdd->id;
                $dhlToAdd->to_name                      = $request->to_name;
                $dhlToAdd->to_business_contact          = $request->to_business_contact;
                $dhlToAdd->to_company                   = $request->to_company;
                $dhlToAdd->to_country                   = $request->to_country;
                $dhlToAdd->to_state                     = $request->to_state;
                $dhlToAdd->to_city                      = $request->to_city;
                $dhlToAdd->to_email                     = $request->to_email;
                $dhlToAdd->to_phone_type                = $request->to_phone_type;
                $dhlToAdd->to_code                      = $request->to_code;
                $dhlToAdd->to_phone                     = $request->to_phone;
                $dhlToAdd->to_sms_enabled               = ($request->to_sms_enabled == 'on') ? '1': '0';
                $dhlToAdd->to_residential_address       = ($request->to_residential_address == 'on') ? '1' : '0';
                $dhlToAdd->save();
                //End DHL To Address
                //dd($dhlToAdd->to_sms_enabled);

                 //STart DHL Shipment Details
                 $dhlShipmentDetail                             = new DhlShipmentDetail();
                 $dhlShipmentDetail->dhl_from_id                = $dhlFromAdd->id;
                 $dhlShipmentDetail->shipment_details           = $request->shipment_details;
                 $dhlShipmentDetail->shipment_type              = $request->shipment_type;
                 $dhlShipmentDetail->shipment_purpose           = $request->shipment_purpose;
                 $dhlShipmentDetail->tax_payment_option         = $request->tax_payment_option;
                 $dhlShipmentDetail->create_invoice             = $request->create_invoice;
                 $dhlShipmentDetail->use_own_invoice            = $request->use_own_invoice;
                 $dhlShipmentDetail->shipment_summary           = $request->shipment_summary;
                 $dhlShipmentDetail->shipment_invoice_no        = $request->shipment_invoice_no;
                 $dhlShipmentDetail->total_value                = $request->total_value;
                 $dhlShipmentDetail->total_invoice              = $request->total_invoice;
                 $dhlShipmentDetail->charge1                    = $request->charge1;
                 $dhlShipmentDetail->charge2                    = $request->charge2;
                 $dhlShipmentDetail->charge3                    = $request->charge3;
                 $dhlShipmentDetail->shipment_reference         = $request->shipment_reference;
                 $dhlShipmentDetail->tax_id                     = $request->tax_id;
                 $dhlShipmentDetail->shipment_no                = $request->shipment_no;
                 $dhlShipmentDetail->gst_invoice_no             = $request->gst_invoice_no;
                 $dhlShipmentDetail->services_invoice_no        = $request->services_invoice_no;
                 $dhlShipmentDetail->gst_invoice_date           = $request->gst_invoice_date;
                 $dhlShipmentDetail->invoice_date               = $request->invoice_date;
                 $dhlShipmentDetail->save();
                 //End DHL Shipment Details

                 //Custom declairation
                    $CustomDeclair = new DhlCustomDeclaration();
                    $CustomDeclair->dhl_from_id = $dhlFromAdd->id;
                    $CustomDeclair->involved_other_party = $request->involved_other_party;
                    $CustomDeclair->shipment_tax_payment = $request->shipment_tax_payment;
                    $CustomDeclair->save();

                //custome declairation
			

                //  DHL Items
                $itemdesc = $request->item_description;
                if(is_array($itemdesc) && !empty($itemdesc)){
                    for($i=0; $i < count($itemdesc); $i++){
                        $item                           = new Dhliteams;
                        $item->dhl_from_id              = $dhlFromAdd->id;
                        $item->item_description         = $itemdesc[$i];
                        $item->item_quantity            = $request->item_quantity[$i];
                        $item->unit                     = $request->unit[$i];
                        $item->item_value               = $request->item_value[$i];
                        $item->commodity_code           = $request->commodity_code[$i];
                        $item->net_weight               = $request->net_weight[$i];
                        $item->gross_weight             = $request->gross_weight[$i];
                        $item->item_made_place          = $request->item_made_place[$i];
                        $item->save();
                    }
                }								
                //  DHL Items

                //STart DHL Packaging
                $dhlPackage                                 = new DhlPackaging();
                $dhlPackage->dhl_from_id                    = $dhlFromAdd->id;
                $dhlPackage->packaging_type                 = $request->packaging_type;
                $dhlPackage->quantity                       = $request->quantity;
                $dhlPackage->weight                         = $request->weight;
                $dhlPackage->length                         = $request->length;
                $dhlPackage->breadth                        = $request->breadth;
                $dhlPackage->height                         = $request->height;
                $dhlPackage->transportation_charges         = $request->transportation_charges;
                $dhlPackage->ship_from_address              = $request->ship_from_address;
                $dhlPackage->save();
                //End DHL Packaging

                //STart DHL Shipment
                $dhlShipment                                = new DhlShipment();
                $dhlShipment->dhl_from_id                   = $dhlFromAdd->id;
                $dhlShipment->shipment_date                 = $request->shipment_date;
                $dhlShipment->schedule_courier_pickup       = $request->schedule_courier_pickup;
                $dhlShipment->shipment_details              = $dhlShipment->shipment_date;
                $dhlShipment->total                         = $request->total;
                $dhlShipment->volumetric_weight             = $dhlPackage->weight;
                $dhlShipment->total_weight                  = $dhlPackage->weight;
                $dhlShipment->chargeable_weight             = $dhlPackage->weight;
                $dhlShipment->save();
                //End DHL Shipment
            
                DB::commit();
                return redirect()->route('dhl.index')->with('success', 'Dhl Details added Successfully!');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back();
            }
        }
      
    }
    public function generateAwb(){
        $awb_no = time();
        return json_encode($awb_no);
    }
}
