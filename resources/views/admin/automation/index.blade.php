@extends('layouts.main')
@section('content')
    <div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">

                @if (Session::has('success'))
                    <div class="col-md-6 offset-md-3">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Success!</strong> {{ Session::get('success') }}
                        </div>
                    </div>
                @endif
            <!-- @if ($errors->any())
                @foreach ($errors->all() as $error)
                  <span class="btn btn-danger btn-sm mb-2">{{ $error }}</span>
                @endforeach
            @endif -->

                <form action="{{ route('automation.store') }}" method="post" class="m-2">
                    @csrf
                    <div class="tab-content mt-5">
                        <div class="tab-pane fade show active" id="fedex" role="tabpanel" aria-labelledby="fedex-tab">
                            <div class="detail_edit p-3" style="background: #fff;">
                                <nav class="tab mb-5">
                                    <div class="d-flex mb-2">
                                        <div class="form-check mr-3">
                                            <input class="form-check-input" type="radio" name="importexport" id="" checked>
                                            <label class="form-check-label" for="import">
                                                Import
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="importexport" id="">
                                            <label class="form-check-label" for="export">
                                                Export
                                            </label>
                                        </div>
                                    </div>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-fromto-tab" data-toggle="tab" href="#nav-fromto"
                                            role="tab" aria-controls="nav-fromto" aria-selected="true">Address
                                        </a>
                                        <a class="nav-link" id="nav-packageBilling-tab" data-toggle="tab"
                                            href="#nav-packageBilling" role="tab" aria-controls="nav-packageBilling"
                                            aria-selected="false">Package & Shipment
                                        </a>
                                        <a class="nav-link" id="nav-optional-tab" data-toggle="tab"
                                            href="#nav-optional" role="tab" aria-controls="nav-optional"
                                            aria-selected="false">
                                            Special Services
                                        </a>
                                        <a class="nav-link" id="nav-shipmentInfo-tab" data-toggle="tab"
                                            href="#nav-shipmentInfo" role="tab" aria-controls="nav-shipmentInfo"
                                            aria-selected="false">
                                            Shipment Info
                                        </a>
                                        <a class="nav-link" id="nav-completeShipment-tab" data-toggle="tab"
                                            href="#nav-completeShipment" role="tab" aria-controls="nav-completeShipment"
                                            aria-selected="false">
                                            Complete Your Shipment
                                        </a>
                                        <a class="nav-link" id="nav-commodityInfo-tab" data-toggle="tab"
                                            href="#nav-commodityInfo" role="tab" aria-controls="nav-commodityInfo"
                                            aria-selected="false">
                                            Commodity Information
                                        </a>
                                        <a class="nav-link" id="nav-customDocumentation-tab" data-toggle="tab"
                                            href="#nav-customDocumentation" role="tab"
                                            aria-controls="nav-customDocumentation" aria-selected="false">
                                            Custom Documentation
                                        </a>
                                        <a class="nav-link" id="nav-table-tab" data-toggle="tab" href="#nav-table"
                                            role="tab" aria-controls="nav-table" aria-selected="false">
                                            Confirmation
                                        </a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">

                                    <!-- From and to modules -->
                                    <div class="tab-pane tab-pane-background fade active show" id="nav-fromto"
                                        role="tabpanel" aria-labelledby="nav-fromto-tab">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-6 from">
                                                    <fieldset class="form-group border p-3">
                                                        <legend class="w-auto px-2">Ship From</legend>
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Saved
                                                                    Sender</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input id="searchClient" type="text" class="form-control" name="sender" value="{{old('sender')}}">
                                                                </div>
                                                                @if ($errors->has('sender'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('sender') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    {{-- <span class="sign">*</span> --}}
                                                                    <span class="required-star">*</span>
                                                                    Country/Territory
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input class="form-control fromcountry" name="country">
                                                                    @if ($errors->has('country'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('country') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Company
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"
                                                                        name="company" value="{{old('company')}}">
                                                                </div>
                                                                @if ($errors->has('company'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('company') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    {{-- <span class="sign">*</span> --}}
                                                                    <span class="required-star">*</span>
                                                                    Contact Name
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"
                                                                        name="contact_name"
                                                                        value="{{ old('contact_name') }}">
                                                                </div>
                                                                @if ($errors->has('contact_name'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('contact_name') }}</div>
                                                                @endif
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
                                                                    <input type="text" class="form-control"
                                                                        name="address1" value="{{ old('address1') }}">
                                                                </div>
                                                                @if ($errors->has('address1'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('address1') }}</div>
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
                                                                        name="address2" value="{{old('address2')}}">
                                                                </div>
                                                                @if ($errors->has('address2'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('address2') }}</div>
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
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <input type="number" class="form-control"
                                                                                name="post_code" value="{{old('post_code')}}">
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <a href="javascript void(0);"
                                                                                class="link">Postal code
                                                                                information</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has('post_code'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('post_code') }}</div>
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
                                                                    <div class="d-flex w-100">
                                                                        <input type="text" class="form-control fromstate" name="state" value="{{old('state')}}">
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has('state'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('state') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label fromcity">
                                                                    <span class="required-star">*</span>
                                                                    City
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="d-flex w-100">
                                                                        <input type="text" class="form-control fromcity"
                                                                            name="city" value="{{ old('city') }}">
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has('city'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('city') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Phone no.
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8 ">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <div class="d-flex w-100">
                                                                                <input type="number" class="form-control"
                                                                                    name="phone_no"
                                                                                    value="{{ old('phone_no') }}">
                                                                            </div>
                                                                        </div>
                                                                        @if ($errors->has('phone_no'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('phone_no') }}</div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-7 ">
                                                                        <div class="row">
                                                                            <div class="col-md-4 padding_right_remove">
                                                                                <label for="name" class="form-label">
                                                                                    <span class="required-star">*</span>
                                                                                    Ext.
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <div class="d-flex w-100">
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="extension"
                                                                                            value="{{ old('extension') }}">
                                                                                    </div>
                                                                                </div>
                                                                                @if ($errors->has('extension'))
                                                                                    <div class="error text-end">
                                                                                        {{ $errors->first('extension') }}
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    VAT/CST/TIN no.
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="vat_no"  value="{{old('vat_no')}}">
                                                                </div>
                                                                @if ($errors->has('vat'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('vat') }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input checkbox_padding">
                                                                    <div class="">
                                                                        <input type="checkbox" name="from_address_book">
                                                                        Save in address book
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 to">
                                                    <fieldset class="form-group border p-3">
                                                        <legend class="w-auto px-2">Ship To</legend>
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Country/Territory
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input class="tocountry form-control" name="to_country" value="{{old('to_country')}}">
                                                                </div>
                                                                @if ($errors->has('to_country'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('to_country') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Company
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"
                                                                        name="to_company"
                                                                        value="{{ old('to_company') }}">
                                                                </div>
                                                                @if ($errors->has('to_company'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('to_company') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Contact Name
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"
                                                                        name="to_contact_name"
                                                                        value="{{ old('to_contact_name') }}">
                                                                </div>
                                                                @if ($errors->has('to_contact_name'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('to_contact_name') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Address 1
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"
                                                                        name="to_address1"
                                                                        value="{{ old('to_address1') }}">
                                                                </div>
                                                                @if ($errors->has('to_address1'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('to_address1') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Address 2
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"
                                                                        name="to_address2"
                                                                        value="{{ old('to_address2') }}">
                                                                </div>
                                                                @if ($errors->has('to_address2'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('to_address2') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Postal Code
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <input type="number" class="form-control"
                                                                                name="to_post_code"
                                                                                value="{{ old('to_post_code') }}">
                                                                            @if ($errors->has('to_post_code'))
                                                                                <div class="error text-end">
                                                                                    {{ $errors->first('to_post_code') }}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <a href="" class="link">Postal code
                                                                                information</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    State
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="d-flex w-100">
                                                                        <input type="text" class="form-control tostate"
                                                                            name="to_state"
                                                                            value="{{ old('to_state') }}">
                                                                        <button class="btn dropdown">
                                                                            <span><i class="fa fa-chevron-down"></i></span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has('to_state'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('to_state') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    City
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="d-flex w-100">
                                                                        <input type="text" class="form-control tocity"
                                                                            name="to_city" value="{{ old('to_city') }}">
                                                                        <button class="btn dropdown">
                                                                            <span><i class="fa fa-chevron-down"></i></span>
                                                                        </button>
                                                                        @if ($errors->has('to_city'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('to_city') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <!-- <div class="col-md-4"> -->
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Phone no.
                                                                </label>
                                                                <!-- </div> -->

                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <!-- <div class="d-flex"> -->
                                                                            <input type="number" class="form-control"
                                                                                name="to_phone_no" value="{{old('to_phone_no')}}">
                                                                        </div>
                                                                        @if ($errors->has('to_phone_no'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('to_phone_no') }}</div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <div class="row">
                                                                            <div class="col-md-4 padding_right_remove">
                                                                                <label for="name" class="form-label ">
                                                                                    <span class="required-star">*</span>
                                                                                    Ext.
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <div class="d-flex w-100">
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="to_extension"
                                                                                            value="{{ old('to_extension') }}">
                                                                                    </div>
                                                                                </div>
                                                                                @if ($errors->has('to_extension'))
                                                                                    <div class="error text-end">
                                                                                        {{ $errors->first('to_extension') }}
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Recipient Tax ID
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="tax_id"
                                                                        value="{{ old('tax_id') }}">
                                                                </div>
                                                                @if ($errors->has('tax_id'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('tax_id') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="text-end mt-3">
                                                        <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                            href="#nav-packageBilling" role="tab"
                                                            aria-controls="nav-packageBilling" aria-selected="false">Next
                                                            <span><i class="fa fa-arrow-right"></i></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Package and Billing modules -->
                                    <div class="tab-pane tab-pane-background fade" id="nav-packageBilling" role="tabpanel"
                                        aria-labelledby="nav-packageBilling-tab">
                                        <div class="row">
                                            <div class="col form-2-box wow fadeInUp">
                                                <div class="row">
                                                    <div class="col-md-6 from">
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Ship Date
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="date" class="form-control"
                                                                        name="ship_date" value="{{ old('ship_date') }}">
                                                                </div>
                                                                @if ($errors->has('ship_date'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('ship_date') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Number of packages
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="" name="packages_no">
                                                                        <option value="">--Select--</option>
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                    </select>
                                                                </div>
                                                                @if ($errors->has('packages_no'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('packages_no') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Are packages identical
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="">
                                                                        <input type="radio" name="are_identical"
                                                                            value="yes">
                                                                        Yes
                                                                        <input type="radio" name="are_identical" value="no">
                                                                        No
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Weight
                                                                    <span><i class="fa fa-question-circle"></i></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control"
                                                                                name="weight"
                                                                                value="{{ old('weight') }}">
                                                                            @if ($errors->has('weight'))
                                                                                <div class="error text-end">
                                                                                    {{ $errors->first('weight') }}</div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select class=""
                                                                                name="weight_unit">
                                                                                <option value="gm">GM</option>
                                                                                <option value="kg">KG</option>
                                                                            </select>
                                                                            @if ($errors->has('weight_unit'))
                                                                                <div class="error text-end">
                                                                                    {{ $errors->first('weight_unit') }}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <!-- <span class="sign">*</span> -->
                                                                    Declared value
                                                                    <span><i class="fa fa-question-circle"></i></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control"
                                                                                name="package_value" value="{{old('package_value')}}">
                                                                            @if ($errors->has('package_value'))
                                                                                <div class="error text-end">
                                                                                    {{ $errors->first('package_value') }}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select class=""
                                                                                name="package_value_unit">
                                                                                <option value="Ruppee">Rupee</option>
                                                                                <option value="Dolor">Dollar</option>
                                                                                <option value="Pound">Pound</option>
                                                                            </select>
                                                                            @if ($errors->has('package_value_unit'))
                                                                                <div class="error text-end">
                                                                                    {{ $errors->first('package_value_unit') }}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Service type
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="" name="service_type">
                                                                        <option value="">--Select--</option>
                                                                        <option value="International First">International First</option>
                                                                        <option value="International Priority">International Priority</option>
                                                                        <option value="International Economy">International Economy</option>
                                                                        <option value="International Priority Trades">International Priority Trades
                                                                        </option>
                                                                        <option value="International Priority Freight">International Priority Freight
                                                                        </option>
                                                                        <option value="International Priority Economy">International Priority Economy
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                @if ($errors->has('service_type'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('service_type') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Package type
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="" name="package_type">
                                                                        <option>--Select--</option>
                                                                        <option value="FedEx Envelope">FedEx Envelope</option>
                                                                        <option value="FedEx Pak">FedEx Pak</option>
                                                                        <option value="FedEx Box">FedEx Box</option>
                                                                        <option value="FedEx Tube">FedEx Tube</option>
                                                                        <option value="FedEx 10Kg Box">FedEx 10Kg Box</option>
                                                                        <option value="FedEx 25Kg Box">FedEx 25Kg Box</option>
                                                                        <option value="Your Packaging">Your Packaging</option>
                                                                    </select>
                                                                </div>
                                                                @if ($errors->has('package_type'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('package_type') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    Dimensions
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row">
                                                                        <div class="col-md-4 d-flex">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="L" name="length" value="{{old('length')}}">&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <i class="fa fa-times mt-2"></i>
                                                                            @if ($errors->has('length'))
                                                                                <div class="error text-end">
                                                                                    {{ $errors->first('length') }}</div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-4 d-flex">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="B" name="breadth" value="{{old('breadth')}}">&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <i class="fa fa-times mt-2"></i>
                                                                            @if ($errors->has('breadth'))
                                                                                <div class="error text-end">
                                                                                    {{ $errors->first('breadth') }}</div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="H" name="height" value="{{old('height')}}">
                                                                            @if ($errors->has('height'))
                                                                                <div class="error text-end">
                                                                                    {{ $errors->first('height') }}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Package contents
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="">
                                                                        <input type="radio" name="package_content"
                                                                            value="Documents">&nbsp;
                                                                        Documents &nbsp;&nbsp;
                                                                        <input type="radio" name="package_content"
                                                                            value="Product">&nbsp;
                                                                        Product/Commodities
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has('package_content'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('package_content') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">
                                                                    <span class="required-star">*</span>
                                                                    Shipment purpose
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="" name="shipment_purpose">
                                                                        <option>Commercial</option>
                                                                        <option value="Sample">Sample</option>
                                                                        <option value="Document">Document</option>
                                                                        <option value="Your package is fixed">Your package is fixed</option>
                                                                    </select>
                                                                </div>
                                                                @if ($errors->has('shipment_purpose'))
                                                                    <div class="error text-end">
                                                                        {{ $errors->first('shipment_purpose') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">
                                                                    <span class="required-star">*</span>
                                                                    Total customs value
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control"
                                                                                name="custom_value"
                                                                                value="{{old('custom_value')}}">
                                                                            @if ($errors->has('custom_value'))
                                                                                <div class="error text-end">
                                                                                    {{ $errors->first('custom_value') }}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <select class=""
                                                                                name="custom_value_unit">
                                                                                <option>--Select Currency--</option>
                                                                                <option value="INR">INR</option>
                                                                                <option value="USD">USD</option>
                                                                            </select>
                                                                            @if ($errors->has('custom_value_unit'))
                                                                                <div class="error text-end">
                                                                                    {{ $errors->first('custom_value_unit') }}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-5"></div>
                                                            <div class="col-md-7">
                                                                <!-- <div class="d-flex"> -->
                                                                <input type="checkbox" name="" id="">
                                                                Include a return label
                                                                <span><i class="fa fa-question-circle"></i></span>
                                                                <!-- </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2">Billing Details</legend>
                                                            <div class="row form-group mt-4">
                                                                <div class="col-md-4">
                                                                    <label for="name" class="form-label ">
                                                                        <span class="required-star">*</span>
                                                                        Bill transportation to
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control" value="inextadmin-062" readonly name="bill_transportation_to">
                                                                    </div>
                                                                    @if ($errors->has('bill_transportation_to'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('bill_transportation_to') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name" class="form-label ">
                                                                        <span class="required-star">*</span>
                                                                        Bill duties/taxes/fees to
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select name="taxes" name="bill_to">
                                                                            <option>--Select--</option>
                                                                            <option value="Sender">Sender</option>
                                                                            <option value="Recipient">Recipient</option>
                                                                        </select>
                                                                    </div>
                                                                    @if ($errors->has('taxes'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('taxes') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name" class="form-label ">
                                                                        Account no.
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"
                                                                            name="account_no">
                                                                    </div>
                                                                    @if ($errors->has('account_no'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('account_no') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="d-flex alert">
                                                                    <span class="exclma"><i
                                                                            class="fa fa-exclamation"></i></span>
                                                                    Alert: Please remember to enter your reference
                                                                    information
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name" class="form-label ">
                                                                        P.O. no.
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"
                                                                            name="po_no" value="{{ old('po_no') }}">
                                                                        @if ($errors->has('po_no'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('po_no') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name" class="form-label ">
                                                                        Invoice no.
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"
                                                                            name="invoice_no"
                                                                            value="{{ old('invoice_no') }}">
                                                                    </div>
                                                                    @if ($errors->has('po_no'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('po_no') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name" class="form-label">
                                                                        Department no.
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"
                                                                            name="dept_no">
                                                                    </div>
                                                                    @if ($errors->has('dept_no'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('dept_no') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="text-end">
                                                            <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                                href="#nav-continueCommodity" role="tab"
                                                                aria-controls="nav-continueCommodity"
                                                                aria-selected="false">Next <span
                                                                    class="fa fa-arrow-right"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Special services module -->
                                    <div class="tab-pane tab-pane-background fade" id="nav-optional" role="tabpanel"
                                        aria-labelledby="nav-optional-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- <form action="" method="post" class="m-2"> -->
                                                <fieldset class="form-group border p-3">
                                                    <legend class="w-auto ">Special Service</legend>
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="checkbox" name="none_standard_packaging"
                                                                    value="None Standard Packaging">&nbsp;
                                                                Non-standard packaging
                                                            </div>
                                                            @if ($errors->has('none_standard_packaging'))
                                                                <div class="error text-end">
                                                                    {{ $errors->first('none_standard_packaging') }}</div>
                                                            @endif
                                                            <div class="form-group">
                                                                <input type="checkbox" name="battery" value="vattery">&nbsp;
                                                                Lithium Batteries/cell
                                                                <span>
                                                                    <i class="fa fa-question-circle"></i>
                                                                    <i class="fa fa-plus-square"></i>
                                                                </span>
                                                            </div>
                                                            @if ($errors->has('battery'))
                                                                <div class="error text-end">
                                                                    {{ $errors->first('battery') }}</div>
                                                            @endif
                                                            <div class="form-group">
                                                                <input type="checkbox" name="select_broker"
                                                                    value="select_broker">&nbsp;
                                                                Broker select
                                                                <p>Indicate below the broker who will assist with this
                                                                    shipment</p>
                                                            </div>
                                                            @if ($errors->has('select_broker'))
                                                                <div class="error text-end">
                                                                    {{ $errors->first('select_broker') }}</div>
                                                            @endif
                                                            <div class="special_services_form">
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="lastname" class="form-label">
                                                                        Broker account no.
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="" class="form-control"
                                                                            name="broker_accno"
                                                                            value="{{ old('broker_accno') }}">
                                                                    </div>
                                                                    @if ($errors->has('broker_accno'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('broker_accno') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="stock" class="form-label">
                                                                        <span class="required-star">*</span>
                                                                        Broker company name
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="" class="form-control"
                                                                            name="broker_company_name">
                                                                    </div>
                                                                    @if ($errors->has('broker_company_name'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('broker_company_name') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="stock" class="form-label">
                                                                        Broker contact name
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="" class="form-control"
                                                                            name="broker_contact_name">
                                                                    </div>
                                                                    @if ($errors->has('broker_contact_name'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('broker_contact_name') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="stock" class="form-label">
                                                                        <span class="required-star">*</span>
                                                                        Address 1
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="" class="form-control"
                                                                            name="broker_address1">
                                                                    </div>
                                                                    @if ($errors->has('broker_address1'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('broker_address1') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="stock" class="form-label">
                                                                        <span class="required-star">*</span>
                                                                        Address 2
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="" class="form-control"
                                                                            name="broker_address2"
                                                                            value="{{ old('broker_address2') }}">
                                                                    </div>
                                                                    @if ($errors->has('broker_address2'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('broker_address2') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="stock" class="form-label">
                                                                        <span class="required-star">*</span>
                                                                        Postal code
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <input type="number" class="form-control"
                                                                                    name="broker_post_code"
                                                                                    value="{{ old('broker_post_code') }}">
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <a href="" class="link">Postal
                                                                                    code
                                                                                    information</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @if ($errors->has('broker_post_code'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('broker_post_code') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="stock" class="form-label">
                                                                        <span class="required-star">*</span>
                                                                        City
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="d-flex">
                                                                            <input type="text" class="form-control"
                                                                                name="broker_city"
                                                                                value="{{ old('broker_city') }}">
                                                                            <button class="btn dropdown">
                                                                                <span><i
                                                                                        class="fa fa-chevron-down"></i></span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    @if ($errors->has('broker_city'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('broker_city') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="stock" class="form-label">
                                                                        <span class="required-star">*</span>
                                                                        State
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"
                                                                            name="broker_state"
                                                                            value="{{ old('broker_state') }}">
                                                                    </div>
                                                                    @if ($errors->has('broker_state'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('broker_state') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="stock" class="form-label">
                                                                        <!-- <span class="sign">*</span> -->
                                                                        Country/Territory
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="" class="form-control"
                                                                            name="broker_country"
                                                                            value="{{ old('broker_country') }}">
                                                                    </div>
                                                                    @if ($errors->has('broker_country'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('broker_country') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="stock" class="form-label">
                                                                        <span class="required-star">*</span>
                                                                        Phone no.
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="number" class="form-control"
                                                                            name="broker_phone_no">
                                                                    </div>
                                                                    @if ($errors->has('broker_phone_no'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('broker_phone_no') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="stock" class="form-label">
                                                                        <span class="required-star">*</span>
                                                                        Broker tax ID
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="" class="form-control"
                                                                            name="broker_tax_id">
                                                                    </div>
                                                                    @if ($errors->has('broker_tax_id'))
                                                                        <div class="error text-end">
                                                                            {{ $errors->first('broker_tax_id') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <!-- </form> -->
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <!-- <form action="" method="post" class="m-2"> -->
                                                <fieldset class="form-group border p-3">
                                                    <legend class="w-auto ">Pickup/Drop-off (optional)</legend>
                                                    <div class="row mt-4">
                                                        <div class="col-md-12">
                                                            <p>
                                                                You are dropping off your package at a FedEx location.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend class="w-auto ">Rates & Transit Times(optional)</legend>
                                                    <div class="row mt-4">
                                                        <div class="col-md-12">
                                                            <p>
                                                                View your rates and transit times based on your
                                                                selections.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <div class="text-end">
                                                    <a class="btn btn-secondary rounded-0" data-toggle="tab" href="#nav-table"
                                                        role="tab" aria-controls="nav-table" aria-selected="true">Next <span
                                                            class="fa fa-arrow-right"></span></a>
                                                </div>
                                            </div> --}}
                                            <div class="text-end">
                                                <a class="btn btn-secondary rounded-0" data-toggle="tab" href="#nav-table"
                                                    role="tab" aria-controls="nav-table" aria-selected="true">Next <span
                                                        class="fa fa-arrow-right"></span></a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Shipment Info -->
                                    <div class="tab-pane tab-pane-background fade" id="nav-shipmentInfo" role="tabpanel"
                                        aria-labelledby="nav-shipmentInfo-tab">
                                        <div class="row">
                                            <div class="col form-2-box wow fadeInUp">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2">Continue your Shipment</legend>
                                                            <div class="card">
                                                                <div class="card-body Continueyourshipment">
                                                                    <h5 class="heading font-weight-bold">
                                                                        Please Note:
                                                                    </h5>
                                                                    <ul>
                                                                        <li>
                                                                            <!-- <span class="icon"></span> -->
                                                                            <p>Click the ship button only once. Expert
                                                                                some
                                                                                delay due to transmission time.
                                                                                Do not click Stop or Reload; it may
                                                                                cause a
                                                                                duplicate shipment transaction to occur.
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <!-- <span class="icon"></span> -->
                                                                            <p>
                                                                                By clicking the Ship/Continue button,
                                                                                you agree
                                                                                to the <a href="">FedEx Ship Manager
                                                                                    at fedex.com Terms of use
                                                                                </a> and the FedEx terms of shipping in
                                                                                the
                                                                                applicable <a href="">FedEx Service
                                                                                    Guide</a>
                                                                                and the <a href="">Shipper's Terms and
                                                                                    Conditions for FedEx Express
                                                                                    international
                                                                                    shipment.</a>
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <!-- <span class="icon"></span> -->
                                                                            <p> By clicking the Ship/Continue button,
                                                                                you agree
                                                                                that this shipment does not contain
                                                                                Undeclared
                                                                                Dangerous
                                                                                Goods. If you are uncertain of whether
                                                                                your
                                                                                shipment contains Dangerous Goods, see
                                                                                the <a href="">Help</a>
                                                                                for more information.
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <!-- <span class="icon"></span> -->
                                                                            <p>
                                                                                Results provided by FedEx Address
                                                                                Checker are
                                                                                believed to be reliable, but are not
                                                                                guaranteed.
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <!-- <span class="icon"></span> -->
                                                                            <p>
                                                                                FedEx makes no warranties, express or
                                                                                implied,
                                                                                regarding Address Checker information.
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <!-- <span class="icon"></span> -->
                                                                            <p>
                                                                                Correct completion of shipping documents
                                                                                is the
                                                                                responsibility of the customer.
                                                                            </p>
                                                                        </li>
                                                                        <li>
                                                                            <!-- <span class="icon"></span> -->
                                                                            <p>
                                                                                If the delivery address is later
                                                                                identified as
                                                                                residential, you could receive a
                                                                                residential
                                                                                surcharge.
                                                                            </p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="text-end">
                                                        <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                            href="#nav-customComplete" role="tab"
                                                            aria-controls="nav-customComplete" aria-selected="true">Next
                                                            <span class="fa fa-arrow-right"></span></a>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Complete Your Shipment modules -->
                                    <div class="tab-pane tab-pane-background fade" id="nav-completeShipment"
                                        role="tabpanel" aria-labelledby="nav-completeShipment-tab">
                                        <div class="row">
                                            <div class="col">
                                                <!-- <form class="m-2" action="" method="post"> -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2">Complete your Shipment</legend>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="d-flex alert m-0 px-0">
                                                                        <span class="exclma">
                                                                            <i class="fas fa-exclamation"></i>

                                                                        </span>
                                                                        Alert
                                                                    </div>
                                                                    <p class="alert m-0 px-0">Please review alert(s)
                                                                        provided on this page
                                                                        before continuing.</p>
                                                                    <div class="">
                                                                        <input type="checkbox">&nbsp;
                                                                        Create a Shipment Profile to store recipient,
                                                                        package and all other details of this shipment
                                                                        for future use.
                                                                    </div>
                                                                    <p class="heading mt-4 font-weight-bold">
                                                                        Please Note:
                                                                    </p>
                                                                    <div class="">
                                                                        <ul>
                                                                            <li>
                                                                                <p>
                                                                                    Product/Commodity information will be
                                                                                    saved in your Product profile
                                                                                    with the Weight and Value of Customs for
                                                                                    1 (one) unit. You will need to enter the
                                                                                    appropriate Quantity each time you ship
                                                                                    this commodity.
                                                                                </p>
                                                                            </li>
                                                                            <li>
                                                                                <p>
                                                                                    A maximum of ninety nine separate
                                                                                products/commodities can be entered.
                                                                                </p>
                                                                            </li>
                                                                            <li>
                                                                                <p>
                                                                                    If a commercial Invoice/Pro Forma is not
                                                                                produced for this shipment, the shipper
                                                                                is responsible for completing this document as required
                                                                                by the destination country.
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="btn_group text-end">
                                                                        <button type="submit"
                                                                            class="btn btn-success rounded-0 mr-2">Save for
                                                                            later <i class="fa fa-save"></i></button>
                                                                        <button class="btn btn-primary rounded-0"
                                                                            type="submit">Ship <i
                                                                                class="fa fa-check-circle"></i></button>
                                                                    </div>
                                                                    {{-- <div class="buttons text-end">
                                                                        <button type="button"
                                                                            class="btn save_for_later">Save for
                                                                            later</button>
                                                                        <button class="btn ship"
                                                                            type="button">Ship</button>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    {{-- <div class="col-md-6">
                                                    </div> --}}
                                                    <div class="text-end">
                                                        <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                            href="#nav-optional" role="tab" aria-controls="nav-optional"
                                                            aria-selected="true">Next <span
                                                                class="fa fa-arrow-right"></span></a>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Commodity Information modules -->
                                    <div class="tab-pane tab-pane-background fade" id="nav-commodityInfo" role="tabpanel"
                                        aria-labelledby="nav-commodityInfo-tab">
                                        <div class="row">
                                            <div class="col">
                                                <!-- <form class="m-2" action="" method="post"> -->
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <fieldset class="form-group border p-3 commodity cdity-container">
                                                            <legend class="w-auto px-2">Commodity Information</legend>
                                                            {{--
                                                            <div class="mt-3">
                                                                <a href="">Check for prohibited commodities into
                                                                    United States</a>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <h6>Commodity Summary</h6>
                                                                <a href="" class="ml-5">Manage/Import
                                                                    profiles</a>
                                                            </div>
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-hover">
                                                                    <thead class="table-secondary">
                                                                        <tr>
                                                                            <th scope="col">
                                                                                <input type="checkbox" name="" id="">
                                                                            </th>
                                                                            <th scope="col">
                                                                                <span class="required-star">*</span>
                                                                                Commodity
                                                                            </th>
                                                                            <th scope="col">
                                                                                <span class="required-star">*</span>
                                                                                Customs value (INR)
                                                                            </th>
                                                                            <th scope="col">
                                                                                <span class="required-star">*</span>
                                                                                Qty
                                                                            </th>
                                                                            <th scope="col">
                                                                                <span class="required-star">*</span>
                                                                                Weight (kgs)
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">
                                                                                <input type="checkbox" name="" id="">
                                                                            </th>
                                                                            <td>
                                                                                <select class="form-select">
                                                                                    <option value="">--Select--</option>
                                                                                    @foreach($commodity as $commodityRow)
                                                                                    <option value="{{$commodityRow->id}}">{{$commodityRow->code}}--{{$commodityRow->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th scope="row">
                                                                                <input type="checkbox" name="" id="">
                                                                            </th>
                                                                            <td><strong>Totals</strong></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                            --}}
                                                            <fieldset class="form-group border p-3 commodity mt-5 room-type">
                                                                <legend class="w-auto px-2">Commodity</legend>

                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label">
                                                                            Select Commodity
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <select class="form-select w-100 sel-com" onchange="otherComodity()" name="commodity[]">
                                                                                <option value="">--Select--</option>
                                                                                @foreach($commodity as $commodityRow)
                                                                                <option value="{{$commodityRow->id}}">{{$commodityRow->code}}--{{$commodityRow->name}}</option>
                                                                                @endforeach
                                                                                <option value="other">Other</option>
                                                                            </select>
                                                                        </div>

                                                                        @if($errors->has('commodity'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('commodity') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label">
                                                                            Commodity Description
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <textarea name="description[]" id="" rows="3"
                                                                                cols="50"></textarea>
                                                                        </div>
                                                                        @if($errors->has('description'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('description') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label">
                                                                            Unit of Measure
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <select name="unit_of_measure[]" id="" class="form-select w-100">
                                                                                <option value="">--Select--</option>
                                                                                <option value="unit1">Unit 1</option>
                                                                                <option value="unit2">Unit 2</option>
                                                                                <option value="unit3">Unit 3</option>
                                                                                <option value="unit4">Unit 4</option>
                                                                            </select>
                                                                        </div>
                                                                        @if($errors->has('unit_of_measure'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('unit_of_measure') }}
                                                                            </div>
                                                                        @endif
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
                                                                            <input type="text" name="quantity[]" id=""
                                                                                class="form-control">
                                                                        </div>

                                                                        @if($errors->has('quantity'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('quantity') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label">
                                                                            Commodity Weight
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <div class="d-flex">
                                                                                <input type="text" name="commodity_weight[]" id=""
                                                                                    class="form-control">&nbsp;
                                                                                <select name="" id=""
                                                                                    class="form-select">
                                                                                    <option value="">--Select--</option>
                                                                                    <option value="" selected>As totals
                                                                                    </option>
                                                                                </select>
                                                                            </div>&nbsp;Kgs
                                                                        </div>
                                                                        @if($errors->has('commodity_weight'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('commodity_weight') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label">
                                                                            Customs Value
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <div class="d-flex">
                                                                                <input type="text" name="commodity_custom_value[]" id=""
                                                                                    class="form-control"
                                                                                    placeholder="1">&nbsp;
                                                                                <select name="" id=""
                                                                                    class="form-select">
                                                                                    <option value="">--Select--</option>
                                                                                    <option value="" selected>As totals
                                                                                    </option>
                                                                                </select>
                                                                            </div>&nbsp;INR
                                                                        </div>
                                                                        @if($errors->has('commodity_custom_value'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('commodity_custom_value') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label">
                                                                            Country of Manufacture &nbsp;
                                                                            <span><i class="fa fa-question-circle"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <select name="country_of_manufacturer[]" id="" class="form-select">
                                                                                <option value="">--Select--</option>
                                                                                <option value="India">India</option>
                                                                                <option value="China">China</option>
                                                                            </select>
                                                                        </div>
                                                                        @if($errors->has('country_of_manufacturer'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('country_of_manufacturer') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label">
                                                                            Harmonized Code &nbsp;
                                                                            <span><i class="fa fa-question-circle"></i></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <div class="row">
                                                                                <div class="col-md-8">
                                                                                    <input type="text" name="harmonized_code[]" id="harmonized_code"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <a href="">Get code</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if($errors->has('harmonized_code'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('harmonized_code') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </fieldset>

                                                            <!-- <div class="append"></div> -->
                                                        </fieldset>


                                                        <div class="d-flex">
                                                            <div class="text-right me-2">
                                                                <button type="button" class="btn btn-primary rounded-0" id="addField">Add More <i class="fa fa-plus"></i></button>
                                                            </div>

                                                            <div class="text-right">
                                                                <button type="button" class="btn btn-danger rounded-0" id="removeField">Remove <i class="fa fa-minus"></i></button>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="">
                                                            <fieldset class="form-group border p-3">
                                                                <legend class="w-auto px-2">Total Shipment Details
                                                                </legend>
                                                                <div class="row form-group mt-3">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label ">
                                                                            Shipment Weight
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <div class="d-flex">
                                                                                <input type="text" class="form-control"
                                                                                    name="shipment_weight"
                                                                                    value="{{ old('shipment_weight') }}">
                                                                                <span
                                                                                    class="margin_left">&nbsp;kgs</span>
                                                                            </div>
                                                                        </div>
                                                                        @if ($errors->has('shipment_weight'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('shipment_weight') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label for="name" class="form-label ">
                                                                            Total Carriage Value
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <div class="d-flex">
                                                                                <input type="text" class="form-control"
                                                                                    name="total_shipment_value">
                                                                                <span class="margin_left">
                                                                                    &nbsp;Indian Rupees
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        @if ($errors->has('total_shipment_value'))
                                                                            <div class="error text-end">
                                                                                {{ $errors->first('total_shipment_value') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                            href="#nav-optional" role="tab" aria-controls="nav-optional"
                                                            aria-selected="true">Next <span class="fa fa-arrow-right"></span></a>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Custom Documentation modules -->
                                    <div class="tab-pane tab-pane-background fade" id="nav-customDocumentation"
                                        role="tabpanel" aria-labelledby="nav-customDocumentation-tab">
                                        <div class="row">
                                            <div class="col">
                                                <!-- <form class="m-2" action="" method="post"> -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2">Custom Documentation</legend>
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="d-flex alert m-0 px-0">
                                                                                <span class=" exclma">
                                                                                    <i class="fas fa-exclamation"></i>
                                                                                </span>
                                                                                Alert
                                                                            </div>
                                                                            <p class="alert m-0 p-0">A Commercial
                                                                                Invoice/Pro Forma Invoice is
                                                                                required for this shipment. Please print
                                                                                your
                                                                                customs documents and attach
                                                                                them to your shipment.
                                                                            </p>
                                                                            <div class="mt-1 mb-2">
                                                                                <input type="checkbox" value="">
                                                                                Commercial Invoice
                                                                            </div>
                                                                            <div class="mt-1 mb-2">
                                                                                <input type="checkbox" value="">
                                                                                Pro Forma Invoice
                                                                            </div>
                                                                            <h5 class="additional">
                                                                                <span>
                                                                                    <i class="fa fa-plus"></i>

                                                                                </span>
                                                                                Additional FedEx generated trade
                                                                                documents
                                                                            </h5>
                                                                            {{-- <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="d-flex alert m-0 px-0">
                                                                                        <span class="exclma">
                                                                                            <i
                                                                                                class="fas fa-exclamation"></i>

                                                                                        </span>
                                                                                        Alert
                                                                                    </div>
                                                                                    <p>
                                                                                        The origin or destination
                                                                                        country requires a
                                                                                        Commercial/Pro Forma Invoice
                                                                                        that includea a
                                                                                        Signature.
                                                                                        Please include this with your
                                                                                        shipment.
                                                                                    </p>
                                                                                </div>
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    {{-- <div class="col-md-6">
                                                    </div> --}}
                                                    <div class="text-end">
                                                        <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                            href="#nav-optional" role="tab" aria-controls="nav-optional"
                                                            aria-selected="true">Next <span
                                                                class="fa fa-arrow-right"></span></a>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Confirmation module -->
                                    <div class="tab-pane tab-pane-background fade" id="nav-table" role="tabpanel"
                                        aria-labelledby="nav-table-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- <form action="" method="post" class="m-2"> -->
                                                <fieldset class="form-group border p-3 confirmation">
                                                    <legend class="w-auto">Confirm your shipment details</legend>
                                                    <h6 class="font-weight-bold mt-4">Outbound Shipment</h6>
                                                    <div class="table-responsive mt-2">
                                                         {{-- <h6 class="table_heading mt-2">Outbound Shipment</h6> --}}
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">From</th>
                                                                    <td>
                                                                        Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing elit. Cras pretium sagittis velit
                                                                        pretium finibus.
                                                                    </td>
                                                                    <td>
                                                                        <span class="font-weight-bold">
                                                                            Lorem ipsum dolor sit amet, consectetur
                                                                            adipiscing elit. Cras pretium sagittis velit
                                                                            pretium finibus.
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="date">
                                                                            09/10/2021
                                                                        </div>
                                                                        <div class="number">
                                                                            4
                                                                        </div>
                                                                        <div class="kgs">
                                                                            38.12 kgs
                                                                        </div>
                                                                        <div class="usd">
                                                                            0.0 USD
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">To</th>
                                                                    <td>
                                                                        Lorem ipsum dolor sit amet, consectetur
                                                                        adipiscing elit. Cras pretium sagittis velit
                                                                        pretium finibus.
                                                                    </td>
                                                                    <td>
                                                                        <span class="font-weight-bold">
                                                                            Lorem ipsum dolor sit amet, consectetur
                                                                            adipiscing elit. Cras pretium sagittis velit
                                                                            pretium finibus.
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="date">
                                                                            09/10/2021
                                                                        </div>
                                                                        <div class="number">
                                                                            4
                                                                        </div>
                                                                        <div class="kgs">
                                                                            38.12 kgs
                                                                        </div>
                                                                        <div class="usd">
                                                                            0.0 USD
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <p class="mt-3">
                                                        By clicking the Ship/Continue button, you agree to the
                                                        <a href="">FedEx Ship Manger at fedex.com Terms of Use</a>
                                                        and the FedEx terms of shipping in the applicable
                                                        <a href="">FedEx Service Guide</a> and the <a href="">Shipper's
                                                            Terms and Conditions for FedEx Express international
                                                            shipments.</a>
                                                    </p>
                                                    <div class="btn_group text-end">
                                                        <button type="submit" class="btn btn-warning rounded-0 mr-2">Edit
                                                            <i class="fa fa-edit"></i></button>
                                                        <button class="btn btn-primary rounded-0" type="submit">Ship <i
                                                                class="fa fa-check-circle"></i></button>
                                                    </div>
                                                    {{-- <div class="button text-end">
                                                        <button class="btn save_for_later">
                                                            Edit
                                                        </button>
                                                        <button class="btn ship" type="submit">
                                                            Ship
                                                        </button>
                                                    </div> --}}
                                                </fieldset>
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
        $(document).ready(function() {

            $('#search-btn').click(function() {
                var searchkey = $('#search').val();
                $.ajax({
                    url: "{{ route('search.service.master') }}",
                    method: "POST",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'searchkey': searchkey
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status == 200) {
                            $('#code').val(response.data.code).prop('disabled', true);
                            $('#name').val(response.data.name).prop('disabled', true);
                            $('#id').val(response.data.id);
                        } else if (response.status == 400) {
                            $('#code').val('');
                            $('#name').val('');
                            $('#id').val('');
                            $('#message').html(response.message).show();
                        } else {
                            $('#message').show();
                            $('#message').html('Unknown Error!');
                        }
                    }
                });
            });

            $('#edit-btn').click(function() {
                $('#code').prop('disabled', false);
                $('#name').prop('disabled', false);
            })

            $( "#searchClient" ).autocomplete({
                source: function( request, response ) {
                  $.ajax({
                    url:"{{route('search.client.automation')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                       _token: '{{csrf_token()}}',
                       search: request.term
                    },
                    success: function( data ) {
                       console.log(data);
                       response( data );
                    }
                  });
                },

                select: function (event, ui) {
                   $('#searchClient').val(ui.item.label);
                   return false;
                }

            });

        });

        // $('.other-commodity').hide();
        // function otherComodity(){
        //     var val = $('.sel-com').val();
        //     if(val == 'other'){
        //         $('.other-commodity').show();
        //     }else{
        //         $('.other-commodity').hide();
        //     }
        // }

        // function addCommodity(){
        //     $( ".cdity-container" ).clone().appendTo( ".append" );
        // }


        var removeBtn = $("#removeField").last();
        $("body").on("click", "#addField", function(e) {
          e.preventDefault();

          var room = $(".room-type").first();
          var count = removeBtn.data("count");
          if (count > 0) {
            removeBtn.data("count", count++).attr("data-count", count);
          } else {
            removeBtn.data("count", 1).attr("data-count", 1);
          }

          room.clone().appendTo(".cdity-container");
        });

        $("body").on("click", "#removeField:not([data-count=0])", function(e) {
          e.preventDefault();
          var count = removeBtn.data("count");

          if (count > 0) {
        var count = $(".room-type");
        if(count.length != 1)
        {
            $(".room-type").last().remove();
            }
          }
        });

    </script>
@endpush
