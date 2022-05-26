@extends('layouts.main')
@section('content')
    <div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->

                <form action="{{route('dhl.store')}}" method="post" class="m-2">
                    @csrf
                    <div class="tab-content mt-5">
                        <div class="tab-pane fade show active" id="dhl" role="tabpanel" aria-labelledby="dhl-tab">
                            <div class="detail_edit p-3" style="background: #fff;">
                                <nav class="tab mb-5">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-fromto-tab" data-toggle="tab" href="#nav-fromto"
                                            role="tab" aria-controls="nav-fromto" aria-selected="true">Go To Shipment
                                        </a>
                                        <a class="nav-link" id="nav-shipmentDetails-tab" data-toggle="tab"
                                            href="#nav-shipmentDetails" role="tab" aria-controls="nav-shipmentDetails"
                                            aria-selected="false">Shipment Details
                                        </a>
                                        <a class="nav-link" id="nav-customDeclaration-tab" data-toggle="tab"
                                            href="#nav-customDeclaration" role="tab" aria-controls="nav-customDeclaration"
                                            aria-selected="false">Custom Declaration
                                        </a>
                                        <a class="nav-link" id="nav-packagePayment-tab" data-toggle="tab"
                                            href="#nav-packagePayment" role="tab" aria-controls="nav-packagePayment"
                                            aria-selected="false">Packaging & Payment for Transportation
                                        </a>
                                        <a class="nav-link" id="nav-courierShipment-tab" data-toggle="tab"
                                            href="#nav-courierShipment" role="tab" aria-controls="nav-courierShipment"
                                            aria-selected="false">
                                            Courier pickup & Shipment
                                        </a>
                                    </div>
                                        @if(session()->has('success'))
                                        <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                        </div>
                                        @endif
                                        @if(session()->has('error'))
                                        <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                        </div>
                                        @endif
                                        <span id="alert-success" style="color: green;"></span>
                                        <span id="alert-danger" style="color: red;"></span>
                                </nav>
                              
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- From and to modules -->
                                    <div class="tab-pane tab-pane-background fade active show" id="nav-fromto"
                                        role="tabpanel" aria-labelledby="nav-fromto-tab">
                                       
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-6 from">
                                                    <fieldset class="form-group border p-3">
                                                        <legend class="w-auto px-2">From</legend>
                                                        <div class="dhl-from-add">
                                                        {{--
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Awb No</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" name="awb_no" id="awb_no0" class="form-control" value="{{old('awb_no')}}" readonly>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        --}}
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Name</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" name="from_name" id="from_name0" class="form-control" value="{{old('from_name')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('from_name'))
                                                                <div class="error">{{ $errors->first('from_name') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="checkbox" name="from_business_contact" id="from_business_contact0"> Business Contact
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">Company
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="from_company" id="from_company0"value="{{old('from_company')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('from_company'))
                                                                <div class="error">{{ $errors->first('from_company') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Country/Territory
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                                <input id="country" type="text" class="form-control fromcountry" name="from_country" id="from_company0" value="{{old('from_country')}}" placeholder="Search Country..." onkeyup="return deleteCountry()">
                                                                                @if($errors->has('from_country'))
                                                                                  <div class="error text-end">{{ $errors->first('from_country') }}</div>
                                                                                @endif
                                                                                </div>
                                                                        </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Address 1
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <!-- <div class="d-flex"> -->
                                                                    <input type="text" class="form-control"
                                                                        name="from_address1" id="from_address1(0)"value="{{old('from_address1')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('from_address1'))
                                                                <div class="error">{{ $errors->first('from_address1') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Address 2
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"
                                                                        name="from_address2" id="from_address2(0)" value="{{old('address2')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('from_address2'))
                                                                <div class="error">{{ $errors->first('from_address2') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Address 3
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"
                                                                        name="from_address3" id="from_address3(0)" value="{{old('address3')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('from_address3'))
                                                                <div class="error">{{ $errors->first('from_address3') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Postal Code
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" name="from_postal_code" id="from_postal_code0" value="{{old('from_postal_code')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('from_postal_code'))
                                                                <div class="error">{{ $errors->first('from_postal_code') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    State
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                                <input id="state" type="text" class="form-control fromstate" name="from_state" id="from_state0" value="{{old('from_state')}}" placeholder="Search State..." onkeyup="return searchState()">
                                                                                @if($errors->has('from_state'))
                                                                                  <div class="error text-end">{{ $errors->first('from_state') }}</div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                               
                                                        
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    City
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                                <input id="city" type="text" class="form-control fromcity" name="from_city" id="from_city0" value="{{old('from_city')}}" placeholder="Search City..." onkeyup="return searchCity()">
                                                                                @if($errors->has('from_city'))
                                                                                  <div class="error text-end">{{ $errors->first('from_city') }}</div>
                                                                                @endif
                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                               
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Email Address
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="email" class="form-control" name="from_email" id="from_email0"
                                                                        value="{{old('from_email')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('from_email'))
                                                                <div class="error">{{ $errors->first('from_email') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Phone Type
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select name="from_phone_type" id="from_phone_type0"class="form-select">
                                                                        <option value="">--Select--</option>
                                                                        <option value="mobile" selected>Mobile</option>
                                                                        <option value="telephone">Telephone</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('from_phone_type'))
                                                                <div class="error">{{ $errors->first('from_phone_type') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Code
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select name="from_code" id="from_code0" class="form-select">
                                                                        <option value="">--Select--</option>
                                                                        <option value="+91" selected>91 (IND)</option>
                                                                        <option value="+54">54 (ARG)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('from_code'))
                                                                <div class="error">{{ $errors->first('from_code') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Phone
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" name="from_phone" id="from_phone0"
                                                                        class="form-control" value="{{old('from_phone')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('from_phone'))
                                                                <div class="error">{{ $errors->first('from_phone') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="checkbox" name="from_sms_enabled" id="from_sms_enabled0"> SMS Enabled
                                                        </div>
                                                        </div>
                                                        
                                                       <!-- <div class="mt-2 add-dhl-from">
                                                            <a data-toggle="collapse" href="#dhlCollapse"
                                                                aria-expanded="false" aria-controls="dhlCollapse" style="text-decoration: none">
                                                                <i class="fa fa-plus-circle"></i> Add Another
                                                            </a>
                                                        </div> -->
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    {{-- <span class="required-star">*</span> --}}
                                                                    IEC/VAT/Tax ID
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="iec_no" value="{{old('iec_no')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('iec_no'))
                                                                <div class="error">{{ $errors->first('iec_no') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    India Tax ID/Personal ID
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select name="india_tax_id" id="" class="form-select">
                                                                        <option value="">--Select--</option>
                                                                        <option value="gst_in" selected>GST IN</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('india_tax_id'))
                                                                <div class="error">{{ $errors->first('india_tax_id') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    Number
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" name="number" value="{{old('number')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('number'))
                                                                <div class="error">{{ $errors->first('number') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    DHL Transporter ID
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="dhl_transporter_id" 
                                                                        value="07AABCD3611Q1ZK" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('dhl_transporter_id'))
                                                                <div class="error">{{ $errors->first('dhl_transporter_id') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <input type="checkbox" name="from_residential_address" id=""> Residential Address
                                                            <br><br>
                                                            <button class="btn btn-primary rounded-0" disabled>Clear
                                                                Address</button>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 to">
                                                    <fieldset class="form-group border p-3">
                                                        <legend class="w-auto px-2">To</legend>
                                                        <div class="dhl-to-add">
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Name</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" name="to_name" id="to_name0"
                                                                        class="form-control" value="{{old('to_name')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('to_name'))
                                                                <div class="error">{{ $errors->first('to_name') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="checkbox" name="to_business_contact" id="to_business_contact0"> Business Contact
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">Company
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="to_company" id="to_company0" value="{{old('to_company')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('to_company'))
                                                                <div class="error">{{ $errors->first('to_company') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Country/Territory
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                                <input id="country" type="text" class="form-control tocountry" name="to_country" id="to_country0"value="{{old('to_country')}}" placeholder="Search Country..." onkeyup="return deleteCountry()">
                                                                                @if($errors->has('to_country'))
                                                                                  <div class="error text-end">{{ $errors->first('to_country') }}</div>
                                                                                @endif    
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Address 1
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <!-- <div class="d-flex"> -->
                                                                    <input type="text" class="form-control"
                                                                        name="to_address1" id="to_address1(0)" value="{{old('to_address1')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Address 2
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"
                                                                        name="to_address2" id="to_address2(0)"value="{{old('to_address2')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Address 3
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"
                                                                        name="to_address3" id="to_address3(0)" value="{{old('to_address3')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Postal Code
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" name="to_postal_code" id="to_postal_code0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Province
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="d-flex w-100">
                                                                        <input type="text" class="form-control tostate" name="to_state" id="to_state0" value="{{old('to_state')}}" placeholder="Search Province...">
                                                                        @if($errors->has('to_state'))
                                                                                  <div class="error text-end">{{ $errors->first('to_state') }}</div>
                                                                        @endif   
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                <span class="required-star">*</span>
                                                                            City
                                                                            </label>
                                                                        </div>
                                                            <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                                <input id="country" type="text" class="form-control tocity" name="to_city" id="to_city0" value="{{old('to_city')}}" placeholder="Search City...">
                                                                                @if($errors->has('to_city'))
                                                                                  <div class="error text-end">{{ $errors->first('to_city') }}</div>
                                                                                @endif    
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Email Address
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="email" class="form-control" name="to_email" id="to_email0" value="{{old('to_email')}}">
                                                                        <div class="row text-end mb-3">
                                                                    @if($errors->has('to_email'))
                                                                        <div class="error">{{ $errors->first('to_email') }}</div>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Phone Type
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select name="to_phone_type" id="to_phone_type0" class="form-select">
                                                                        <option value="">--Select--</option>
                                                                        <option value="mobile" selected>Mobile</option>
                                                                        <option value="telephone">Telephone</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('to_phone_type'))
                                                                <div class="error">{{ $errors->first('to_phone_type') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Code
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select name="to_code" id="to_code0" class="form-select">
                                                                        <option value="">--Select--</option>
                                                                        <option value="+91" selected>91 (IND)</option>
                                                                        <option value="+54">54 (ARG)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('to_code'))
                                                                <div class="error">{{ $errors->first('to_code') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Phone
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" name="to_phone" id="to_phone0"
                                                                        class="form-control" value="{{old('to_phone')}}">
                                                                </div>
                                                            </div>
                                                            <div class="row text-end mb-3">
                                                            @if($errors->has('to_phone'))
                                                                <div class="error">{{ $errors->first('to_phone') }}</div>
                                                            @endif
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <input type="checkbox" name="to_sms_enabled" id="to_sms_enabled0"> SMS Enabled
                                                        </div>
                                                        </div>
                                                        <!-- <div class="mt-2 add-dhl-to">
                                                            <a data-toggle="collapse" href="#dhlCollapsed"
                                                                aria-expanded="false" aria-controls="dhlCollapsed"
                                                                style="text-decoration: none">
                                                                <i class="fa fa-plus-circle"></i> Add Another
                                                            </a>
                                                        </div> -->
                                                     
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    EORI Number
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" name="eori_no" id=""
                                                                        class="form-control" value="{{old('eori_no')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    Tax Document Type
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select name="tax_doc_type" class="form-control" id="">
                                                                        <option value="">--Select One--</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4">
                                                            <input type="checkbox" name="to_residential_address" id="" > Residential Address
                                                            <br><br>
                                                            <h6>Notes about this contact</h6>
                                                            <textarea name="" id="" rows="5"
                                                                class="dhltext"></textarea>
                                                        </div>
                                                        <button class="btn btn-primary rounded-0 mt-2" disabled>Clear
                                                            Address</button>
                                                    </fieldset>
                                                    <div class="text-end mt-3">
                                                        {{--<button class="btn btn-success rounded-0 mr-2" type="submit">Save for
                                                            later <i class="fa fa-save"></i></button>--}}
                                                        <button class="btn btn-danger rounded-0 mr-2" disabled>Cancel <i
                                                                class="fa fa-close"></i></button>
                                                        <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                                href="#nav-shipmentDetails" role="tab"
                                                                aria-controls="nav-fromto" aria-selected="false">Next
                                                                <span><i class="fa fa-arrow-right"></i></span></a> 
                                                         
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <i class="fa fa-exclamation-triangle"></i>
                                                <strong class="mx-2">IMPORTANT!</strong> In compliance with local
                                                regulations and in the interest of health & safety due to current
                                                circumstances, DHL is operating at
                                                restricted capacity. You may be requested to drop your shipment at our
                                                nearest service center (https://locator.dhl.com/?l=en&countryCode=IN). DHL
                                                Customer Service will proactively call you to confirm pick-up or drop-off.
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Shipment Details modules -->
                                    <div class="tab-pane tab-pane-background fade" id="nav-shipmentDetails" role="tabpanel"
                                        aria-labelledby="nav-shipmentDetails-tab">
                                        <div class="row">
                                            <div class="col form-2-box wow fadeInUp">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2">Shipment Details</legend>
                                                            <div class="row mt-3">
                                                                <div class="col-md-6">
                                                                    <div>
                                                                        <input type="checkbox" name="shipment_details" id="" value="document" {{old('value'=='document'?'checked':'')}}> &nbsp; Documents <br>
                                                                        <input type="checkbox" name="shipment_details" id="" value="packages" {{old('value'=='packages'?'checked':'')}}> &nbsp; Packages
                                                                    </div>
                                                                    <div class="mt-3 box1">
                                                                        <h6 class="font-weight-bold">What is your shipment
                                                                            type ?</h6>
                                                                            <div>
                                                                                <input type="checkbox" name="shipment_type" value="gift" {{old('value'=='gift'? 'checked':'')}} id=""> &nbsp; Gift/Sample Shipment <br>
                                                                                <input type="checkbox" name="shipment_type" id="" value="non-gift" {{old('value'=='non-gift'? 'checked':'')}}> &nbsp; Non-Gift/Non-Sample Shipment <br>
                                                                                <input type="checkbox" name="shipment_type" id="" value="cargo" {{old('value'=='cargo'? 'checked':'')}}> &nbsp; Cargo Shipment
                                                                            </div>
                                                                    </div>
                                                                    <div class="row form-group mt-4">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                What is the purpose of your shipment ?
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select name="shipment_purpose" class="form-select"
                                                                                    id="">
                                                                                    <option value="">--Select--</option>
                                                                                    <option value="sample" selected>Sample
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                <span class="required-star">*</span>
                                                                                Tax Payment option for this shipment <i
                                                                                    class="fa fa-info-circle icon"></i>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select name="tax_payment_option" class="form-select"
                                                                                    id="">
                                                                                    <option value="">--Select One--</option>
                                                                                    <option value="payroll">Payroll</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row text-end mb-3">
                                                                        @if($errors->has('tax_payment_option'))
                                                                            <div class="error">{{ $errors->first('tax_payment_option') }}</div>
                                                                        @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="box1">
                                                                        <h6 class="font-weight-bold">You'll need a customs
                                                                            invoice:</h6>
                                                                        <p>India Goods and Services Tax (GST) system
                                                                            requires you to provide DHL details about your
                                                                            shipment. We
                                                                            will create a customs invoice from the
                                                                            information you provide.</p>
                                                                        <div class="row form-group mt-3">
                                                                            <div class="col-md-4">
                                                                                <label for="name" class="form-label">
                                                                                    Create Invoice
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="text" name="create_invoice"
                                                                                        class="form-control" value="{{old('create_invoice')}}" id="">
                                                                                </div>
                                                                            </div>
                                                                                <div class="row text-end mb-3">
                                                                            @if($errors->has('create_invoice'))
                                                                                <div class="error">{{ $errors->first('create_invoice') }}</div>
                                                                            @endif
                                                                        </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-4">
                                                                                <label for="name" class="form-label">
                                                                                    Use My Own Invoice
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="text" name="use_own_invoice"
                                                                                        class="form-control" id="" value="{{old('use_own_invoice')}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row text-end mb-3">
                                                                            @if($errors->has('use_own_invoice'))
                                                                                <div class="error">{{ $errors->first('use_own_invoice') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group mt-4">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                <span class="required-star">*</span>
                                                                                Summarize the contents of your shipment (in
                                                                                detail) <i
                                                                                    class="fa fa-info-circle icon"></i>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <textarea name="shipment_summary" class="dhltext"
                                                                                    id="" rows="3" value="{{old('shipment_summary')}}">{{old('shipment_summary')}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row text-end mb-3">
                                                                        @if($errors->has('shipment_summary'))
                                                                            <div class="error">{{ $errors->first('shipment_summary') }}</div>
                                                                        @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                <span class="required-star">*</span>
                                                                                Invoice Number &nbsp; <i
                                                                                    class="fa fa-info-circle icon"></i>
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" name="shipment_invoice_no" class="form-control" value="{{old('shipment_invoice_no')}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row text-end mb-3">
                                                                        @if($errors->has('shipment_invoice_no'))
                                                                            <div class="error">{{ $errors->first('shipment_invoice_no') }}</div>
                                                                        @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <fieldset class="form-group border p-3 mt-5">
                                                                <legend class="w-auto px-2">Invoice Value</legend>
                                                                <p class="mt-3">Include any additional charges
                                                                    for this shipment.</p>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="row form-group">
                                                                            <div class="col-md-4">
                                                                                <label for="name" class="form-label">
                                                                                    <span class="required-star">*</span>
                                                                                    Total value for all goods/items only
                                                                                    (excluding other charges)
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <div class="row">
                                                                                        <div class="col-md-9">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="total_value" id="" value="{{old('total_value')}}">
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <span>INR</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row text-end mb-3">
                                                                        @if($errors->has('total_value'))
                                                                            <div class="error">{{ $errors->first('total_value') }}</div>
                                                                        @endif
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row form-group">
                                                                            <div class="col-md-4">
                                                                                <label for="name"
                                                                                    class="form-label font-weight-bold">
                                                                                    Total Invoice
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="text" name="total_invoice" value="{{old('total_invoice')}}"
                                                                                        class="form-control" id="">
                                                                                    &nbsp;<span
                                                                                        class="font-weight-bold">INR</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-2">
                                                                            <label for="name"
                                                                                class="form-label font-weight-bold">
                                                                                Add Charges
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <input type="text" name="charge1"
                                                                                            class="form-control" id="" value="{{old('charge1')}}">
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <input type="text" name="charge2"
                                                                                            class="form-control" id="" value="{{old('charge2')}}">
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <input type="text" name="charge3"
                                                                                            class="form-control" id="" value="{{old('charge3')}}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <div class="mt-4">
                                                                <h6 class="font-weight-bold">Add Shipment References</h6>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label">
                                                                            <span class="required-star">*</span>
                                                                            Reference (appears on shipping label/waybill)
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="text" name="shipment_reference"
                                                                                class="form-control" id="" value="{{old('shipment_reference')}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row text-end mb-3">
                                                                        @if($errors->has('shipment_reference'))
                                                                            <div class="error">{{ $errors->first('shipment_reference') }}</div>
                                                                        @endif
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <i class="fa fa-folder-plus"></i>
                                                            </div>
                                                            <fieldset class="form-group border p-3 mt-5">
                                                                <legend class="w-auto px-2">India Goods and Services Tax
                                                                    (GST) Details</legend>
                                                                <div class="row mt-3">
                                                                    <div class="col-md-6">
                                                                        <div class="row form-group">
                                                                            <div class="col-md-4">
                                                                                <label for="name" class="form-label">
                                                                                    India Tax ID/Personal ID <i
                                                                                        class="fa fa-info-circle icon"></i>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <select name="tax_id" class="form-select"
                                                                                        id="">
                                                                                        <option value="">--Select--</option>
                                                                                        <option value="gst" selected>GST
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row text-end mb-3">
                                                                        @if($errors->has('tax_id'))
                                                                            <div class="error">{{ $errors->first('tax_id') }}</div>
                                                                        @endif
                                                                        </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-4">
                                                                                <label for="name" class="form-label">
                                                                                    Number
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="number" name="shipment_no"
                                                                                        class="form-control" id="" value="{{old('shipment_no')}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row text-end mb-3">
                                                                        @if($errors->has('shipment_no'))
                                                                            <div class="error">{{ $errors->first('shipment_no') }}</div>
                                                                        @endif
                                                                        </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-4">
                                                                                <label for="name" class="form-label">
                                                                                    <span class="required-star">*</span>
                                                                                    GST Invoice Number
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="number" name="gst_invoice_no"
                                                                                        class="form-control" id="" value="{{old('gst_invoice_no')}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row text-end mb-3">
                                                                        @if($errors->has('gst_invoice_no'))
                                                                            <div class="error">{{ $errors->first('gst_invoice_no') }}</div>
                                                                        @endif
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row form-group">
                                                                            <div class="col-md-4">
                                                                                <label for="name" class="form-label">
                                                                                    <span class="required-star">*</span>
                                                                                    Invoice Number
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="number" name="services_invoice_no"
                                                                                        class="form-control" id="" value="{{old('services_invoice_no')}}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row text-end mb-3">
                                                                        @if($errors->has('services_invoice_no'))
                                                                            <div class="error">{{ $errors->first('services_invoice_no') }}</div>
                                                                        @endif
                                                                        </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-4">
                                                                                <label for="name" class="form-label">
                                                                                    GST Invoice Date
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="date" name="gst_invoice_date"
                                                                                        class="form-control" id="" value="{{old('gst_invoice_date')}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-4">
                                                                                <label for="name" class="form-label">
                                                                                    Invoice Date
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="date" name="invoice_date"
                                                                                        class="form-control" id="" value="{{old('invoice_date')}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </fieldset>
                                                        <div class="text-end mt-3">
                                                            <button class="btn btn-success rounded-0 mr-2"
                                                                type="submit">Save for
                                                                later <i class="fa fa-save"></i></button>
                                                            <button class="btn btn-danger rounded-0 mr-2">Cancel <i
                                                                    class="fa fa-close"></i></button>
                                                            <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                                href="#nav-customDeclaration" role="tab" aria-controls="nav-customDeclaration"
                                                                aria-selected="false">Next
                                                                <span><i class="fa fa-arrow-right"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Custom Declaration modules -->
                                    <div class="tab-pane tab-pane-background fade" id="nav-customDeclaration" role="tabpanel"
                                        aria-labelledby="nav-customDeclaration-tab">
                                        <div class="row">
                                            <div class="col form-2-box wow fadeInUp">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2">Custom Declaration</legend>
                                                            <div class="row mt-3">
                                                                <div class="col-md-6">
                                                                    <h6 class="font-weight-bold">Additional Parties</h6>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                Are there other parties involved in the shipment?
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="radio" name="involved_other_party" id="" value="yes"> &nbsp; Yes &nbsp;&nbsp;
                                                                                <input type="radio" name="involved_other_party" id="" value="no"> &nbsp; No
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                                        <i class="fa fa-info-circle"></i>
                                                                        <ul>
                                                                            <li>
                                                                                <p>As of July 1 2021, all commercial goods imported to the European Union (EU) will be subject to
                                                                                    VAT.</p>
                                                                            </li>
                                                                            <li>
                                                                                <p>If the seller of the goods is IOSS registered, the IOSS number must be associated with the
                                                                                    shipment.</p>
                                                                            </li>
                                                                        </ul>
                                                                        <button type="button" class="close" data-dismiss="alert"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="box1">
                                                                        <h6 class="font-weight-bold">Tax Payment for this Shipment</h6>
                                                                        <p>Tax numbers you used to pay taxes for this shipment (for local customs authorities)</p>
                                                                        <div class="row form-group mt-3">
                                                                            <div class="col-md-4">
                                                                                <label for="name" class="form-label">
                                                                                    Provide the applicable tax number
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="number" name="shipment_tax_payment" value="{{old('shipment_tax_payment')}}"
                                                                                        class="form-control" id="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <fieldset class="form-group border p-3 mt-4">
                                                                    <legend>Item Details</legend>
                                                                    <p class="mt-3">Enter item details to create a digital record of your shipment.</p>
                                                                    <button class="btn btn-primary rounded-0" type="button">View Prohibited Items</button>
                                                                    <div class="row dhl-add-item">
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name" class="form-label">
                                                                                        <span class="required-star">*</span>
                                                                                        Item Description
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span class="spacing">:</span>
                                                                                        <textarea name="item_description[]" id="item_description0" class="dhltext" rows="2"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name" class="form-label">
                                                                                        Quantity
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span class="spacing">:</span>
                                                                                        <input type="number" class="form-control" name="item_quantity[]" id="item_quantity0" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name" class="form-label">
                                                                                        Units
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span class="spacing">:</span>
                                                                                        <select name="unit[]" class="form-select" id="unit0">
                                                                                            <option value="">--Select--</option>
                                                                                            <option value="pieces" selected>Pieces</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name" class="form-label">
                                                                                        <span class="required-star">*</span>
                                                                                        Item Value
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span class="spacing">:</span>
                                                                                        <input type="text" class="form-control" name="item_value[]" id="item_value0" > INR
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name" class="form-label">
                                                                                        Total Units
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span class="spacing">:</span>
                                                                                        <span class="font-weight-bold">1</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name" class="form-label">
                                                                                        Total Net Weight
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span class="spacing">:</span>
                                                                                        <span class="font-weight-bold">KG</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name" class="form-label">
                                                                                        Export Commodity Code
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span class="spacing">:</span>
                                                                                        <select name="commodity_code[]" class="form-select" id="commodity_code0">
                                                                                            <option value="">--Select--</option>
                                                                                            <option value="1234">Test data</option>
                                                                                            @foreach($commodities as $commodity)
                                                                                            <option value="{{$commodity->id}}">{{$commodity->code}}-{{$commodity->name}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name" class="form-label">
                                                                                        <span class="required-star">*</span>
                                                                                        Net Weight &nbsp; <i class="fa fa-info-circle icon"></i>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span class="spacing">:</span>
                                                                                        <input type="text" class="form-control" name="net_weight" id=""> Kg
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name" class="form-label">
                                                                                        <span class="required-star">*</span>
                                                                                        Gross Weight &nbsp; <i class="fa fa-info-circle icon"></i>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span class="spacing">:</span>
                                                                                        <input type="text" class="form-control" name="gross_weight" id=""> Kg
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name" class="form-label">
                                                                                        <span class="required-star">*</span>
                                                                                        Where was the item made? &nbsp; <i class="fa fa-info-circle icon"></i>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span class="spacing">:</span>
                                                                                        <input type="text" class="form-control" name="item_made_place[]" id="item_made_place0">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name" class="form-label">
                                                                                        Total Gross Weight
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span class="spacing">:</span>
                                                                                        <span class="font-weight-bold">KG</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <button class="btn btn-primary rounded-0 add-item">Add Another Item <i class="fa fa-plus-circle"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </fieldset>
                                                        <div class="text-end mt-3">
                                                            <button class="btn btn-success rounded-0 mr-2"
                                                                type="submit">Save for
                                                                later <i class="fa fa-save"></i></button>
                                                            <button class="btn btn-danger rounded-0 mr-2">Cancel <i
                                                                    class="fa fa-close"></i></button>
                                                            <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                                href="#nav-packagePayment" role="tab" aria-controls="nav-packagePayment"
                                                                aria-selected="false">Next
                                                                <span><i class="fa fa-arrow-right"></i></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Package and payment modules -->
                                    <div class="tab-pane tab-pane-background fade" id="nav-packagePayment" role="tabpanel"
                                        aria-labelledby="nav-packagePayment-tab">
                                        <div class="row">
                                            <div class="col form-2-box wow fadeInUp">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2">Select Packaging</legend>
                                                            <div class="table-responsive mt-3">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Packaging</th>
                                                                            <th>Quantity</th>
                                                                            <th>Weight (Kg)</th>
                                                                            <th>Dimensions (cm)</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <select name="packaging_type" id=""
                                                                                    class="form-select mr-5">
                                                                                    <option value="">--Select--</option>
                                                                                    <option value="dhl-flyer" selected>DHL FLYER
                                                                                    </option>
                                                                                </select>
                                                                                <div class="row text-end mb-3">
                                                                                @if($errors->has('packaging_type'))
                                                                                    <div class="error">{{ $errors->first('packaging_type') }}</div>
                                                                                @endif
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control"
                                                                                    name="quantity" id="" placeholder="1" value="{{old('quantity')}}">
                                                                                    <div class="row text-end mb-3">
                                                                                    @if($errors->has('quantity'))
                                                                                        <div class="error">{{ $errors->first('quantity') }}</div>
                                                                                    @endif
                                                                                    </div>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control"
                                                                                    name="weight" id="" placeholder="0.5" value="{{old('weight')}}">
                                                                                    <div class="row text-end mb-3">
                                                                                    @if($errors->has('weight'))
                                                                                        <div class="error">{{ $errors->first('weight') }}</div>
                                                                                    @endif
                                                                                    </div>
                                                                            </td>
                                                                            <td class="d-flex">
                                                                                <input type="text" class="form-control"
                                                                                    name="length" id="" placeholder="L" value="{{old('length')}}">&nbsp;
                                                                                <i class="fa fa-times mt-2"></i>&nbsp;
                                                                                <div class="row text-end mb-3">
                                                                                @if($errors->has('length'))
                                                                                    <div class="error">{{ $errors->first('length') }}</div>
                                                                                @endif
                                                                                </div>
                                                                                <input type="text" class="form-control"
                                                                                    name="breadth" id="" placeholder="B" value="{{old('breadth')}}">&nbsp;<i
                                                                                    class="fa fa-times mt-2"></i>&nbsp;&nbsp;
                                                                                    <div class="row text-end mb-3">
                                                                                    @if($errors->has('breadth'))
                                                                                        <div class="error">{{ $errors->first('breadth') }}</div>
                                                                                    @endif
                                                                                    </div>
                                                                                <input type="text" class="form-control"
                                                                                    name="height" id="" placeholder="H" value="{{old('height')}}">
                                                                                    <div class="row text-end mb-3">
                                                                                    @if($errors->has('height'))
                                                                                        <div class="error">{{ $errors->first('height') }}</div>
                                                                                    @endif
                                                                                    </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="font-weight-bold">Total</td>
                                                                            <td class="font-weight-bold">1</td>
                                                                            <td class="font-weight-bold">0.5 Kg</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                        <div class="text-end">
                                                            <button type="button" disabled class="btn btn-success rounded-0">Save package <i
                                                                    class="fa fa-save"></i></button>
                                                            <button type="button" disabled class="btn btn-primary rounded-0">Copy <i
                                                                    class="fa fa-copy"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3 mt-3">
                                                            <legend class="w-auto px-2">Payment for Transportation
                                                            </legend>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group mt-3">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                How will you pay for transportation charges?
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select name="transportation_charges" id=""
                                                                                    class="form-select">
                                                                                    <option value="">--Select--</option>
                                                                                    <option value="" selected>531153424
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group mt-3">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                How will duties and taxes be paid?
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select name="tax_pay_type" id=""
                                                                                    class="form-select">
                                                                                    <option value="">--Select--</option>
                                                                                    <option value="receiver_will_pay" selected>Receiver will
                                                                                        pay
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group mt-3">
                                                                    <div class="col-md-4">
                                                                        <input type="checkbox" name="" id=""> Remember
                                                                        these payment options for the
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <select name="payment_option" id="" class="form-select">
                                                                            <option value="">--Select--</option>
                                                                            <option value="ship_from_address" selected>Ship From Address
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="row text-end mb-3">
                                                                        @if($errors->has('payment_option'))
                                                                            <div class="error">{{ $errors->first('payment_option') }}</div>
                                                                        @endif
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="box1 mt-2">
                                                                <h6 class="font-weight-bold">Additional customs details are
                                                                    needed for this shipment</h6>
                                                                <p>In order to complete this shipment you are required to
                                                                    provide the following details for customs.</p>
                                                                <div class="row form-group mt-3">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label">
                                                                            Select customs terms of trade View Definitions
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <select name="shipment_status" id="" class="form-select">
                                                                                <option value="">--Select--</option>
                                                                                <option value="delivered_at_place" selected>DAP - Delivered at
                                                                                    Place
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="text-end">
                                                            <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                                href="#nav-courierShipment" role="tab"
                                                                aria-controls="nav-packagePayment"
                                                                aria-selected="false">Next <span
                                                                    class="fa fa-arrow-right"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Sending shipment & Courier & pickup modules -->
                                    <div class="tab-pane tab-pane-background fade" id="nav-courierShipment" role="tabpanel"
                                        aria-labelledby="nav-courierShipment-tab">
                                        <div class="row">
                                            <div class="col form-2-box wow fadeInUp">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2">Shipment</legend>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="row form-group mt-3">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">
                                                                                <span class="required-star">*</span>
                                                                                Shipment Date
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="date" name="shipment_date" id="" class="form-control" value="{{old('shipment_date')}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row text-end mb-3">
                                                                        @if($errors->has('shipment_date'))
                                                                            <div class="error">{{ $errors->first('shipment_date') }}</div>
                                                                        @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <fieldset class="form-group border p-3 mt-5">
                                                                    <legend class="w-auto px-2">Courier Pickup</legend>
                                                                    <div class="row form-group mt-4">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">
                                                                                <span class="required-star">*</span>
                                                                                Do you want to schedule a courier pickup?
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select name="schedule_courier_pickup" id="" class="form-select">
                                                                                <option value="" {{old('schedule_courier_pickup') == '' ? 'selected' : ''}}>--Select--</option>
                                                                                <option value="yes" {{old('schedule_courier_pickup') == 'yes' ? 'selected' : ''}}>Yes - Schedule Pickup</option>
                                                                                <option value="no" {{old('schedule_courier_pickup') == 'no' ? 'selected' : ''}}>No</option>
                                                                                </select> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="row text-end mb-3">
                                                                        @if($errors->has('schedule_courier_pickup'))
                                                                            <div class="error">{{ $errors->first('schedule_courier_pickup') }}</div>
                                                                        @endif
                                                                        </div>
                                                                    </div>
                                                                  
                                                                    <div class="alert alert-secondary mt-4" role="alert">
                                                                        <h6 class="alert-heading font-weight-bold">TSA
                                                                            Privacy Notification</h6>
                                                                        <a href="" style="text-decoration: none">Please read
                                                                            TSA privacy act notification.</a>
                                                                    </div>
                                                                    <div class="mt-4">
                                                                        <input type="checkbox" name="" id="" checked>
                                                                        Disclaimer and Important Details
                                                                    </div>
                                                                    <div class="alert alert-info" role="alert">
                                                                        <p style="color: black">Show Disclaimer</p>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <fieldset class="form-group border p-3 mt-5">
                                                                    <legend class="w-auto px-2">Shipment Cost Summary
                                                                    </legend>
                                                                    <h6 class="mt-3 font-weight-bold">EXPRESS WORLDWIDE
                                                                    </h6>
                                                                    <div class="row form-group mt-3">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                <span class="required-star">*</span>
                                                                                Shipment Details
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <div class="d-flex">
                                                                                    <input type="text" class="form-control" value="Wed, 2 Mar, 2022 - End of Day" readonly name="shipment_details">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                <span class="required-star">*</span>
                                                                                Total
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <div class="d-flex">
                                                                                    <input type="text" class="form-control" value="" name="total" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                <span class="required-star">*</span>
                                                                                Volumetric Weight
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <div class="d-flex">
                                                                                    <input type="text" class="form-control" value="0.357kg" readonly name="volumetric_weight">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                <span class="required-star">*</span>
                                                                                Total Weight
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <div class="d-flex">
                                                                                    <input type="text" class="form-control" value="0.5kg" readonly name="total_weight">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label">
                                                                                <span class="required-star">*</span>
                                                                                Chargeable Weight
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <div class="d-flex">
                                                                                    <input type="text" class="form-control" value="0.5kg" readonly name="chargeable_weight">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="alert alert-warning alert-dismissible fade show mt-2"
                                                                        role="alert">
                                                                        <i class="fa fa-exclamation-triangle"></i>
                                                                        Pickup cutoff time has passed <strong>Delivery date
                                                                            may be one day later.</strong>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="alert" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    {{-- <div class="alert alert-secondary" role="alert">
                                                                        <h6 class="alert-heading font-weight-bold">Terms
                                                                            and Conditions</h6>
                                                                        <p>By clicking on <a href=""
                                                                                style="text-decoration: none">Accept and
                                                                                Continue</a> I am agreeing to Terms and
                                                                            Conditions, and declare that this shipment does
                                                                            not include any Prohibited Items.</p>
                                                                    </div> --}}
                                                                </fieldset>
                                                            </div>
                                                            <div class="alert alert-secondary" role="alert">
                                                                <h6 class="alert-heading font-weight-bold">Terms
                                                                    and Conditions</h6>
                                                                <p>By clicking on <a href=""
                                                                        style="text-decoration: none">Accept and
                                                                        Continue</a> I am agreeing to Terms and
                                                                    Conditions, and declare that this shipment does
                                                                    not include any Prohibited Items.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <button class="btn btn-success rounded-0" onclick = "return validate()">Accept and
                                                            Continue <i class="fa fa-check-circle"></i></button>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">          
     function validate()
    {
        var name = $("input[name = 'from_name']").val();
        if(name<1)
        {
            $('.nav-link').removeClass('active');
            $('#nav-fromto-tab').addClass('active');
            $('.tab-pane-background').removeClass('active show');
            $('#nav-fromto').addClass('active show');
            alert("name is required");
            $("input[name='from_name']").focus();
            return false;
        }

        var country = $("input[name = 'from_country']").val();
        if(country<1)
        {
            $('.nav-link').removeClass('active');
            $('#nav-fromto-tab').addClass('active');
            $('.tab-pane-background').removeClass('active show');
            $('#nav-fromto').addClass('active show');
            alert("from_country is required");
            $("input[name='from_country']").focus();
            return false;
        }     
        var from_address1 = $("input[name = 'from_address1']").val();
        if(from_address1<1)
        { 
            $('.nav-link').removeClass('active');
            $('#nav-fromto-tab').addClass('active');
            $('.tab-pane-background').removeClass('active show');
            $('#nav-fromto').addClass('active show');
            alert("from_address1 is required");
            $("input[name='from_address1']").focus();
            return false;
        } 
        var from_state = $("input[name = 'from_state']").val();
        if(from_state<1)
        {
            $('.nav-link').removeClass('active');
            $('#nav-fromto-tab').addClass('active');
            $('.tab-pane-background').removeClass('active show');
            $('#nav-fromto').addClass('active show');
            alert("from_state is required");
            $("input[name='from_state']").focus();
            return false;
        }     
        var from_city = $("input[name = 'from_city']").val();
        if(from_city<1)
        {
            $('.nav-link').removeClass('active');
            $('#nav-fromto-tab').addClass('active');
            $('.tab-pane-background').removeClass('active show');
            $('#nav-fromto').addClass('active show');
            alert("from_city is required");
            $("input[name='from_city']").focus();
            return false;
        } 
        var from_phone = $("input[name = 'from_phone']").val();
        if(from_phone<1)
        {   
            $('.nav-link').removeClass('active');
            $('#nav-fromto-tab').addClass('active');
            $('.tab-pane-background').removeClass('active show');
            $('#nav-fromto').addClass('active show');
            alert("from_phone is required");
            $("input[name='from_phone']").focus();
            return false;
        } 
        var to_phone = $("input[name = 'to_phone']").val();
        if(to_phone<1)
        {
            $('.nav-link').removeClass('active');
            $('#nav-fromto-tab').addClass('active');
            $('.tab-pane-background').removeClass('active show');
            $('#nav-fromto').addClass('active show');
            alert("to_phone is required");
            $("input[name='to_phone']").focus();
            return false;
        } 
        var services_invoice_no = $("input[name = 'services_invoice_no']").val();
        if(services_invoice_no<1)
        {
            alert("services_invoice_no is required");
            $("input[name='services_invoice_no']").focus();
            return false;
        } 
        // var tax_payment_option = $("input[name = 'tax_payment_option']").val();
        // if(tax_payment_option<1)
        // {
        //     alert("tax_payment_option is required");
        //     $("input[name='tax_payment_option']").focus();
        //     return false;
        // } 
        // var net_weight = $("input[name = 'net_weight']").val();
        // if(net_weight<1)
        // {
        //     alert("net_weight is required");
        //     $("input[name='net_weight']").focus();
        //     return false;
        // } 
        // var item_value = $("input[name = 'item_value']").val();
        // if(item_value<1)
        // {
        //     alert("item_value is required");
        //     $("input[name='item_value']").focus();
        //     return false;
        // } 
        // var gross_weight = $("input[name = 'gross_weight']").val();
        // if(gross_weight<1)
        // {
        //     alert("gross_weight is required");
        //     $("input[name='gross_weight']").focus();
        //     return false;
        // } 
        // var item_made_place = $("input[name = 'item_made_place']").val();
        // if(item_made_place<1)
        // {
        //     alert("item_made_place is required");
        //     $("input[name='item_made_place']").focus();
        //     return false;
        // } 
    }
        var i = 1;
   $( document ).ready(function() {
       $.ajax({
           url: "{{route('dhl.generate-awb')}}",
           type: "get",
           data: {'token':'{{csrf_token()}}'},
           success: function(response){
            var data1 = parseInt(response) + parseInt(1);
            var response = 'DHL'+response;
            var data1 = 'DHL'+data1;
            console.log(response);
            console.log(data1);
            $("input[name='awb_no[]']").val(response);
            $("#awb_no"+i).val(data1);
           i++;
           }
       });
       $(".add-dhl-from").click(function() {
       });
    });

</script>

<script type="text/javascript">

   
   //Add FRom More
   var scntDiv = $(".dhl-from-add");
	var i = 1;
   $(function() {
		$(".add-dhl-from").click(function() {
               $("<div class='dhl-from-adds'><div class='row form-group mt-3'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Awb No</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' name='awb_no[]' id='awb_no"+i+ 
               "'class='form-control' value='{{old('awb_no')}}' readonly></div></div></div><div class='row form-group mt-3'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Name</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' name='from_name[]' id='from_name"+i+
               "' class='form-control' value='{{old('from_name')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('from_name'))<div class='error'{{ $errors->first('from_name') }}</div>@endif</div></div><div class='mb-3'><input type='checkbox' name='from_business_contact[]' id='from_business_contact"+i+
               "' checked> Business Contact</div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'>Company</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' class='form-control' name='from_company[]' id='from_company"+i+
               "' value='{{old('from_company')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('from_company'))<div class='error'>{{ $errors->first('from_company') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Country/Territory</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input id='country"+i+
               "' type='text' class='form-control fromcountry' name='from_country[]' value='{{old('from_country')}}' placeholder='Search Country...' onkeyup='return deleteCountry()'>@if($errors->has('from_country'))<div class='error text-end'>{{ $errors->first('from_country') }}</div>@endif</div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Address 1</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' class='form-control' name='from_address1[]' id='from_address1("+i+
               ")' value='{{old('from_address1')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('from_address1'))<div class='error'>{{ $errors->first('from_address1') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Address 2</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' class='form-control' name='from_address2[]' id ='from_address2("+i+
               ")' value='{{old('from_address2')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('from_address2'))<div class='error'>{{ $errors->first('from_address2') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Address 3</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' class='form-control' name='from_address3[]' id='from_address3("+i+
               ")' value='{{old('from_address3')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('from_address3'))<div class='error'>{{ $errors->first('from_address3') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Postal Code</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='number' class='form-control' name='from_postal_code[]' id='from_postal_code"+i+
               "'value='{{old('from_postal_code')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('from_postal_code'))<div class='error'>{{ $errors->first('from_postal_code') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>State</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input id='state"+i+
               "' type='text' class='form-control fromstate' name='from_state[]' value='{{old('from_state')}}' placeholder='Search State...' onkeyup='return searchState()'>@if($errors->has('from_state'))<div class='error text-end'>{{ $errors->first('from_state') }}</div>@endif</div></div></div> <div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>City</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input id='city"+i+
               "' type='text' class='form-control fromcity' name='from_city[]' value='{{old('from_city')}}' placeholder='Search City...' onkeyup='return searchCity()'>@if($errors->has('from_city'))<div class='error text-end'>{{ $errors->first('from_city') }}</div>@endif  </div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label '>Email Address</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='email' class='form-control' name='from_email[]' id='from_email"+i+
               "'value='{{old('from_email')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('from_email'))<div class='error'>{{ $errors->first('from_email') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Phone Type</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><select name='from_phone_type[]' id='from_phone_type"+i+
               "'class='form-select'><option value=''>--Select--</option><option value='mobile' selected>Mobile</option><option value='telephone'>Telephone</option></select></div></div><div class='row text-end mb-3'>@if($errors->has('from_phone_type'))<div class='error'>{{ $errors->first('from_phone_type') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Code</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><select name='from_code[]' id='from_code"+i+
               "' class='form-select'><option value=''>--Select--</option><option value='+91' selected>91 (IND)</option><option value='+54'>54 (ARG)</option></select></div></div><div class='row text-end mb-3'>@if($errors->has('from_code'))<div class='error'>{{ $errors->first('from_code') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Phone</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='number' name='from_phone[]' id='from_phone"+i+
               "'class='form-control' value='{{old('from_phone')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('from_phone'))<div class='error'>{{ $errors->first('from_phone') }}</div>@endif</div></div><div class='mb-3'><input type='checkbox' name='from_sms_enabled[]' id='from_sms_enabled"+i+
               "'> SMS Enabled</div><button type='button' class='btn btn-danger' onclick='removeCont(this);'>Delete</button></div></div></div></div></div></div></div>")
               .appendTo(scntDiv);
               i++;
               return false;
               });
               });
    function removeCont(_this) {
		if (i > 1) {
			$(_this).parents('.dhl-from-adds').remove();
			i--;
		}
	}

    //Add To Form
    var dhlToAdd = $(".dhl-to-add");
	var i = 1;
   $(function() {
		$(".add-dhl-to").click(function() {
               $("<div class='dhl-to-adds'><div class='row form-group mt-3'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Name</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' name='to_name[]' id='to_name"+i+
               "' class='form-control' value='{{old('to_name')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('to_name'))<div class='error'{{ $errors->first('to_name') }}</div>@endif</div></div><div class='mb-3'><input type='checkbox' name='to_business_contact[]' id='to_business_contact"+i+
               "' checked> Business Contact</div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'>Company</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' class='form-control' name='to_company[]' id='to_company"+i+
               "' value='{{old('to_company')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('to_company'))<div class='error'>{{ $errors->first('to_company') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Country/Territory</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input id='country"+i+
               "' type='text' class='form-control tocountry' name='to_country[]' value='{{old('to_country')}}' placeholder='Search Country...' onkeyup='return deleteCountry()'>@if($errors->has('to_country'))<div class='error text-end'>{{ $errors->first('to_country') }}</div>@endif</div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Address 1</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' class='form-control' name='from_address1[]' id='to_address1("+i+
               ")' value='{{old('to_address1')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('to_address1'))<div class='error'>{{ $errors->first('to_address1') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Address 2</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' class='form-control' name='to_address2[]' id ='to_address2("+i+
               ")' value='{{old('to_address2')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('to_address2'))<div class='error'>{{ $errors->first('to_address2') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Address 3</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' class='form-control' name='to_address3[]' id='to_address3("+i+
               ")' value='{{old('to_address3')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('to_address3'))<div class='error'>{{ $errors->first('to_address3') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Postal Code</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='number' class='form-control' name='to_postal_code[]' id='to_postal_code"+i+
               "'value='{{old('to_postal_code')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('to_postal_code'))<div class='error'>{{ $errors->first('to_postal_code') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Province</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input id='state"+i+
               "' type='text' class='form-control tostate' name='to_state[]' value='{{old('to_state')}}' placeholder='Search Province...' onkeyup='return searchState()'>@if($errors->has('to_state'))<div class='error text-end'>{{ $errors->first('to_state') }}</div>@endif</div></div></div> <div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>City</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input id='city"+i+
               "' type='text' class='form-control tocity' name='to_city[]' value='{{old('to_city')}}' placeholder='Search City...' onkeyup='return searchCity()'>@if($errors->has('to_city'))<div class='error text-end'>{{ $errors->first('to_city') }}</div>@endif  </div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label '>Email Address</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='email' class='form-control' name='to_email[]' id='to_email"+i+
               "'value='{{old('to_email')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('to_email'))<div class='error'>{{ $errors->first('to_email') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Phone Type</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><select name='to_phone_type[]' id='to_phone_type"+i+
               "'class='form-select'><option value=''>--Select--</option><option value='mobile' selected>Mobile</option><option value='telephone'>Telephone</option></select></div></div><div class='row text-end mb-3'>@if($errors->has('to_phone_type'))<div class='error'>{{ $errors->first('to_phone_type') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Code</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><select name='to_code[]' id='to_code"+i+
               "' class='form-select'><option value=''>--Select--</option><option value='+91' selected>91 (IND)</option><option value='+54'>54 (ARG)</option></select></div></div><div class='row text-end mb-3'>@if($errors->has('to_code'))<div class='error'>{{ $errors->first('to_code') }}</div>@endif</div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Phone</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='number' name='to_phone[]' id='to_phone"+i+
               "'class='form-control' value='{{old('to_phone')}}'></div></div><div class='row text-end mb-3'>@if($errors->has('to_phone'))<div class='error'>{{ $errors->first('to_phone') }}</div>@endif</div></div><div class='mb-3'><input type='checkbox' name='to_sms_enabled[]' id='to_sms_enabled"+i+
               "'> SMS Enabled</div><button type='button' class='btn btn-danger' onclick='removeTo(this);'>Delete</button></div></div></div></div></div></div></div>")
               .appendTo(dhlToAdd);
               i++;
               return false;
               });
               });
    function removeTo(_this) {
		if (i > 1) {
			$(_this).parents('.dhl-to-adds').remove();
			i--;
		}
	}

     //Add Item
     var dhlItem = $(".dhl-add-item");
	var i = 1;
   $(function() {
		$(".add-item").click(function() {
               $("<div class='row dhl-add-items'><div class='col-md-6'><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Item Description</label></div> <div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><textarea name='item_description[]' id='item_description"+i+
               "' class='dhltext' rows='2'></textarea></div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'>Quantity</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='number' class='form-control' name='item_quantity[]' id='item_quantity"+i+
               "'></div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'>Units</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><select name='unit[]' class='form-select' id='unit"+i+
               "'><option value=''>--Select--</option></select></div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Item Value</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' class='form-control' name='item_value[]' id='item_value"+i+
               "'> INR</div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'>Total Units</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><span class='font-weight-bold'>1</span></div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'>Total Net Weight</label></div><div class='col-md-8'><div class='bind_input'><span
                class='spacing'>:</span><span class='font-weight-bold'>KG</span></div></div></div></div><div class='col-md-6'><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'>Export Commodity Code</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><select name='commodity_code[]' class='form-select' id='commodity_code"+i+
               "'>@foreach($commodities as $commodity)<option value=''>--Select--</option><option value='{{$commodity->id}}'>{{$commodity->code}}-{{$commodity->name}}</option>@endforeach</select></div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Net Weight &nbsp; <i class='fa fa-info-circle icon'></i></label></div><div class='col-md-8'><div class='bind_input'><span class=
               'spacing'>:</span><input type='text' class='form-control' name='net_weight' id=''> Kg</div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Gross Weight &nbsp; <i class='fa fa-info-circle icon'></i></label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span>
               <input type='text' class='form-control' name='gross_weight[]' id='gross_weight"+i+
               "'> Kg</div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'><span class='required-star'>*</span>Where was the item made? &nbsp; <i class='fa fa-info-circle icon'></i></label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><input type='text' class='form-control' name='item_made_place[]' id='item_made_place"+i+
               "'></div></div></div><div class='row form-group'><div class='col-md-4'><label for='name' class='form-label'>Total Gross Weight</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><span class='font-weight-bold'>KG</span></div></div></div></div><div><button type='button' class='btn btn-danger' onclick='removeTo(this);'>Delete</button></div></div></div></div></div></div></div>")
               .appendTo(dhlItem);
               i++;
               return false;
               });
               });
    function removeTo(_this) {
		if (i > 1) {
			$(_this).parents('.dhl-add-items').remove();
			i--;
		}
	}
 
</script>

@endpush
