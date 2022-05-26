@extends('layouts.main')
@section('content')
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
                   {{--
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                          <span class="btn btn-danger btn-sm mb-2">{{ $error }}</span>
                        @endforeach
                    @endif
                    --}}

                    <!-- <div class="tab-pane fade show active" id="custmeraccount" role="tabpanel" aria-labelledby="custmeraccount-tab"> -->
                    <form class="" method="post" action="{{route('customers.account.store')}}">
                        @csrf
                        <input id="id" type="hidden" name="id" value="{{old('id')}}">
                        <div class="detail_edit p-0" style="background: transparent;">
                            <nav class="tab">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-customer-tab" data-toggle="tab"
                                        href="#nav-customer" role="tab" aria-controls="nav-customer"
                                        aria-selected="true">Customer Details</a>
                                    <a class="nav-link" id="nav-credit-tab" data-toggle="tab" href="#nav-credit"
                                        role="tab" aria-controls="nav-credit" aria-selected="false">Credit Limit
                                        Setting</a>
                                    <a class="nav-link" id="nav-service-tab" data-toggle="tab" href="#nav-service"
                                        role="tab" aria-controls="nav-service" aria-selected="false">Service
                                        Setting</a>
                                    <a class="nav-link" id="nav-portal-tab" data-toggle="tab" href="#nav-portal"
                                        role="tab" aria-controls="nav-portal" aria-selected="false">Portal
                                        Setting</a>
                                    <a class="nav-link" id="nav-bank-tab" data-toggle="tab" href="#nav-bank" role="tab"
                                        aria-controls="nav-bank" aria-selected="false">Bank Details</a>
                                    <a class="nav-link" id="nav-kyc-tab" data-toggle="tab" href="#nav-kyc" role="tab"
                                        aria-controls="nav-kyc" aria-selected="false">KYC Details</a>
                                    <a class="nav-link" id="nav-charges-tab" data-toggle="tab" href="#nav-charges"
                                        role="tab" aria-controls="nav-charges" aria-selected="false">Other
                                        Charges</a>
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
                                                                        <select class="" name="type">
                                                                            <option value="client">Client</option>
                                                                            <option value="1">One</option>
                                                                            <option value="2">Two</option>
                                                                            <option value="3">Three</option>
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
                                                                            aria-label="Default select example" name="business_type">
                                                                            <option>B2C</option>
                                                                            <option value="1">One</option>
                                                                            <option value="2">Two</option>
                                                                            <option value="3">Three</option>
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
                                                                        <input type="text" class="form-control" name="gst_no" value="{{old('gst_no')}}">
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
                                                                        <input type="text" class="form-control" name="pan_no" value="{{old('pan_no')}}">
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
                                                                        <input type="text" class="form-control" name="aadhar_no" value="{{old('aadhar_no')}}">
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
                                                                        <input type="text" class="form-control" name="passport_no" value="">
                                                                    </div>
                                                                    
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
                                                                    @if($errors->has('contact_persion'))
                                                                      <div class="error text-end">{{ $errors->first('contact_persion') }}</div>
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
                                                                        <input type="text" class="form-control" name="address2" value="{{old('address')}}">
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
                                                                        <input type="text" class="form-control" name="pincode" value="{{old('pincode')}}">
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
                                                                                <input id="country_code" type="text" class="form-control" name="country_code" value="{{old('country_code')}}" >
                                                                                @if($errors->has('country_code'))
                                                                                  <div class="error text-end">{{ $errors->first('country_code') }}</div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input id="country" type="text" class="form-control" name="country" value="{{old('country')}}" onkeyup="searchCountry()" autocomplete="off">
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
                                                                                <input id="state_code" type="text" class="form-control" name="state_code" value="{{old('state_code')}}">
                                                                                @if($errors->has('state_code'))
                                                                                  <div class="error text-end">{{ $errors->first('state_code') }}</div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input id="state" type="text" class="form-control" name="state" value="{{old('state')}}" onkeyup="searchState()" autocomplete="off">
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
                                                                                <input id="city_code" type="text" class="form-control" name="city_code" value="{{old('city_code')}}">
                                                                                @if($errors->has('city_code'))
                                                                                  <div class="error text-end">{{ $errors->first('city_code') }}</div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input id="city" type="text" class="form-control" name="city" value="{{old('city')}}" onkeyup="searchCity()" autocomplete="off">
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
                                                                        <input type="text" class="form-control" name="telephone" value="{{old('telephone')}}">
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
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="" class="form-label">Search
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"> &nbsp;
                                                                    <button type="buttoon"
                                                                        class="btn btn-primary">Search</button>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                                            <input type="text" class="form-control" name="account_manager" value="{{old('account_manager')}}">
                                                                        </div>
                                                                        @if($errors->has('account_manager'))
                                                                        <div class="error text-end">{{ $errors->first('account_manager') }}</div>
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
                                                                        <input type="number" class="form-control" name="contact_no_authorized" value="">
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
                                                                            <input type="text" class="form-control" name="email_id_authorized" value="">
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
                                                                            <input type="text" class="form-control" name="collection_manager" value="{{old('collection_manager')}}">
                                                                        </div>
                                                                        @if($errors->has('collection_manager'))
                                                                        <div class="error text-end">{{ $errors->first('collection_manager') }}</div>
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
                                                                            <input type="number" class="form-control" name="contact_no_authorized" value="">
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
                                                                            <input type="text" class="form-control" name="email_id_authorized" value="">
                                                                        </div>
                                                                    
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
                                                                            <input type="text" class="form-control" name="refrence_by" value="{{old('refrence_by')}}">
                                                                        </div>
                                                                        @if($errors->has('reference_by'))
                                                                        <div class="error text-end">{{ $errors->first('reference_by') }}</div>
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
                                                                            <input type="number" class="form-control" name="contact_no_authorized" value="">
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
                                                                            <input type="text" class="form-control" name="email_id_authorized" value="">
                                                                        </div>
                                                                    
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
                                                                                <select class="form-select" name="gst">
                                                                                    <option>Yes</option>
                                                                                    <option>No</option>
                                                                                </select>
                                                                            </div>
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
                                                                        <input type="number" class="form-control" name="pan_no" value="{{old('pan_no')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">amount</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="number" class="form-control" name="iec_no" value="{{old('iec_no')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">
                                                                    <!-- <span class="required-star">*</span>     -->
                                                                    Upload
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="file">
                                                                        <!-- <input type="text" class="form-control" name="aadhar_no" value="{{old('aadhar_no')}}"> -->
                                                                    </div>
                                                                   
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
                                                                        <Textarea class="fwdbillentryimporttext"></Textarea>
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
                                                                                        placeholder="0" name="fuel_value">
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
                                                            <!-- <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="" class="form-label">Rate Markup
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-8 row">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="0" name="rate_markup" value="0"> &nbsp;
                                                                                <span class="sign">%</span>
                                                                            </div>
                                                                            @if($errors->has('rate_markup'))
                                                                              <div class="error text-end">{{ $errors->first('rate_markup') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-3">
                                                                            <label for="" class="form-label">Markup Type
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-9 row">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <div class="row">
                                                                                    <div class="col-md-9">
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input type="radio" name="markup_type" value="percentage" checked>
                                                                                            &nbsp;
                                                                                            Percentage(%)
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input type="radio" name="markup_type" value="fixed">
                                                                                            &nbsp;Fixed
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Credit Limit Setting -->
                                <div class="tab-pane tab-pane-background fade" id="nav-credit" role="tabpanel"
                                    aria-labelledby="nav-credit-tab">
                                    <div class="row">
                                        <div class="col form-2-box wow fadeInUp">
                                            <!-- <form action="" method="post" class="m-2"> -->
                                                <div class="row mt-5">
                                                    <div class="col-md-6">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2">Credit Limit Setting
                                                            </legend>
                                                         
                                                            <div class="row">
                                                                <div class="row form-group">
                                                                    <div class="col-md-5">
                                                                        
                                                                    </div>
                                                                    <div class="col-md-7 ">
                                                                        <div class="form-group  mt-3">
                                                                            <div class="form-check form-check-inline">
                                                                                <input type="radio" name="credit_status" id="enabled" value="1">
                                                                                &nbsp;&nbsp;
                                                                                <label
                                                                                    class="form-check-label form-label text-success font-weight-bold"
                                                                                    for="enabled">
                                                                                    Enabled
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input type="radio" name="credit_status" id="disabled"
                                                                                    checked value="0"> &nbsp;&nbsp;
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
                                                                        <label for="" class="form-label">Credit
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
                                                                        <label for="" class="form-label">Outstanding
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
                                                        </fieldset>
                                                    </div>
                                                    {{--<div class="col-md-6">
                                                        <fieldset class="form-group border p-3 margin_top">
                                                            <legend class="w-auto px-2">Volume Metric Weight (Divisible)
                                                            </legend>
                                                            <div class="row mt-3">
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Network
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8 ">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <select class="form-select" name="network">
                                                                                <option value="netwoork1">Newtwoork1</option>
                                                                                <option value="netwoork2">Newtwoork2</option>
                                                                                <option value="netwoork3">Newtwoork3</option>
                                                                                <option value="netwoork4">Newtwoork4</option>
                                                                                <option value="netwoork5">Newtwoork5</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Divisible
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8 ">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="text" class="form-control" name="divisible" value="{{old('divisible')}}">
                                                                            &nbsp;
                                                                            <div class="d-flex">
                                                                                <button type="button"  class="btn btn-primary">Add</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                    </div>
                                                                    <div class="col-md-8 ">
                                                                        <div class="bind_input">
                                                                            <span class="spacing"></span>
                                                                            <textarea class="text" rows="16" name="note">{{old('note')}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>--}}
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Service Setting -->
                                <div class="tab-pane tab-pane-background fade" id="nav-service" role="tabpanel"
                                    aria-labelledby="nav-service-tab">
                                    <div class="">
                                        <div class="col form-2-box wow fadeInUp">
                                            <!-- <form action="" method="post" class="m-2"> -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <fieldset class="form-group border p-3 mt-4">
                                                            <legend class="w-auto px-2">Service Setting</legend>
                                                            <div class="row mt-2">
                                                                <div class="row form-group">
                                                                    <div class="col-md-5">
                                                                   
                                                                    </div>
                                                                    <div class="col-md-7 ">
                                                                        <div class="bind_input">
                                                                            <div class="text-center mt-3">
                                                                                <input type="checkbox" name="all" value="1"> &nbsp; ALL
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="after-add-more">
                                                            <div class="row mt-2">
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Network
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8 ">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <select class="form-select" name="service_network[]" id="service_network0">
                                                                                <option value="netwoork1">Newtwork1</option>
                                                                                <option value="netwoork2">Newtwork2</option>
                                                                                <option value="netwoork3">Newtwork3</option>
                                                                                <option value="netwoork4">Newtwork4</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="" class="form-label">Service
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8 ">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <select class="form-select" name="service_setting[]" id="service_setting0">
                                                                                <option value="Service1">Service1</option>
                                                                                <option value="Service2">Service2</option>
                                                                                <option value="Service3">Service3</option>
                                                                                <option value="Service4">Service4</option>
                                                                                <option value="Service5">Service5</option>
                                                                                <option value="Service6">Service6</option>
                                                                            </select> &nbsp;
                                                                            <div class="d-flex">
                                                                                <button type="button"
                                                                                    class="btn btn-primary add-more">Add</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                    </div>
                                                                    <div class="col-md-8 ">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <textarea class="text" rows="16" name="service_note">{{old('service_note')}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    {{--<div class="col-md-6">
                                                        <!-- About -->
                                                        <fieldset class="form-group border p-3 mt-4">
                                                            <legend class="w-auto px-2">Vol Discount</legend>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                  
                                                                </div>
                                                                <div class="col-md-6 ">
                                                                    <div class="form-group mt-3 text-center">
                                                                        <div class="form-check form-check-inline">
                                                                            <input type="radio" name="vol_discount_status" id="enabled"
                                                                                checked value="1"> &nbsp;
                                                                            <label
                                                                                class="form-check-label text-success font-weight-bold"
                                                                                for="enabled">
                                                                                Enabled
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="vol_discount_status" id="disabled" value="0"> &nbsp;
                                                                            <label
                                                                                class="form-check-label text-danger font-weight-bold"
                                                                                for="disabled">
                                                                                Disabled
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Sector
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select" name="sector">
                                                                            <option value="sector1">Sector1</option>
                                                                            <option value="sector2">Sector2</option>
                                                                            <option value="sector3">Sector3</option>
                                                                            <option value="sector4">Sector4</option>
                                                                            <option value="sector5">Sector5</option>
                                                                            <option value="sector6">Sector6</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Service
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select" name="service">
                                                                            <option value="service1">Service1</option>
                                                                            <option value="service2">Service2</option>
                                                                            <option value="service3">Service3</option>
                                                                            <option value="service4">Service4</option>
                                                                            <option value="service5">Service5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Weight</label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="weight" value="{{old('weight')}}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Vol Discount
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="vol_discount" value="{{old('vol_discount')}}"> &nbsp;
                                                                        <span>%</span> &nbsp;&nbsp;
                                                                        <div class="d-flex">
                                                                            <button class="btn btn-primary">Add</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing"></span>
                                                                        <textarea class="text" rows="11" name="vol_discount_note">{{old('vol_discount_note')}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>--}}
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Portal Setting -->
                                <div class="tab-pane tab-pane-background fade" id="nav-portal" role="tabpanel"
                                    aria-labelledby="nav-portal-tab">
                                    <div class="row">
                                        <div class="col">
                                            <!-- <form class="m-2" action="" method="post"> -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <fieldset class="form-group border p-3 mt-4">
                                                            <legend class="w-auto px-2">Portal Setting</legend>
                                                            <div class="row mt-3">
                                                                <div class="col-md-4">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group ml-4">
                                                                        <div class="form-check form-check-inline">
                                                                            <input type="radio" name="setting_status"
                                                                                id="enabled" checked value="1"> &nbsp;
                                                                            <label
                                                                                class="form-check-label form-label text-success font-weight-bold"
                                                                                for="enabled">
                                                                                Enabled
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input type="radio" name="setting_status"
                                                                                id="disabled" value="0"> &nbsp;
                                                                            <label
                                                                                class="form-check-label text-danger form-label font-weight-bold"
                                                                                for="disabled">
                                                                                Disabled
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Password
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="password" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="label">
                                                                        <span class="text-primary remove_ml ml-4"><i>Access for
                                                                                label
                                                                                generate</i></span>
                                                                        <div class="select border remove_ml p-3 mt-2 ml-4">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck1" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck1">ARAMAX</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">AW
                                                                                    BOMBAY</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">BLUEDART</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">DHL</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">DPD</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">ECOM
                                                                                    SHIPPING
                                                                                    SOLUTIONS
                                                                                    PVT
                                                                                    LTD</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">FEDEX</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">INTERNATIONAL
                                                                                    EXPRESS</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">LINEX</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">OVERSEAS
                                                                                    LOGISTICS</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">PRE-ECOM-UK</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">TNT</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value="aramax"
                                                                                    id="defaultCheck2" name="access_for_lable">
                                                                                <label class="form-check-label"
                                                                                    for="defaultCheck2">UPS</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <fieldset class="form-group border p-3 mt-4">
                                                            <legend class="w-auto px-2">Stock Allocation</legend>
                                                            <div class="row form-group mt-3">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Company
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select" name="company">
                                                                            <option value="company1">Company1</option>
                                                                            <option value="company2">Company2</option>
                                                                            <option value="company3">Company3</option>
                                                                            <option value="company4">Company4</option>
                                                                            <option value="company5">Company5</option>
                                                                            <option value="company6">Company6</option>
                                                                            <option value="company7">Company7</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">From Stock
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="10000001" name="from_stock" value="{{old('from_stock')}}">
                                                                    </div>
                                                                    @if($errors->has('from_stock'))
                                                                      <div class="error text-end">{{ $errors->first('from_stock') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">No. of AwbNo
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="awb_no" value="{{old('awb_no')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">To Stock
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="to_stock" value="{{old('to_stock')}}">
                                                                    </div>
                                                                    @if($errors->has('to_stock'))
                                                                      <div class="error text-end">{{ $errors->first('to_stock') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-5">
                                                                  
                                                                </div>
                                                                <div class="col-md-7 ">
                                                                    <div class="">
                                                                        <button class="btn btn-primary">Allocate <i
                                                                                class="fa fa-plus"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                         
                                                            <textarea rows="9" class="mt-3 text" name="stock_note">{{old('stock_note')}}</textarea>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3 mt-5">
                                                            <legend class="w-auto px-2">Fedex Account Access
                                                            </legend>
                                                            <div class="form-check form-check-inline mt-3">
                                                                <input class="form-check-input ml-5" type="checkbox" name="fedex_account_access" value="General">
                                                                <label class="form-check-label ml-1"
                                                                    for="john">General</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input ml-5" type="checkbox"
                                                                    name="sarah" id="sarah" value="silver" name="fedex_account_access">
                                                                <label class="form-check-label ml-1"
                                                                    for="sarah">Silver</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input ml-5" type="checkbox" name="fedex_account_access" value="Valuable">
                                                                <label class="form-check-label ml-1"
                                                                    for="paolo">Valuable</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input ml-5" type="checkbox"
                                                                    name="fedex_account_access" value="GTI">
                                                                <label class="form-check-label ml-1"
                                                                    for="paolo">GTI</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input ml-5" type="checkbox"
                                                                    name="fedex_account_access" value="Import">
                                                                <label class="form-check-label ml-1"
                                                                    for="paolo">Import</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input ml-5" type="checkbox"
                                                                    name="fedex_account_access" value="Doomestic">
                                                                <label class="form-check-label ml-1"
                                                                    for="paolo">Domestic</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                        </div>
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
                                                                <input type="text" class="form-control" name="account_no" value="{{old('account_no')}}">
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
                                </div>
                                <!-- KYC Details -->
                                <div class="tab-pane tab-pane-background fade" id="nav-kyc" role="tabpanel"
                                    aria-labelledby="nav-kyc-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- <form action="" method="post" class="m-2"> -->
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend class="w-auto px-2">Upload KYC Document</legend>
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Document
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select" name="document">
                                                                            <option value="Aadhar">Aadhar</option>
                                                                            <option value="Passport">Passport</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">KYC No
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="kyc_no" value="kyc_no">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Select Image Path
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="file" class="form-control" name="image"> &nbsp;
                                                                        <div class="d-flex">
                                                                            <!-- <button
                                                                                class="btn btn-primary">Browse</button>
                                                                            &nbsp; -->
                                                                            <button
                                                                                class="btn btn-secondary">Add</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-2">
                                                        <table class="table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Document</th>
                                                                    <th>KYC No</th>
                                                                    <th>Image</th>
                                                                    <th>Image Type</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <br><br><br><br><br><br>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">KYC Verify
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select" name="is_verified">
                                                                            <option value="0">No</option>
                                                                            <option value="1">Yes</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                                        <input type="text" class="form-control" name="verify_date_time">
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
                                                                        <button class="btn btn-success">KYC Verify</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="row form-group mt-3">
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
                                </div>
                                <!-- Other Charges -->
                                <div class="tab-pane tab-pane-background fade" id="nav-charges" role="tabpanel"
                                    aria-labelledby="nav-charges-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- <form class="m-2"> -->
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend class="w-auto px-2">Other Charges Details</legend>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Customer Name
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="customer_name" value="{{old('customer_name')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Charge Description
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control" name="charge_dec1" value="{{old('charge_dec1')}}">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" name="charge_dec2" value="{{old('charge_dec2')}}">
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
                                                                    <label for="" class="form-label">Origin
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="origin" value="{{old('origin')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Destination
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" name="destination" value="{{old('destination')}}">
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control" name="destination_code" value="{{old('destination_code')}}">
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
                                                                    <label for="" class="form-label">Forwarder
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input id="forwarder" type="text" class="form-control" name="forwarder" onkeyup="searchForwarderMaster()">
                                                                    </div>
                                                                    <div class="bg-dark forwarder-suggestion search-suggestion"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Network
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" name="network" value="{{old('network')}}">
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control" name="network_code" value="{{old('network_code')}}">
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
                                                                    <label for="" class="form-label">Service
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
                                                                            <div class="col-md-8">
                                                                                <input id="service" type="text" class="form-control" name="service" value="{{old('service')}}" onkeyup="serviceMasterSearch()">
                                                                                <div class="bg-dark service-suggestion search-suggestion"></div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <input id="service_code" type="text" class="form-control" name="service_code" value="{{old('service_code')}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Charges Type
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select" name="charges_type">
                                                                            <option value="Type1">Type1</option>
                                                                            <option value="Type2">Type2</option>
                                                                            <option value="Type3">Type3</option>
                                                                            <option value="Type4">Type4</option>
                                                                            <option value="Type5">Type5</option>
                                                                            <option value="Type5">Type5</option>
                                                                            <option value="Type6">Type6</option>
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
                                                                    <label for="" class="form-label">Value
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="value" value="{{old('value')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">Min Value
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" name="min_value" value="{{old('min_value')}}">
                                                                    </div>
                                                                    @if($errors->has('min_value'))
                                                                      <div class="error text-end">{{ $errors->first('min_value') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">From Date
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="date" class="form-control" name="from_date" value="{{old('from_date')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="" class="form-label">To Date
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8 ">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="date" class="form-control" name="to_date" value="{{old('to_date')}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                                    </div>
                                                    <div class="mt-3">
                                                        <textarea rows="10" class="text"></textarea>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right mt-4">
                                <a href="{{route('customer-list')}}" class="btn btn-secondary save-btn mr-3"> List
                                        <i class="fa fa-list ms-2"></i>
                                    </a>
                                    <button type="button" class="btn btn-secondary save-btn mr-3"> Edit
                                        <i class="fa fa-edit ms-2"></i>
                                    </button>

                                    <button class="btn btn-success save-btn" onclick="return validate()">Save
                                        <i class="fa fa-save ms-2"></i>
                                    </button>

                                </div>

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
    var slno1 = $("input[name='slno1']").val();
    if(slno1.length < 1){
        alert('Please fill the SLNO');
        $("input[name='slno1']").focus();
        return false;
    }
    var tel = $("input[name='telephone']").val();
    if(tel.length != 10 || isNaN(tel)){
        alert('Telephone must be 10 digit and Number');
        $("input[name='telephone']").focus();
        return false;
    }
    var pin = $("input[name='pincode']").val();
    if(isNaN(pin)){
        alert('Pincode must be number');
        $("input[name='pincode']").focus();
        return false;
    }
 
    var adhar = $("input[name='aadhar_no']").val();
    if(adhar.length < 1 || isNaN(adhar)){
        alert('Adhar no is required and must be number');
        $("input[name='aadhar_no']").focus();
        return false;
    }
    var psale = $("input[name='sale_person']").val();
    if(psale.length < 1){
        alert('this field is required ');
        $("input[name='sale_person']").focus();
        return false;
    }

    var opening = $("input[name='opening_balance']").val();
    if(isNaN(opening)){
        alert('The opening balance must be a number.');
        $("input[name='opening_balance']").focus();
        return false;
    }

    // var credit_limit = $("input[name='credit_limit']").val();
    // if(isNaN(credit_limit)){
    //     alert('The credit limit must be a number.');
    //     $("input[name='credit_limit']").focus();
    //     return false;
    // }
    // var credit_balance = $("input[name='credit_balance']").val();
    // if(isNaN(credit_balance)){
    //     alert('The credit balance must be a number.');
    //     $("input[name='credit_balance']").focus();
    //     return false;
    // }
    // var total_sale = $("input[name='total_sale']").val();
    // if(isNaN(total_sale)){
    //     alert('The total sale must be a number.');
    //     $("input[name='total_sale']").focus();
    //     return false;
    // }
    // var total_payment = $("input[name='total_payment']").val();
    // if(isNaN(total_payment)){
    //     alert('The total payment must be a number.');
    //     $("input[name='total_payment']").focus();
    //     return false;
    // }
    // var total_debit_note = $("input[name='total_debit_note']").val();
    // if(isNaN(total_debit_note)){
    //     alert('The total debit note must be a number.');
    //     $("input[name='total_debit_note']").focus();
    //     return false;
    // }
    // var total_credit_note = $("input[name='total_credit_note']").val();
    // if(isNaN(total_credit_note)){
    //     alert('The total credit note must be a number.');
    //     $("input[name='total_credit_note']").focus();
    //     return false;
    // }
    // var outstanding = $("input[name='outstanding']").val();
    // if(isNaN(outstanding)){
    //     alert('The outstanding must be a number.');
    //     $("input[name='outstanding']").focus();
    //     return false;
    // }
}

    // Search for for element

    // country search
    function searchCountry(){
        var key = $('#country').val();
        $('#country_code').val('');
        if(key.length < 1){
            return false;
        }
        $.ajax({
            url: "{{route('search.country')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','key':key},
            success: function(response){
                $('#country_code').val('');
                $('.country-suggestion').replaceWith(response.sugestion);
            }
        });
    }

    function searchCountryData(name,code){
        $('#country_code').val(code);
        $('#country').val(name);
        $('.country-suggestion').hide();
    }
    // country search
    // state search
    function searchState(){
        var country = $('#country').val();
        var ccode = $('#country_code').val();

        $('#city').val('');
        $('#city_code').val('');

        if(country.length < 1 || ccode.length < 1){
            alert('Please enter Country and Country code');
            $('#country').focus();
            $('#state').val('');
            return false;
        }
        var key = $('#state').val();
        $('#state_code').val('');
        if(key.length < 1){
            $('.search-suggestion').hide();
            return false;
        }
        $.ajax({
            url: "{{route('search.state')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','key':key,'country':country,'ccode':ccode},
            success: function(response){
                if(response.status == 400){
                    alert(response.message)
                    $('#country').focus();
                    $('#state').val('');
                }
                $('.state-suggestion').replaceWith(response.sugestion);
            }
        });
    }

    function searchStateData(name,code){
        $('#state_code').val(code);
        $('#state').val(name);
        $('.state-suggestion').hide();
    }
    // state search

    // search city
    function searchCity(){
        var country = $('#country').val();
        var ccode = $('#country_code').val();

        var state = $('#state').val();
        var scode = $('#state_code').val();

        if(state.length < 1 || scode.length < 1){
            alert('Please enter State and State Code');
            $('#state').focus();
            $('#city').val('');
            return false;
        }
        var key = $('#city').val();
        $('#city_code').val('');
        if(key.length < 1){
            $('.search-suggestion').hide();
            return false;
        }
        $.ajax({
            url: "{{route('search.city')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','key':key,'state':state,'scode':scode,'country':country,'ccode':ccode},
            success: function(response){
                console.log(response);
                if(response.status == 400){
                    alert(response.message)
                    $('#state').focus();
                    $('#state').val('');
                }
                $('.city-suggestion').replaceWith(response.sugestion);
            }
        });
    }
    function searchCityData(name,code){
        $('#city_code').val(code);
        $('#city').val(name);
        $('.state-suggestion').hide();
    }
    // search city

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
                    $("input[name='type']").val(response.data.type);
                    $("input[name='slno1']").val(response.data.serial_no1);
                    $("input[name='slno2']").val(response.data.serial_no2);
                    $("input[name='business_type']").val(response.data.business_type);
                    $("input[name='name']").val(response.data.name);
                    $("input[name='code']").val(response.data.code);
                    $("input[name='gst_no']").val(response.data.gst_no);
                    $("input[name='pan_no']").val(response.data.pan_no);
                    $("input[name='iec_no']").val(response.data.iec_no);
                    $("input[name='aadhar_no']").val(response.data.aadhar_no);
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
                    $("input[name='sale_person']").val(response.data.sale_person);
                    $("input[name='account_manager']").val(response.data.account_manager);
                    $("input[name='collection_manager']").val(response.data.collection_manager);
                    $("input[name='refrence_by']").val(response.data.refrence_by);
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
                    $("input[name='rate_markup']").val(response.data.rate_markup);
                    $("input[name='markup_type']").val(response.data.markup_type);
                    $("input[name='credit_status']").val(response.data.credit_status);
                    $("input[name='opening_balance']").val(response.data.opening_balance);
                    $("input[name='credit_limit']").val(response.data.credit_limit);
                    $("input[name='credit_balance']").val(response.data.credit_balance);
                    $("input[name='total_sale']").val(response.data.total_sale);
                    $("input[name='total_payment']").val(response.data.total_payment);
                    $("input[name='total_debit_note']").val(response.data.total_debit_note);
                    $("input[name='total_credit_note']").val(response.data.total_credit_note);
                    $("input[name='outstanding']").val(response.data.outstanding);
                    $("input[name='network']").val(response.data.network);
                    $("input[name='divisible']").val(response.data.divisible);
                    $("input[name='note']").val(response.data.note);
                    $("input[name='service_network']").val(response.data.service_network);
                    $("input[name='service_note']").val(response.data.service_note);
                    $("input[name='vol_discount_status']").val(response.data.vol_discount_status);
                    $("input[name='sector']").val(response.data.sector);
                    $("input[name='service']").val(response.data.service);
                    $("input[name='weight']").val(response.data.weight);
                    $("input[name='vol_discount']").val(response.data.vol_discount);
                    $("input[name='vol_discount_note']").val(response.data.vol_discount_note);
                    $("input[name='setting_status']").val(response.data.setting_status);
                    $("input[name='company']").val(response.data.company);
                    $("input[name='from_stock']").val(response.data.from_stock);
                    $("input[name='awb_no']").val(response.data.awb_no);
                    $("input[name='to_stock']").val(response.data.to_stock);
                    $("input[name='stock_note']").val(response.data.stock_note);
                    $("input[name='bank_name']").val(response.data.bank_name);
                    $("input[name='account_no']").val(response.data.account_no);
                    $("input[name='ifsc']").val(response.data.ifsc);
                    $("input[name='bank_address']").val(response.data.bank_address);
                    $("input[name='branch_office']").val(response.data.branch_office);
                    $("input[name='document']").val(response.data.document);
                    $("input[name='kyc_no']").val(response.data.kyc_no);
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
                    $("input[name='verify_by']").val(response.data.verify_by);
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
</script>
<script type="text/javascript">
   //Add More
   var scntDiv = $(".after-add-more");
	var i = 1;
   $(function() {
		$(".add-more").click(function() {
               $("<div class='after-add-mores'><div class='row mt-2'> <div class='row form-group'> <div class='col-md-4'><label for='' class='form-label'>Network </label> </div> <div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><select class='form-select' name='service_network[]' id='service_network" +i+
               "'><option value='netwoork1'>Newtwork1</option><option value='netwoork2'>Newtwork2</option><option value='netwoork3'>Newtwork3</option><option value='netwoork4'>Newtwork4</option></select></div></div></div></div><div class='row'><div class='row form-group'><div class='col-md-4'><label for='' class='form-label'>Service</label></div><div class='col-md-8'><div class='bind_input'><span class='spacing'>:</span><select class='form-select' name='service_setting[]' id='service_setting" +i 
               +"'><option value='Service1'> Service1</option><option value='Service2'>Service2</option><option value='Service3'>Service3</option><option value='Service4'>Service4</option><option value='Service5'>Service5</option><option value='Service6'>Service6</option></select> &nbsp;<div class='d-flex'><button type='button' class='btn btn-danger' onclick='removeCont(this);'>Delete</button></div></div></div></div></div></div>")
               .appendTo(scntDiv);
			i++;
			return false;
		});
    });
    function removeCont(_this) {
		if (i > 1) {
			$(_this).parents('.after-add-mores').remove();
			i--;
		}
	}
    </script>
@endpush

