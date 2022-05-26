@extends('layouts.main')
@section('content')
<style>
    
    .image-style {
        width:50%;
        height:200px;
        display:none;
        margin-left:auto;
        margin-right:auto;
    }
    </style>

<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="mt-5">
                    @if(Session::has('success'))
                        <div class="col-md-6 offset-md-3">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Success!</strong> {{Session::get('success')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="col-md-6 offset-md-3">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Error!</strong> {{Session::get('error')}}
                            </div>
                        </div>
                    @endif
                 
                    {{--@if($errors->any())
                        @foreach ($errors->all() as $error)
                          <span class="btn btn-danger btn-sm mb-2">{{ $error }}</span>
                        @endforeach
                    @endif--}}
                   

                    <!-- <div class="tab-pane fade show active" id="custmeraccount" role="tabpanel" aria-labelledby="custmeraccount-tab"> -->
                    <form class="" method="post" action="{{route('customers.account.store')}}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="detail_edit p-0" style="background: transparent;">
                            <nav class="tab">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-customer-tab" data-toggle="tab"
                                        href="#nav-customer" role="tab" aria-controls="nav-customer"
                                        aria-selected="true">Customer Details</a>
                                    <a class="nav-link" id="nav-credit-tab" data-toggle="tab" href="#nav-credit"
                                        role="tab" aria-controls="nav-credit" aria-selected="false">Credit Limit
                                        Setting</a>
                                    <a class="nav-link" id="nav-bank-tab" data-toggle="tab" href="#nav-bank" role="tab"
                                        aria-controls="nav-bank" aria-selected="false">Bank Details</a>
                                    <a class="nav-link" id="nav-kyc-tab" data-toggle="tab" href="#nav-kyc" role="tab"
                                        aria-controls="nav-kyc" aria-selected="false">Document Details</a>
                                    <a class="nav-link" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab"
                                        aria-controls="nav-login" aria-selected="false">Login Details</a>
                                   
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <!-- Customer Details Form -->
                                <div class="tab-pane tab-pane-background fade active show" id="nav-customer"
                                    role="tabpanel" aria-labelledby="nav-customer-tab">
                                    <div class="row">
                                        <div class="col form-2-box wow fadeInUp">
                                            <!-- <form action="" method="post" class="m-2"> -->
                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <fieldset class="border p-3 mt-4">
                                                            <legend class="w-auto px-2">Customer Details</legend>
                                                            <div class="row form-group mt-2">
                                                                <div class="col-md-4">
                                                                    <!-- <div class="d-flex"> -->
                                                                        <label for="name" class="form-label ">
                                                                        <span class="required-star">*</span>
                                                                            
                                                                        Type</label>
                                                                    <!-- </div> -->
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="" name="type" id="types" value="{{old('type')}}">
                                                                            <option value="" {{old('type') == '' ? 'selected' : ''}}>Select Type</option>
                                                                            <option value="agent" {{old('type') == 'agent' ? 'selected' : ''}}>Agent</option>
                                                                            <option value="branch" {{old('type') == 'branch' ? 'selected' : ''}}>Branch</option>
                                                                            <option value="corporate" {{old('type') == 'corporate' ? 'selected' : ''}}>Corporate</option>
                                                                            <option value="franchise" {{old('type')=='franchise'?'selected': ''}}>Franchise</option>
                                                                            <option value="coloader" {{old('type')=='coloader'?'selected': ''}}>Coloader</option>
                                                                        </select>
                                                                    </div>
                                                                    @if($errors->has('type'))
                                                                      <div class="error text-end">{{ $errors->first('type') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                        
                                                                    SrNo</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control" name="slno1" value="{{old('slno1')}}">
                                                                                @if($errors->has('slno1'))
                                                                                  <div class="error text-end">{{ $errors->first('slno1') }}</div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" name="slno2" value="{{old('slno2')}}">
                                                                                @if($errors->has('slno2'))
                                                                                  <div class="error text-end">{{ $errors->first('slno2') }}</div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Business
                                                                        Type</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select mb-1"
                                                                            aria-label="Default select example" name="business_type" id="business_type" value="{{old('business_type')}}">
                                                                            <option value="" {{old('business_type') == '' ? 'selected' : ''}} selected disabled>Select Business Type</option>
                                                                            <option value="b2c" {{old('business_type') == 'b2c' ? 'selected' : ''}}>B2C</option>
                                                                            <option value="b2b" {{old('business_type') == 'b2b'? 'selected': ''}}>B2B</option>
                                                                    
                                                                        </select>
                                                                    </div>
                                                                    @if($errors->has('business_type'))
                                                                      <div class="error text-end">{{ $errors->first('business_type') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Name</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                                                    </div>
                                                                    @if($errors->has('name'))
                                                                      <div class="error text-end">{{ $errors->first('name') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Code</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input id="code" type="text" class="form-control" name="code" value="{{old('code')}}">
                                                                        <div class="d-flex">
                                                                            <button id="search-code" type="button" class="btn btn-common rounded-0 save-btn"><i
                                                                                    class="fa fa-search"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    @if($errors->has('code'))
                                                                      <div class="error text-end">{{ $errors->first('code') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <fieldset class="form-group border p-3 mt-4">
                                                            <legend class="w-auto px-2">GST No/PAN No</legend>
                                                            <div class="row form-group mt-2">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">GST No</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input id="gstno" type="text" class="form-control" name="gst_no" value="{{old('gst_no')}}" onblur="verifyGstStatewise()">
                                                                    </div>
                                                                    @if($errors->has('gst_no'))
                                                                      <div class="error text-end">{{ $errors->first('gst_no') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    PAN No</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="pan_no" value="{{old('pan_no')}}" return onblur="checkPan()">
                                                                    </div>
                                                                    @if($errors->has('pan_no'))
                                                                      <div class="error text-end">{{ $errors->first('pan_no') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">IEC No</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="iec_no" value="{{old('iec_no')}}">
                                                                    </div>
                                                                    @if($errors->has('iec_no'))
                                                                      <div class="error text-end">{{ $errors->first('iec_no') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Aadhaar
                                                                        No</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="number" class="form-control" name="aadhar_no" value="{{old('aadhar_no')}}" return onblur="checkAadhar()">
                                                                    </div>
                                                                    @if($errors->has('aadhar_no'))
                                                                      <div class="error text-end">{{ $errors->first('aadhar_no') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    Passport No   
                                                                </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="passport_no" value="{{old('passport_no')}}" return onblur="checkPassport()">
                                                                    </div>
                                                                    @if($errors->has('passport_no'))
                                                                      <div class="error text-end">{{ $errors->first('passport_no') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row mt-5">
                                                    <div class="col-md-6">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2">Address Details</legend>
                                                            <div class="row form-group mt-2">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Contact
                                                                        Person</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="contact_person" value="{{old('contact_person')}}">
                                                                    </div>
                                                                    @if($errors->has('contact_person'))
                                                                      <div class="error text-end">{{ $errors->first('contact_person') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Address
                                                                        Line1</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="address1" value="{{old('address1')}}">
                                                                    </div>
                                                                    @if($errors->has('address1'))
                                                                      <div class="error text-end">{{ $errors->first('address1') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Address
                                                                        Line2</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="address2" value="{{old('address2')}}">
                                                                        @if($errors->has('address2'))
                                                                          <div class="error text-end">{{ $errors->first('address2') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Address
                                                                        Line3</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="address3" value="{{old('address3')}}">
                                                                    </div>
                                                                    @if($errors->has('address3'))
                                                                      <div class="error text-end">{{ $errors->first('address3') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Pincode
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="number" class="form-control" name="pincode" value="{{old('pincode')}}" return onblur="checkPincode()">
                                                                    </div>
                                                                    @if($errors->has('pincode'))
                                                                      <div class="error text-end">{{ $errors->first('pincode') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Country
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
                                                                            <div class="col-md-4">
                                                                                <input id="country_code" type="text" class="form-control" name="country_code" value="{{old('country_code')}}" readonly>
                                                                                @if($errors->has('country_code'))
                                                                                  <div class="error text-end">{{ $errors->first('country_code') }}</div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input id="country" type="text" class="form-control country" name="country" value="{{old('country')}}" placeholder="Search Country..." onkeyup="return deleteCountry()">
                                                                                @if($errors->has('country'))
                                                                                  <div class="error text-end">{{ $errors->first('country') }}</div>
                                                                                @endif
                                                                                <div class="bg-dark country-suggestion search-suggestion"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    State
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
                                                                            <div class="col-md-4">
                                                                                <input id="state_code" type="text" class="form-control" name="state_code" value="{{old('state_code')}}" readonly>
                                                                                @if($errors->has('state_code'))
                                                                                  <div class="error text-end">{{ $errors->first('state_code') }}</div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input id="state" type="text" class="form-control" name="state" value="{{old('state')}}" placeholder="Search State..." onkeyup="return searchState()">
                                                                                @if($errors->has('state'))
                                                                                  <div class="error text-end">{{ $errors->first('state') }}</div>
                                                                                @endif
                                                                                <div class="bg-dark state-suggestion search-suggestion"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    City
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
                                                                            <div class="col-md-4">
                                                                                <input id="city_code" type="text" class="form-control" name="city_code" value="{{old('city_code')}}" readonly>
                                                                                @if($errors->has('city_code'))
                                                                                  <div class="error text-end">{{ $errors->first('city_code') }}</div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input id="city" type="text" class="form-control" name="city" value="{{old('city')}}" placeholder="Search City..." onkeyup="return searchCity()">
                                                                                @if($errors->has('city'))
                                                                                  <div class="error text-end">{{ $errors->first('city') }}</div>
                                                                                @endif
                                                                                <div class="bg-dark city-suggestion search-suggestion"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Branch
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control" name="branch_code" value="{{old('branch_code')}}">
                                                                                @if($errors->has('branch_code'))
                                                                                  <div class="error text-end">{{ $errors->first('branch_code') }}</div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" name="branch" value="{{old('branch')}}">
                                                                                @if($errors->has('branch'))
                                                                                  <div class="error text-end">{{ $errors->first('branch') }}</div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Telephone
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="number" class="form-control" name="telephone" value="{{old('telephone')}}">
                                                                        @if($errors->has('telephone'))
                                                                          <div class="error text-end">{{ $errors->first('telephone') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    CS Email Id
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="cs_email" value="{{old('cs_email')}}">
                                                                        @if($errors->has('cs_email'))
                                                                          <div class="error text-end">{{ $errors->first('cs_email') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Billing Email
                                                                        Id
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="billing_email" value="{{old('billing_email')}}">
                                                                    </div>
                                                                    @if($errors->has('billing_email'))
                                                                      <div class="error text-end">{{ $errors->first('billing_email') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <span class="required-star">*</span>    
                                                                    Website
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="website" value="{{old('website')}}">
                                                                        @if($errors->has('website'))
                                                                          <div class="error text-end">{{ $errors->first('website') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        {{-- <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="" class="form-label">Search
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"> &nbsp;
                                                                    <button type="button"
                                                                        class="btn btn-primary rounded-0">Search</button>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <fieldset class="form-group border margin_top p-3">
                                                            <legend class="w-auto px-2">Sale Person/Account Manager
                                                            </legend>
                                                            <!-- <div class="row form-group mt-2">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">POC
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="sale_person" value="{{old('sale_person')}}">
                                                                    </div>
                                                                    @if($errors->has('sale_person'))
                                                                      <div class="error text-end">{{ $errors->first('sale_person') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div> -->
                                                            <div class="border_sales mt-2">
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Finance manager
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="text" class="form-control" name="finance_name" value="{{old('finance_name')}}">
                                                                        </div>
                                                                        @if($errors->has('finance_name'))
                                                                        <div class="error text-end">{{ $errors->first('finance_name') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Contact No 
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="number" class="form-control" name="finance_contact" value="{{old('finance_contact')}}">
                                                                    </div>
                                                                   
                                                                </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Email Id 
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="email" class="form-control" name="finance_email" value="{{old('finance_email')}}">
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="border_sales">
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Authorized  POC
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="text" class="form-control" name="authorized_name" value="{{old('authorized_name')}}">
                                                                        </div>
                                                                        @if($errors->has('authorized_name'))
                                                                        <div class="error text-end">{{ $errors->first('authorized_name') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Contact No 
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="number" class="form-control" name="authorized_contact" value="{{old('authorized_contact')}}">
                                                                        </div>
                                                                        @if($errors->has('authorized_contact'))
                                                                        <div class="error text-end">{{ $errors->first('authorized_contact') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Email Id 
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="text" class="form-control" name="authorized_email" value="{{old('authorized_email')}}">
                                                                        </div>
                                                                        @if($errors->has('authorized_email'))
                                                                        <div class="error text-end">{{ $errors->first('authorized_email') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="border_sales">
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Inext sales person
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="text" class="form-control" name="sales_person" value="{{old('sales_person')}}">
                                                                        </div>
                                                                        @if($errors->has('sales_person'))
                                                                        <div class="error text-end">{{ $errors->first('sales_person') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Contact No 
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="number" class="form-control" name="sales_contact" value="{{old('sales_contact')}}">
                                                                        </div>
                                                                        @if($errors->has('sales_contact'))
                                                                        <div class="error text-end">{{ $errors->first('sales_contact') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Email Id 
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="text" class="form-control" name="sales_email" value="{{old('sales_email')}}">
                                                                        </div>
                                                                        @if($errors->has('sales_email'))
                                                                        <div class="error text-end">{{ $errors->first('sales_email') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group border p-3 mt-5">
                                                            <legend class="w-auto px-2">Security Check</legend>
                                                            <div class="row form-group mt-2">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Status</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select" name="security_status" value="{{old('security_status')}}">
                                                                                    <option>Yes</option>
                                                                                    <option>No</option>
                                                                                </select>
                                                                            </div>
                                                                            @if($errors->has('security_status'))
                                                                        <div class="error text-end">{{ $errors->first('security_status') }}</div>
                                                                        @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <!-- <span class="required-star">*</span>     -->
                                                                    Check No.
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="number" class="form-control" name="check_no" value="{{old('check_no')}}">
                                                                    </div>
                                                                    @if($errors->has('check_no'))
                                                                        <div class="error text-end">{{ $errors->first('check_no') }}</div>
                                                                        @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Amount</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="number" class="form-control" name="amount" value="{{old('amount')}}">
                                                                    </div>
                                                                    @if($errors->has('amount'))
                                                                        <div class="error text-end">{{ $errors->first('amount') }}</div>
                                                                        @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <!-- <span class="required-star">*</span>-->
                                                                    Upload
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="file" class="form-control upload_file" name="upload_file" onchange="document.getElementById('upload_file').src = window.URL.createObjectURL(this.files[0])" value="{{old('upload_file')}}">
                                                                    </div>
                                                                    <img src="" id="upload_file" class="image-style">
                                                                    @if($errors->has('upload_file'))
                                                                        <div class="error text-end">{{ $errors->first('upload_file') }}</div>
                                                                        @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    Textarea
                                                                </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <Textarea class="fwdbillentryimporttext" id="textarea" name="textarea" value="{{old('textarea')}}">{{old('textarea')}}</Textarea>
                                                                        <!-- <input type="text" class="form-control" name="passport_no" value=""> -->
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group border p-3 mt-5">
                                                            <legend class="w-auto px-2">Account Setting</legend>
                                                            <div class="row form-group mt-3">
                                                                <div class="col-md-8">
                                                                    <div class=" row">
                                                                        <div class="col-md-3">
                                                                            <label for="" class="form-label">Tariff
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control" name="tariff" value="{{old('tariff')}}">
                                                                                <span class="sign">%</span>
                                                                            </div>
                                                                        </div>
                                                           
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name"
                                                                                class="form-label">GST</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select"  name="gst">
                                                                                    <option>Yes</option>
                                                                                    <option>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-3">
                                                                            <label for="name"
                                                                                class="form-label">Activate</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select" name="activate">
                                                                                    <option>Activate</option>
                                                                                    <option>Deactivate</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name"
                                                                                class="form-label">Billing</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select" name="billing">
                                                                                    <option>Yes</option>
                                                                                    <option>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-3">
                                                                            <label for="name" class="form-label">Auto
                                                                                Email</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select" name="auto_email">
                                                                                    <option>Yes</option>
                                                                                    <option>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-3">
                                                                            <label for="name"
                                                                                class="form-label">Fuel</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select" name="fuel_option">
                                                                                    <option>No</option>
                                                                                    <option>Yes</option>
                                                                                </select> &nbsp;
                                                                                <div class="d-flex">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="0" name="fuel_value" value="{{old('fuel_value')}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-3">
                                                                            <label for="name" class="form-label">Fuel
                                                                                (Imp)</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select" name="fuel_imp_option">
                                                                                    <option>Yes</option>
                                                                                    <option>No</option>
                                                                                </select> &nbsp;
                                                                                <div class="d-flex">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="0" name="fuel_imp_value" value="{{old('fuel_imp_value')}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name"
                                                                                class="form-label">Payment</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select" name="payment">
                                                                                    <option>Credit</option>
                                                                                    <option>Debit</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-3">
                                                                            <label for="name"
                                                                                class="form-label">Currency</label>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select" name="currency">
                                                                                    <option value="INR">INR</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-2">
                                                                            <label for="name" class="form-label">Group
                                                                                Code</label>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <div class="row form-row">
                                                                                    <div class="col-md-5">
                                                                                        <input type="text"
                                                                                            class="form-control" name="group_code1" value="{{old('group_code1')}}">
                                                                                    </div>
                                                                                    <div class="col-md-7">
                                                                                        <input type="text"
                                                                                            class="form-control" name="group_code2" value="{{old('group_code2')}}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label class="form-label">COVID
                                                                                Charges</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select" name="covid_charges">
                                                                                    <option>Yes</option>
                                                                                    <option>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                    <div class="text-end mt-3">
                                        <a href="{{route('customer-list')}}" class="btn btn-primary rounded-0 save-btn mr-3"> List
                                            <i class="fa fa-list ms-2"></i>
                                        </a>
                                        <a class="btn btn-secondary rounded-0" data-toggle="tab" href="#nav-credit" role="tab" aria-controls="nav-credit" aria-selected="false">Next <span><i class="fa fa-arrow-right"></i></span></a>
                                    </div>
                                </div>
                              
                                <!-- Credit Limit Setting -->
                                <div class="tab-pane tab-pane-background fade" id="nav-credit" role="tabpanel"
                                    aria-labelledby="nav-credit-tab">
                                    <div class="row">
                                        <div class="col form-2-box wow fadeInUp">
                                            <!-- <form action="" method="post" class="m-2"> -->
                                                <div class="col-md-12">
                                                    <fieldset class="form-group border p-3 mt-5">
                                                        <legend class="w-auto px-2">Credit Limit Setting
                                                        </legend>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-5">
                                                                        </div>
                                                                        <div class="col-md-7 ">
                                                                            <div class="form-group  mt-3">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input type="radio" name="credit_status" id="enabled" value="1" {{old('credit_status') == '1' ? 'checked' : ''}}>
                                                                                    &nbsp;&nbsp;
                                                                                    <label
                                                                                        class="form-check-label form-label text-success font-weight-bold"
                                                                                        for="enabled">
                                                                                        Enabled
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input type="radio" name="credit_status" id="disabled"
                                                                                        checked value="0" {{old('credit_status') == '0' ? 'checked' : ''}}> &nbsp;&nbsp;
                                                                                    <label
                                                                                        class="form-check-label form-label text-danger font-weight-bold"
                                                                                        for="disabled">
                                                                                        Disabled
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">Opening
                                                                                Balance</label>
                                                                        </div>
                                                                        <div class="col-md-8 ">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control" id="opening_balance" name="opening_balance" value="{{old('opening_balance')}}">
                                                                            </div>
                                                                            @if($errors->has('opening_balance'))
                                                                              <div class="error text-end">{{ $errors->first('opening_balance') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">Minimum Credit
                                                                                Limit</label>
                                                                        </div>
                                                                        <div class="col-md-8 ">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control" name="credit_limit" value="{{old('credit_limit')}}">
                                                                            </div>
                                                                            @if($errors->has('credit_limit'))
                                                                              <div class="error text-end">{{ $errors->first('credit_limit') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">Credit
                                                                                Balance</label>
                                                                        </div>
                                                                        <div class="col-md-8 ">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control" name="credit_balance" value="{{old('credit_balance')}}">
                                                                            </div>
                                                                            @if($errors->has('credit_balance'))
                                                                              <div class="error text-end">{{ $errors->first('credit_balance') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                    </div>
                                                                    <div class="col-md-8 ">
                                                                        <div class="form-check remove_ml form-check-inline ml-5">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="notify" id="disabled" value="1">
                                                                            <label
                                                                                class="form-check-label form-label text-info"
                                                                                for="disabled">
                                                                                Notify me when credit limit exceeded
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">Start
                                                                                Date</label>
                                                                        </div>
                                                                        <div class="col-md-8 ">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="date" class="form-control" name="" value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">End
                                                                                Date</label>
                                                                        </div>
                                                                        <div class="col-md-8 ">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="date" class="form-control" name="" value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">Total
                                                                                Outstanding</label>
                                                                        </div>
                                                                        <div class="col-md-8 ">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control" name="" value=""> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">Total
                                                                                Sales</label>
                                                                        </div>
                                                                        <div class="col-md-8 ">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control" name="total_sale" value="{{old('total_sale')}}">
                                                                            </div>
                                                                            @if($errors->has('total_sale'))
                                                                              <div class="error text-end">{{ $errors->first('total_sale') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">Total
                                                                                Payment</label>
                                                                        </div>
                                                                        <div class="col-md-8 ">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control" name="total_payment" value="{{old('total_payment')}}">
                                                                            </div>
                                                                            @if($errors->has('total_payment'))
                                                                              <div class="error text-end">{{ $errors->first('total_payment') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">Total
                                                                                Debit Note</label>
                                                                        </div>
                                                                        <div class="col-md-8 ">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control" name="total_debit_note" value="{{old('total_debit_note')}}">
                                                                            </div>
                                                                            @if($errors->has('total_debit_note'))
                                                                              <div class="error text-end">{{ $errors->first('total_debit_note') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">Total Credit
                                                                                Note</label>
                                                                        </div>
                                                                        <div class="col-md-8 ">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control" name="total_credit_note" value="{{old('total_credit_note')}}">
                                                                            </div>
                                                                            @if($errors->has('total_credit_note'))
                                                                              <div class="error text-end">{{ $errors->first('total_credit_note') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">Net Outstanding
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8 ">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control" name="outstanding" value="{{old('outstanding')}}">
                                                                            </div>
                                                                            @if($errors->has('outstanding'))
                                                                              <div class="error text-end">{{ $errors->first('outstanding') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                    <div class="text-end mt-3">
                                        <a href="{{route('customer-list')}}" class="btn btn-primary rounded-0 save-btn mr-3"> List
                                        <i class="fa fa-list ms-2"></i>
                                    </a>
                                    <a class="btn btn-secondary rounded-0" data-toggle="tab" href="#nav-bank" role="tab" aria-controls="nav-bank" aria-selected="false">Next <span><i class="fa fa-arrow-right"></i></span></a>
                                    </div>
                                </div>
                               
                                <!-- Bank Details Form -->
                                <div class="tab-pane tab-pane-background fade" id="nav-bank" role="tabpanel"
                                    aria-labelledby="nav-bank-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- <form action="" method="post" class="m-2"> -->
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend class="w-auto px-2">Bank Details</legend>
                                                    <div class="row form-group mt-3">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">Bank Name
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" name="bank_name" value="{{old('bank_name')}}">
                                                            </div>
                                                            @if($errors->has('bank_name'))
                                                              <div class="error text-end">{{ $errors->first('bank_name') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">A/C No
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" name="account_no" value="{{old('account_no')}}" >
                                                            </div>
                                                            @if($errors->has('account_no'))
                                                              <div class="error text-end">{{ $errors->first('account_no') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">IFSC
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" name="ifsc" value="{{old('ifsc')}}">
                                                            </div>
                                                            @if($errors->has('ifsc'))
                                                              <div class="error text-end">{{ $errors->first('ifsc') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">Bank Address
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" name="bank_address" value="{{old('bank_address')}}">
                                                            </div>
                                                            @if($errors->has('bank_address'))
                                                              <div class="error text-end">{{ $errors->first('bank_address') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">Branch Office
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" name="branch_office" value="{{old('branch_office')}}">
                                                            </div>
                                                            @if($errors->has('branch_office'))
                                                              <div class="error text-end">{{ $errors->first('branch_office') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                    <div class="text-end mt-3">
                                    <a href="{{route('customer-list')}}" class="btn btn-primary rounded-0 save-btn mr-3"> List
                                        <i class="fa fa-list ms-2"></i>
                                    </a>
                                        <a class="btn btn-secondary rounded-0" data-toggle="tab" href="#nav-kyc" role="tab" aria-controls="nav-kyc" aria-selected="false">Next <span><i class="fa fa-arrow-right"></i></span></a>
                                        
                                    </div>
                                </div>
                                <!-- KYC Details -->
                                <div class="tab-pane tab-pane-background fade" id="nav-kyc" role="tabpanel"
                                    aria-labelledby="nav-kyc-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- <form action="" method="post" class="m-2"> -->
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend class="w-auto px-2">Upload KYC Document</legend>
                                                    <div class="row mt-3" id="docscontainer">
                                                        <div class="col-md-6 docstocopy mb-3">
                                                            <div class="border p-2">
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Document
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8 ">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <select class="form-select" name="document[]">
                                                                                <option value="">-- Select --</option>
                                                                                <option value="BIN No">BIN No</option>
                                                                                <option value="CIN No">CIN No</option>
                                                                                <option value="CST">CST</option>
                                                                                <option value="TAN">TAN</option>
                                                                                <option value="VAT No">VAT No</option>
                                                                                <option value="GST IN">GST IN</option>
                                                                                <option value="PAN">PAN</option>
                                                                                <option value="CAF">CAF</option>
                                                                                <option value="KYC">KYC</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Document No
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8 ">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="text" class="form-control" name="documnet_no[]">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Select File Path
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8 ">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="file" class="form-control image" name="image[]" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" value="{{old('image')}}">
                                                                        </div>
                                                                        <img src="" id="image" class="image-style">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <button type="button" class="btn btn-secondary w-100" id="addmoredocs">Add More Docs</button>
                                                        </div>
                                                        <div class="col-3">
                                                            <button type="button" class="btn btn-danger w-100" id="removemoredocs">Remove More Docs</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="table-responsive mt-2">
                                                        <table class="table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Select</th>
                                                                    <th>Document</th>
                                                                    <th>KYC No</th>
                                                                    <th>File</th>
                                                                    <th>KYC Verify</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="checkbox" name="" id=""></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="">
                                                                            <label class="form-check-label">No/Yes</label>
                                                                          </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">KYC Verify By
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="verify_by" value="{{old('verify_by')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">KYC Verify
                                                                        Date/Time
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="date" class="form-control" name="verify_date_time">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">KYC Remark
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="remarks" value="{{old('remarks')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-5">
                                                                 
                                                                </div>
                                                                <div class="col-md-7 ">
                                                                    <div class="">
                                                                        <button class="btn btn-dark rounded-0">KYC Verify <i class="fa fa-check-circle"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Account Open By
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="open_by" value="{{old('open_by')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Account Modify By
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="modify_by" value="{{old('modify_by')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                     
                                    
                                    <div class="text-end mt-3">
                                        <a href="{{route('customer-list')}}" class="btn btn-primary rounded-0 save-btn mr-3"> List
                                        <i class="fa fa-list ms-2"></i></a>
                                        <a class="btn btn-secondary rounded-0" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-kyc" aria-selected="false">Next <span><i class="fa fa-arrow-right"></i></span></a>
                                    </div>
                                </div>

                                <!-- Bank Details Form -->
                                <div class="tab-pane tab-pane-background fade" id="nav-login" role="tabpanel"
                                    aria-labelledby="nav-bank-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- <form action="" method="post" class="m-2"> -->
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend class="w-auto px-2">Login Details</legend>
                                                    <div class="row form-group mt-3">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">Name
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" name="login_name" value="{{old('login_name')}}">
                                                            </div>
                                                            @if($errors->has('login_name'))
                                                              <div class="error text-end">{{ $errors->first('login_name') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">Email</label>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" name="login_email" value="{{old('login_email')}}" >
                                                            </div>
                                                            @if($errors->has('login_email'))
                                                              <div class="error text-end">{{ $errors->first('login_email') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">Password</label>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" name="login_password" value="{{old('login_password')}}">
                                                            </div>
                                                            @if($errors->has('login_password'))
                                                              <div class="error text-end">{{ $errors->first('login_password') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">Confirm Password</label>
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" name="login_password_confirmation" value="{{old('login_password_confirmation')}}">
                                                            </div>
                                                            @if($errors->has('login_password_confirmation'))
                                                              <div class="error text-end">{{ $errors->first('login_password_confirmation') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </fieldset>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer text-right mt-4">
                                        <a href="{{route('customer-list')}}" class="btn btn-primary rounded-0 save-btn mr-3"> List
                                            <i class="fa fa-list ms-2"></i>
                                        </a>
                                       {{-- <button type="button" class="btn btn-secondary save-btn mr-3"> Edit
                                            <i class="fa fa-edit ms-2"></i>
                                        </button>--}}
                                       
                                        <button class="btn btn-success save-btn" return onclick="return validate()">Save
                                            <i class="fa fa-save ms-2"></i>
                                        </button>
                                                          
                                    </div>

                                </div>

                                <input id="id" type="hidden" name="id" value="{{old('id')}}">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script type="text/javascript">

function validate(){

    $(".nav-link").removeClass("active");
    var type = document.getElementById("types");
    if (type.value == "") {
        alert("Please select an option!");
        $("#nav-customer-tab").addClass("active");
        $(".tab-pane").removeClass("active show");
        $("#nav-customer").addClass("active show");
        $('#types').focus();
        return false;
    }

    var slno1 = $("input[name='slno1']").val();
    if(slno1.length < 1){
        alert('Please fill the Serial No');
        $("input[name='slno1']").focus();
        return false;
    }
    var business_type = document.getElementById("business_type");
    if (business_type.value == "") {
        alert("Please select an option!");
        return false;
    }
    var name = $("input[name='name']").val();
    if(name.length < 1){
        alert('Please fill the name!');
        $("input[name='name']").focus();
        return false;
    }
    var code = $("input[name='code']").val();
    if(code.length < 1){
        alert('Please fill the code!');
        $("input[name='code']").focus();
        return false;
    }
    var contact_person = $("input[name='contact_person']").val();
    if(contact_person.length < 1){
        alert('Please fill Contact Person Name!');
        $("input[name='contact_person']").focus();
        return false;
    }
    var address1 = $("input[name='address1']").val();
    if(address1.length < 1){
        alert('Please fill Address Line 1!');
        $("input[name='address1']").focus();
        return false;
    }
    var address2 = $("input[name='address2']").val();
    if(address2.length < 1){
        alert('Please fill Address Line 2!');
        $("input[name='address2']").focus();
        return false;
    }
    var address3 = $("input[name='address3']").val();
    if(address3.length < 1){
        alert('Please fill Address Line 3!');
        $("input[name='address3']").focus();
        return false;
    }
    var branch = $("input[name='branch']").val();
    if(branch.length < 1){
        alert('Please fill the branch');
        $("input[name='branch']").focus();
        return false;
    }

    // var tel = $("input[name='telephone']").val();
    // if(tel.length != 10 || isNaN(tel)){
    //     alert('Telephone must be 10 digit and Number');
    //     $("input[name='telephone']").focus();
    //     return false;
    // }
    var cs_email = $("input[name='cs_email']").val();
    if(cs_email.length < 1){
        alert('Please fill CS Email Id');
        $("input[name='cs_email']").focus();
        return false;
    }
    var billing_email = $("input[name='billing_email']").val();
    if(billing_email.length < 1){
        alert('Please fill Billing Email Id!');
        $("input[name='billing_email']").focus();
        return false;
    }
    var website = $("input[name='website']").val();
    if(website.length < 1){
        alert('Website is required!');
        $("input[name='website']").focus();
        return false;
    }

    var opening = $("input[name='opening_balance']").val();
    if(opening.length < 1 || isNaN(opening)){
        alert('The opening balance must be a number.');
        $("input[name='opening_balance']").focus();
        return false;
    }

    var credit_limit = $("input[name='credit_limit']").val();
    if(credit_limit.length < 1 || isNaN(credit_limit)){
        alert('The credit limit must be a number.');
        $("input[name='credit_limit']").focus();
        return false;
    }
    var credit_balance = $("input[name='credit_balance']").val();
    if(credit_balance.length < 1 || isNaN(credit_balance)){
        alert('The credit balance must be a number.');
        $("input[name='credit_balance']").focus();
        return false;
    }
    var total_sale = $("input[name='total_sale']").val();
    if(total_sale.length < 1 || isNaN(total_sale)){
        alert('The total sale must be a number.');
        $("input[name='total_sale']").focus();
        return false;
    }
    var total_payment = $("input[name='total_payment']").val();
    if(total_payment.length < 1 || isNaN(total_payment)){
        alert('The total payment must be a number.');
        $("input[name='total_payment']").focus();
        return false;
    }
    var total_debit_note = $("input[name='total_debit_note']").val();
    if(total_debit_note.length< 1 || isNaN(total_debit_note)){
        alert('The total debit note must be a number.');
        $("input[name='total_debit_note']").focus();
        return false;
    }
    var total_credit_note = $("input[name='total_credit_note']").val();
    if(total_credit_note.length < 1 || isNaN(total_credit_note)){
        alert('The total credit note must be a number.');
        $("input[name='total_credit_note']").focus();
        return false;
    }
    var outstanding = $("input[name='outstanding']").val();
    if(outstanding.length < 1 || isNaN(outstanding)){
        alert('The outstanding must be a number.');
        $("input[name='outstanding']").focus();
        return false;
    }

    var bank_name = $("input[name='bank_name']").val();
    if(bank_name.length < 1){
        alert('Bank Name is required!');
        $("input[name='bank_name']").focus();
        return false;
    }
    var account_no = $("input[name='account_no']").val();
    if(account_no.length < 1 || isNaN(account_no)){
        alert('Account Number must be a number and is required!');
        $("input[name='account_no']").focus();
        return false;
    }
    var ifsc = $("input[name='ifsc']").val();
    if(ifsc.length < 1 ){
        alert('IFSC Code is required!');
        $("input[name='ifsc']").focus();
        return false;
    }
    var bank_address = $("input[name='bank_address']").val();
    if(bank_address.length < 1){
        alert('Bank Address is required!');
        $("input[name='bank_address']").focus();
        return false;
    }
    var branch_office = $("input[name='branch_office']").val();
    if(branch_office.length < 1){
        alert('Branch Office is required!');
        $("input[name='branch_office']").focus();
        return false;
    }

}
    // forwarder master search
    function searchForwarderMaster(){
        var key = $('#forwarder').val();
        if(key.length < 1){
            $('.search-suggestion').hide();
            return false;
        }
        $.ajax({
            url: "{{route('search.forwarder.master')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','key':key},
            success: function(response){
                console.log(response);
                $('.forwarder-suggestion').replaceWith(response.sugestion);
            }
        });
    }
    function searchForwarderMasterData(name){
        var new_name = name.replace(/_/g, ' ');
        $('#forwarder').val(new_name);
        $('.forwarder-suggestion').hide();
    }

    // Forwarder master search

    // Service Master search
    function serviceMasterSearch(){
        var key = $('#service').val();
        if(key.length < 1){
            $('.search-suggestion').hide();
            return false;
        }
        $.ajax({
            url: "{{route('service.master.search')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','key':key},
            success: function(response){
                console.log(response);
                $('.service-suggestion').replaceWith(response.sugestion);
            }
        });
    }
    function serviceMasterSearchData(code,name){
        var new_code = code.replace(/_/g, ' ');
        $('#service_code').val(new_code);
        var new_name = name.replace(/_/g, ' ');
        $('#service').val(new_name);
        $('.service-suggestion').hide();
    }
    // Service Master search


    $('body').click(function(){
        $('.search-suggestion').hide();
    })
    // Search for element


   $(document).ready(function(){
    
      $('#search-code').click(function(){
        var searchkey = $('#code').val();
         $.ajax({
            url: "{{route('search.customers.account')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','searchcode':searchkey},
            success: function(response){
                console.log(response.data);
               if(response.status == 200){
                    $('#id').val(response.data.id);
                    $("input[name='type']").val(response.data.type).prop('selected',true);
                    $("input[name='slno1']").val(response.data.serial_no1);
                    $("input[name='slno2']").val(response.data.serial_no2);
                    $("input[name='business_type']").val(response.data.business_type);
                    $("input[name='name']").val(response.data.name);
                    $("input[name='code']").val(response.data.code);
                    $("input[name='gst_no']").val(response.data.gst_no);
                    $("input[name='pan_no']").val(response.data.pan_no);
                    $("input[name='iec_no']").val(response.data.iec_no);
                    $("input[name='aadhar_no']").val(response.data.aadhar_no);
                    $("input[name='passport_no']").val(response.data.passport_no);
                    $("input[name='contact_person']").val(response.data.contact_person);
                    $("input[name='address1']").val(response.data.address1);
                    $("input[name='address2']").val(response.data.address2);
                    $("input[name='address3']").val(response.data.address3);
                    $("input[name='pincode']").val(response.data.pincode);
                    $("input[name='country_code']").val(response.data.country_code);
                    $("input[name='country']").val(response.data.country);
                    $("input[name='city_code']").val(response.data.city_code);
                    $("input[name='city']").val(response.data.city);
                    $("input[name='state_code']").val(response.data.state_code);
                    $("input[name='state']").val(response.data.state);
                    $("input[name='branch_code']").val(response.data.branch_code);
                    $("input[name='branch']").val(response.data.branch);
                    $("input[name='telephone']").val(response.data.telephone);
                    $("input[name='cs_email']").val(response.data.cs_email);
                    $("input[name='billing_email']").val(response.data.billing_email);
                    $("input[name='website']").val(response.data.website);
                    $("input[name='finance_name']").val(response.data.finance_name);
                    $("input[name='finance_contact']").val(response.data.finance_contact);
                    $("input[name='finance_email']").val(response.data.finance_email);
                    $("input[name='authorized_name']").val(response.data.authorized_name);
                    $("input[name='authorized_contact']").val(response.data.authorized_contact);
                    $("input[name='authorized_email']").val(response.data.authorized_email);
                    $("input[name='sales_contact']").val(response.data.sales_contact);
                    $("input[name='sales_person']").val(response.data.sales_person);
                    $("input[name='sales_email']").val(response.data.sales_email);
                    $("input[name='security_status']").val(response.data.security_status);
                    $("input[name='check_no']").val(response.data.check_no);
                    $("input[name='amount']").val(response.data.amount);
                    $("#textarea").val(response.data.textarea);
                    $("#upload_file").prop('disabled', true).css('display','block').attr('src','customer/security/'+response.data.upload);
                    $("input[name='tariff']").val(response.data.tariff);
                    $("input[name='gst']").val(response.data.gst);
                    $("input[name='activate']").val(response.data.activate);
                    $("input[name='billing']").val(response.data.billing);
                    $("input[name='auto_email']").val(response.data.auto_email);
                    $("input[name='fuel_option']").val(response.data.fuel_option);
                    $("input[name='fuel_value']").val(response.data.fuel_value);
                    $("input[name='fuel_imp_option']").val(response.data.fuel_imp_option);
                    $("input[name='fuel_imp_value']").val(response.data.fuel_imp_value);
                    $("input[name='payment']").val(response.data.payment);
                    $("input[name='currency']").val(response.data.currency);
                    $("input[name='group_code1']").val(response.data.group_code1);
                    $("input[name='group_code2']").val(response.data.group_code2);
                    $("input[name='covid_charges']").val(response.data.covid_charges);
                    $("input[name='opening_balance']").val(response.data.opening_balance);
                    $("input[name='credit_limit']").val(response.data.credit_limit);
                    $("input[name='credit_balance']").val(response.data.credit_balance);
                    $("input[name='total_sale']").val(response.data.total_sale);
                    $("input[name='total_payment']").val(response.data.total_payment);
                    $("input[name='total_debit_note']").val(response.data.total_debit_note);
                    $("input[name='total_credit_note']").val(response.data.total_credit_note);
                    $("input[name='outstanding']").val(response.data.outstanding);
                    $("input[name='bank_name']").val(response.data.bank_name);
                    $("input[name='account_no']").val(response.data.account_no);
                    $("input[name='ifsc']").val(response.data.ifsc);
                    $("input[name='bank_address']").val(response.data.bank_address);
                    $("input[name='branch_office']").val(response.data.branch_office);
                    $("input[name='document']").val(response.data.document);
                    $("input[name='kyc_no']").val(response.data.kyc_no);
                    $("#image").prop('disabled', true).css('display','block').attr('src','customer/kyc/'+response.data.image);
                    $("input[name='is_verified']").val(response.data.is_verified);
                    $("input[name='verify_by']").val(response.data.verify_by);
                    $("input[name='verify_date_time']").val(response.data.verify_date_time);
                    $("input[name='remarks']").val(response.data.remarks);
                    $("input[name='open_by']").val(response.data.open_by);
                    $("input[name='modify_by']").val(response.data.modify_by);
                    $("input[name='customer_name']").val(response.data.customer_name);
                    $("input[name='charge_dec1']").val(response.data.charge_dec1);
                    $("input[name='charge_dec2']").val(response.data.charge_dec2);
                    $("input[name='origin']").val(response.data.origin);
                    $("input[name='forwarder']").val(response.data.forwarder);
                    $("input[name='service_code']").val(response.data.service_code);
                    $("input[name='charges_type']").val(response.data.charges_type);
                    $("input[name='value']").val(response.data.value);
                    $("input[name='min_value']").val(response.data.min_value);
                    $("input[name='from_date']").val(response.data.from_date);
                    var selectType = $('#types').val(response.data.type);
                $('.form-field-user-edit > option[value="'+ selectType +'"]').prop('selected', true);
                var selectedBusiness = $('#business_type').val(response.data.business_type);
                $('.form-field > option[value= "' + selectedBusiness + '"]').prop('selected',true);
                   
               }else if(response.status == 400){
                    $('#code').val('');
                    $('#name').val('');
                    $('#id').val('');
                    $('#message').html(response.message).show();
               }else{
                    $('#message').show();   
                    $('#message').html('Unknown Error!');
               }
            }  
         });
      });
      $('#edit-btn').click(function() 
      {
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
      })
      
   });
  
    function checkAadhar(){
        var adhar = $("input[name='aadhar_no']").val();
        if(adhar.length != 12){
        alert('Aadhar no is required and must be 12 digits');
        return false;
        }
    }

    function checkPassport(){
        var passport = $("input[name='passport_no']").val();
        var passport_check = /[a-zA-Z]{2}[0-9]{7}/;
        if(!passport_check.test(passport)){
            alert("Passport Number is not yet valid");
            return false;
        }
    }
    function checkPincode(){
        var pin = $("input[name='pincode']").val();
        if(pin.length != 6){
            alert("Pincode must be 6 digits!");
            return false;
        }
    }


    var removeBtn = $("#removemoredocs").last();
    $("body").on("click", "#addmoredocs", function(e) {
      e.preventDefault();
      var room = $(".docstocopy").first();
      var count = removeBtn.data("count");
      if (count > 0) {
        removeBtn.data("count", count++).attr("data-count", count);
      } else {
        removeBtn.data("count", 1).attr("data-count", 1);
      }

      room.clone().appendTo("#docscontainer");
    });

    $("body").on("click", "#removemoredocs:not([data-count=0])", function(e) {
      e.preventDefault();
      var count = removeBtn.data("count");

      if (count > 0) {
    var count = $(".docstocopy");
    if(count.length != 1)
    {
        $(".docstocopy").last().remove();
        }
      }
    });
   
    
</script>

@endpush
