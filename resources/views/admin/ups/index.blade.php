@extends('layouts.main')
@section('content')
    <div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="ups" role="tabpanel" aria-labelledby="ups-tab">
                        <div class="detail_edit p-3" style="background:#fff;">
                            <div class="row">
                                <div class="col-md-12 row">
                                    <div class="detail_edit p-3" style="background: #fff;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <nav class="tab mb-5">
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <a class="nav-link active" id="nav-shipto-tab" data-toggle="tab"
                                                            href="#nav-shipto" role="tab" aria-controls="nav-shipto"
                                                            aria-selected="true">Ship To
                                                        </a>
                                                        <a class="nav-link" id="nav-shipfrom-tab" data-toggle="tab"
                                                            href="#nav-shipfrom" role="tab" aria-controls="nav-shipfrom"
                                                            aria-selected="false">Ship From
                                                        </a>
                                                        <a class="nav-link " id="nav-shipment-tab" data-toggle="tab"
                                                            href="#nav-shipment" role="tab" aria-controls="nav-shipment"
                                                            aria-selected="false">Create Your Shipment
                                                        </a>
                                                        <a class="nav-link" id="nav-shipmentExport-tab"
                                                            data-toggle="tab" href="#nav-shipmentExport" role="tab"
                                                            aria-controls="nav-shipmentExport"
                                                            aria-selected="false">Shipment & Export
                                                        </a>
                                                        <a class="nav-link" id="nav-shipmentconfirmation-tab"
                                                            data-toggle="tab" href="#nav-shipmentconfirmation" role="tab"
                                                            aria-controls="nav-shipmentconfirmation"
                                                            aria-selected="false">Shipment Confirmation
                                                        </a>
                                                        <a class="nav-link" id="nav-returnShipment-tab"
                                                            data-toggle="tab" href="#nav-returnShipment" role="tab"
                                                            aria-controls="nav-returnShipment" aria-selected="false">Return
                                                            Shipment
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
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="tab-content" id="nav-tabContent">
                                                <!-- Shipment To --->
                                                <div class="tab-pane tab-pane-background fade active show" id="nav-shipto"
                                                    role="tabpanel" aria-labelledby="nav-shipto-tab">
                                                    <div class="row">
                                                        <div class="col form-2-box wow fadeInUp">
                                                            <form action="{{route('ups.store')}}" method="post" class="m-2">
                                                                @csrf
                                                                <fieldset class="form-group border p-3">
                                                                    <legend>Begin your shipment</legend>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>Where is this shipment going?</legend>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">Address
                                                                                            Book</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <select name="address_book" id="address_book"
                                                                                                class="form-select">
                                                                                                <option value="">--Select
                                                                                                    One--</option>
                                                                                                <option value="1">1</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">Enter a
                                                                                            new address</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="new_address" id="new_address" value="{{old('new_address')}}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Company or Name</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="company_name" id="company_name"
                                                                                                class="form-control" value="{{old('company_name')}}">
                                                                                        </div>
                                                                                         <div class="row text-end mb-3">
                                                                                        @if($errors->has('company_name'))
                                                                                            <div class="error">{{ $errors->first('company_name') }}</div>
                                                                                        @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">Contact
                                                                                            Name</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="contact" id="contact" value="{{old('contact')}}"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Email Address</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="email" name="email" id="email"
                                                                                                class="form-control"  value="{{old('email')}}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Country or Territory</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                                <input id="country" type="text" class="form-control fromcountry" name="from_country" id="from_company0" value="{{old('from_country')}}" placeholder="Search Country..." onkeyup="return deleteCountry()">
                                                                                        </div>
                                                                                        <div class="row text-end mb-3">
                                                                                        @if($errors->has('country'))
                                                                                            <div class="error">{{ $errors->first('country') }}</div>
                                                                                        @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            City/Town/Locality</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                                <input id="city" type="text" class="form-control fromcity" name="from_city" id="from_city0" value="{{old('from_city')}}" placeholder="Search City..." onkeyup="return searchCity()">
                                                                               
                                                                                        </div>
                                                                                        <div class="row text-end mb-3">
                                                                                        @if($errors->has('city'))
                                                                                            <div class="error">{{ $errors->first('city') }}</div>
                                                                                        @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Postal Code</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="number" name="postal_code" id="postal_code"  value="{{old('postal_code')}}"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                        <div class="row text-end mb-3">
                                                                                        @if($errors->has('postal_code'))
                                                                                            <div class="error">{{ $errors->first('postal_code') }}</div>
                                                                                        @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Address Line 1</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="address1" id="address1"  value="{{old('address1')}}"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                        <div class="row text-end mb-3">
                                                                                        @if($errors->has('address1'))
                                                                                            <div class="error">{{ $errors->first('address1') }}</div>
                                                                                        @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Address Line 2</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="address2" id="address2" value="{{old('address2')}}"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Address Line 3</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="address3" id="address3" value="{{old('address3')}}"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Telephone</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="number" name="telephone" id="telephone" value="{{old('telephone')}}"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                        <div class="row text-end mb-3">
                                                                                        @if($errors->has('telephone'))
                                                                                            <div class="error">{{ $errors->first('telephone') }}</div>
                                                                                        @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Ext</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="ext" id="ext" value="{{old('ext')}}"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mt-3">
                                                                                    <input type="checkbox" name="resident_address" id="resident_address">
                                                                                    Residential Address
                                                                                </div>
                                                                                <div class="alert alert-info alert-dismissible fade show mt-4"
                                                                                    role="alert">
                                                                                    <h6
                                                                                        class="alert-heading font-weight-bold">
                                                                                        Ensure Timely Delivery</h6>
                                                                                    <p>To help ensure timely delivery to
                                                                                        your receiver, please provide a
                                                                                        valid mobile phone number and/or
                                                                                        email address. UPS may use the email
                                                                                        address and/or mobile number
                                                                                        provided to update your
                                                                                        receiver about the status of their
                                                                                        package.</p>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="alert"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Save Options for Address</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <select name="save_address" id="save_address"
                                                                                                class="form-select">
                                                                                                <option value="">--Select
                                                                                                    One--
                                                                                                </option>
                                                                                                <option value="555">555</option>
                                                                                                <option value="5">5</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Save this to my address book
                                                                                            as</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="address_book1" id="address_book1" value="{{old('address_book1')}}"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <fieldset
                                                                                    class="form-group border p-3 mt-5">
                                                                                    <legend>UPS Access Point<sup>TM</sup> <a
                                                                                            href="">What's This?</a>&nbsp;<i
                                                                                            class="fa fa-question-circle"></i>
                                                                                    </legend>
                                                                                    <input type="checkbox" name="access_point" id="access_point"
                                                                                        class="mt-3"> &nbsp; Hold
                                                                                    for Customer Collection at UPS Access
                                                                                    Point™
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>Where is this shipment coming from?</legend>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Ship
                                                                                            From Address</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <button type="button"
                                                                                                class="btn btn-warning"><i
                                                                                                    class="fa fa-pencil-alt"
                                                                                                    title="Edit"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <p>SHAILENDRA SHARMA</p>
                                                                                    <p>SHAILENDRA SHARMA</p>
                                                                                    <p>76 VASUNDHRA COLONY</p>
                                                                                    <p>TONK ROAD</p>
                                                                                    <p>JAIPUR</p>
                                                                                    <p>JAIPUR 302012</p>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-3">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Telephone</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <span>9352714979</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-3">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Email</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <span>deepak.aggarwal@omintl.net</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>
                                                                                    <p>If the shipment is undeliverable
                                                                                        return to:</p>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">
                                                                                            Return Address</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <i
                                                                                                class="fa fa-question-circle"></i>
                                                                                            &nbsp;
                                                                                            <button type="button"
                                                                                                class="btn btn-warning"><i
                                                                                                    class="fa fa-pencil-alt"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <p>SHAILENDRA SHARMA</p>
                                                                                    <p>SHAILENDRA SHARMA</p>
                                                                                    <p>76 VASUNDHRA COLONY</p>
                                                                                    <p>TONK ROAD</p>
                                                                                    <p>JAIPUR</p>
                                                                                    <p>JAIPUR 302012</p>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-3">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">
                                                                                            Telephone</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <span>9352714979</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group mt-3">
                                                                                    <div class="col-md-3">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Email</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <span>deepak.aggarwal@omintl.net</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>What are you shipping?</legend>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">Number
                                                                                            of Packages</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="packages" id="packages" value="{{old('packages')}}"
                                                                                                class="form-control"
                                                                                                name="" id="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Packages are all the
                                                                                            same?</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <select name="same_packages" id="same_packages" value="{{old('same_packages')}}"
                                                                                                class="form-select">
                                                                                                <option value="">--Select--
                                                                                                </option>
                                                                                                <option value="yes" selected>
                                                                                                    Yes</option>
                                                                                                <option value="no">No</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">Packaging
                                                                                            Type &nbsp;<i
                                                                                                class="fa fa-question-circle"></i></label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <select name="packages_type"
                                                                                                class="form-select"
                                                                                                id="packages_type">
                                                                                                <option value="">--Select--
                                                                                                </option>
                                                                                                <option value="other packaging" selected>
                                                                                                    Other Packaging</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Shipment Weight</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="shipment_weight" id="shipment_weight" value="{{old('shipment_weight')}}"
                                                                                                class="form-control"> Kg
                                                                                        </div>
                                                                                        <div class="row text-end mb-3">
                                                                                        @if($errors->has('shipment_weight'))
                                                                                            <div class="error">{{ $errors->first('shipment_weight') }}</div>
                                                                                        @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Total Dimensional Weight
                                                                                            &nbsp;<i
                                                                                                class="fa fa-question-circle"></i>
                                                                                            &nbsp; or Enter package
                                                                                            dimensions</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="packages_dimensions" id="packages_dimensions"  value="{{old('packages_dimensions')}}"
                                                                                                class="form-control"> Kg
                                                                                        </div>
                                                                                        <div class="row text-end mb-3">
                                                                                        @if($errors->has('packages_dimensions'))
                                                                                            <div class="error">{{ $errors->first('packages_dimensions') }}</div>
                                                                                        @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Shipment Declared Value <i
                                                                                                class="fa fa-question-circle"></i></label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="shipment_value" id="shipment_value" value="{{old('shipment_value')}}"
                                                                                                class="form-control"> INR
                                                                                        </div>
                                                                                        <div class="row text-end mb-3">
                                                                                        @if($errors->has('shipment_value'))
                                                                                            <div class="error">{{ $errors->first('shipment_value') }}</div>
                                                                                        @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <p><strong>Note:</strong> Additional
                                                                                        shipping fees may apply based on
                                                                                        declared value.</p>
                                                                                </div>
                                                                                <div class="row form-group mt-4">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Large or Unusually Shaped
                                                                                            Packages <i
                                                                                                class="fa fa-question-circle"></i></label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-md-6">
                                                                                                    <input type="checkbox"
                                                                                                        name="large_packages[]" id="" value="large packages"> Large
                                                                                                    Package
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-md-6">
                                                                                                    <input type="checkbox"
                                                                                                        name="large_packages[]" id="" value="additional handling">
                                                                                                    Additional Handling
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Does this package include
                                                                                            batteries ?</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="radio" name="packages_include_batteries"
                                                                                                id="" value="yes"> &nbsp; Yes
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp; 
                                                                                            <input type="radio" name="packages_include_batteries"
                                                                                                id="" value="no"> &nbsp; No
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>How would you like to ship?</legend>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-7">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Service</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="service" id=""  value="{{old('service')}}"
                                                                                                placeholder="Not available">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <!-- <a href="" 
                                                                                    style="text-decoration: none">Compare
                                                                                    Time and Cost <i
                                                                                        class="fa fa-arrow-right"></i></a> -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <h6>Do you need <a href=""
                                                                                        style="text-decoration: none">additional
                                                                                        services</a> ?</h6>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <h6 class="font-weight-bold">Fee?</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-8">
                                                                                <input type="checkbox" name="additional_service[]" id="" value="Send E-mail Notifications"> &nbsp;
                                                                                Send E-mail Notifications
                                                                                <br>
                                                                                <input type="checkbox" name="additional_service[]" id="" value="Receive Confirmation of Delivery"> &nbsp;
                                                                                Receive Confirmation of Delivery
                                                                                <br>
                                                                                <input type="checkbox" name="additional_service[]" id="" value="Deliver On Saturday"> &nbsp;
                                                                                Deliver On Saturday
                                                                                <br>
                                                                                <input type="checkbox" name="additional_service[]" id=""value="Direct Delivery Only"> &nbsp;
                                                                                Direct Delivery Only
                                                                                <br>
                                                                                <input type="checkbox" name="additional_service[]" id="" value="C.O.D."> &nbsp;
                                                                                C.O.D.
                                                                                <br>
                                                                                <input type="checkbox" name="additional_service[]" id=""value="Offset the climate impact of this shipment"> &nbsp;
                                                                                Offset the climate impact of this shipment
                                                                                (UPS carbon neutral)
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <span>Free</span><br>
                                                                                <span>Yes</span><br>
                                                                                <span>Yes</span><br>
                                                                                <span>Yes</span><br>
                                                                                <span>Yes</span><br>
                                                                                <span>Yes</span><br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <span>Some services may require extra
                                                                                information. You will be able to enter the
                                                                                required information on the next
                                                                                page.</span>
                                                                        </div>
                                                                    </fieldset>
                                                                    <div class="row mt-5">
                                                                        <div class="col-md-6">
                                                                            <fieldset class="form-group border p-3">
                                                                                <legend>Would you like to add reference
                                                                                    numbers to
                                                                                    this shipment?</legend>
                                                                                <h6 class="mt-5">UPS gives you
                                                                                    the option
                                                                                    to track your shipments using <a href=""
                                                                                        style="text-decoration: none">references</a><sup><i
                                                                                            class="fa fa-question-circle"></i></sup>
                                                                                    that you define.</h6>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Reference#1</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="refrence1" id="" value="{{old('refrence1')}}"
                                                                                                placeholder="INEXT-">
                                                                                        </div>
                                                                                        <div class="row text-end mb-3">
                                                                                        @if($errors->has('refrence1'))
                                                                                            <div class="error">{{ $errors->first('refrence1') }}</div>
                                                                                        @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Reference#2</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control" value="{{old('refrence2')}}"
                                                                                                name="refrence2" id="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <!-- <input type="checkbox" name=""
                                                                                        id="">&nbsp;<a href=""
                                                                                        style="text-decoration: none">Add a
                                                                                        bar code for Reference#1 to my
                                                                                        shipping label</a>&nbsp;<i
                                                                                        class="fa fa-question-circle"></i>
                                                                                </div> -->
                                                                            </fieldset>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <fieldset class="form-group border p-3">
                                                                                <legend>How would you like to pay?</legend>
                                                                                <div class="row mt-2">
                                                                                    <div class="col-md-12">
                                                                                        <span>Please enter your payment
                                                                                            information
                                                                                            below. The information you enter
                                                                                            will be
                                                                                            transmitted using a secure
                                                                                            connection.</span>
                                                                                        <div class="row form-group mt-3">
                                                                                            <div class="col-md-4">
                                                                                                <label for="name"
                                                                                                    class="form-label">Payment
                                                                                                    method for shipping
                                                                                                    charges <i
                                                                                                        class="fa fa-question-circle"></i></label>
                                                                                            </div>
                                                                                            <div class="col-md-8">
                                                                                                <div
                                                                                                    class="bind_input">
                                                                                                    <span
                                                                                                        class="spacing">:</span>
                                                                                                    <div
                                                                                                        class="row">
                                                                                                        <div
                                                                                                            class="col-md-8">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="shipment_charge" value="{{old('shipment_charge')}}"
                                                                                                                id="">
                                                                                                        </div>
                                                                                                        <div class="row text-end mb-3">
                                                                                                        @if($errors->has('shipment_charge'))
                                                                                                            <div class="error">{{ $errors->first('refrence1') }}</div>
                                                                                                        @endif
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-md-4">
                                                                                                            <!-- <a href=""
                                                                                                                style="text-decoration: none">Check
                                                                                                                My
                                                                                                                Discounts</a> -->
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row form-group">
                                                                                            <div class="col-md-4">
                                                                                                <label for="name"
                                                                                                    class="form-label">Promotion
                                                                                                    Code &nbsp;<i
                                                                                                        class="fa fa-question-circle"></i></label>
                                                                                            </div>
                                                                                            <div class="col-md-8">
                                                                                                <div
                                                                                                    class="bind_input">
                                                                                                    <span
                                                                                                        class="spacing">:</span>
                                                                                                    <div
                                                                                                        class="row">
                                                                                                        <div
                                                                                                            class="col-md-8">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="promotion_code" value="{{old('promotion_code')}}"
                                                                                                                id="">
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-md-4">
                                                                                                            <!-- <a href=""
                                                                                                                style="text-decoration: none">Apply
                                                                                                                Code</a> -->
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>Would you like to schedule a collection?
                                                                        </legend>
                                                                        <div class="mt-4">
                                                                            <input type="checkbox" name="ups_schedule" id="">
                                                                            &nbsp;Schedule a <a href=""
                                                                                style="text-decoration: none">UPS On-Call
                                                                                Collection</a>. <i
                                                                                class="fa fa-question-circle"></i>
                                                                        </div>
                                                                    </fieldset>
                                                                    <div class="mt-4">
                                                                        <input type="checkbox" name="tearm_condition" id=""
                                                                            class="shipCheck mb-3"> &nbsp;Review Shipping
                                                                        details, including price, before completing this
                                                                        shipment.
                                                                        <p class="shipCheck">By selecting the Next
                                                                            button, I agree to the <a href=""
                                                                                style="text-decoration: none">Terms and
                                                                                Conditions</a>.</p>
                                                                    </div>
                                                                </fieldset>
                                                                <div class="text-end">
                                                                            <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                                            href="#nav-shipfrom" role="tab"
                                                                            aria-controls="nav-fromto" aria-selected="false">Next
                                                                            <span><i class="fa fa-arrow-right"></i></span></a> 
                                                                </div>
                                                        
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Ship From --->
                                                <div class="tab-pane tab-pane-background fade" id="nav-shipfrom"
                                                    role="tabpanel" aria-labelledby="nav-shipfrom-tab">
                                                    <div class="row">
                                                        <div class="col form-2-box wow fadeInUp">
                                                                <fieldset class="form-group border p-3">
                                                                    <legend>Shipment From</legend>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">Address
                                                                                        Book</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text" name="address_books"
                                                                                            class="form-control" value="{{old('address_books')}}"
                                                                                            >
                                                                                    </div>
                                                                                    <div class="row text-end mb-3">
                                                                                        @if($errors->has('address_books'))
                                                                                        <div class="error">{{ $errors->first('address_books') }}</div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        <span
                                                                                            class="required-star">*</span>
                                                                                        Company or Name</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text" name="company" value="{{old('company')}}"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                    <div class="row text-end mb-3">
                                                                                        @if($errors->has('company'))
                                                                                        <div class="error">{{ $errors->first('company') }}</div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">Contact
                                                                                        Name</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text" name="contact_name" value="{{old('contact_name')}}"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                    <div class="row text-end mb-3">
                                                                                        @if($errors->has('contact_name'))
                                                                                        <div class="error">{{ $errors->first('contact_name') }}</div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Email Address</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="email" name="email_id" value="{{old('email_id')}}"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        <span
                                                                                            class="required-star">*</span>
                                                                                        Country or Territory</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                            <input id="country" type="text" class="form-control fromcountry" name="from_country" id="from_company0" value="{{old('from_country')}}" placeholder="Search Country..." onkeyup="return deleteCountry()">
                                                                                      
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        <span
                                                                                            class="required-star">*</span>
                                                                                        City/Town/Locality</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                            <input id="city" type="text" class="form-control fromcity" name="from_city" id="from_city0" value="{{old('from_city')}}" placeholder="Search City..." onkeyup="return searchcity()">
                                                                                      
                                                                                    </div>
                                                                                    <div class="row text-end mb-3">
                                                                                        @if($errors->has('town'))
                                                                                        <div class="error">{{ $errors->first('town') }}</div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        <span
                                                                                            class="required-star">*</span>
                                                                                        Postal Code</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="number" name="postal_code1"  value="{{old('postal_code1')}}"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        <span
                                                                                            class="required-star">*</span>
                                                                                        Address Line 1</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text" name="address_line1" value="{{old('address_line1')}}"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                    <div class="row text-end mb-3">
                                                                                        @if($errors->has('address_line1'))
                                                                                        <div class="error">{{ $errors->first('address_line1') }}</div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Address Line 2</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text" name="address_line2" value="{{old('address_line2')}}"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Address Line 3</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text" name="address_line3" value="{{old('address_line3')}}"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Telephone</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="number" name="telephone1" value="{{old('telephone1')}}"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                    <div class="row text-end mb-3">
                                                                                        @if($errors->has('telephone1'))
                                                                                        <div class="error">{{ $errors->first('telephone1') }}</div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Ext</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text" name="ext1" value="{{old('ext1')}}"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <input type="checkbox" name="resident" id="resident" value="{{old('resident')}}">
                                                                                Residential Address
                                                                            </div>
                                                                            <div class="row form-group mt-3">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Other Address Information</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text" name="add_information" value="{{old('add_information')}}"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Save Options for Address</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <select name="select_add" id=""
                                                                                            class="form-select">
                                                                                            <option value="">--Select--
                                                                                            </option>
                                                                                            <option value="1">1</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Save this to my address book
                                                                                        as</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text" name="address_book_save" value="{{old('address_book_save')}}"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <div class="text-end">
                                                                            <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                                            href="#nav-shipment"  role="tab"
                                                                            aria-controls="nav-fromto" aria-selected="false">Next
                                                                            <span><i class="fa fa-arrow-right"></i></span></a>
                                                                </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Shipment creation --->
                                                <div class="tab-pane tab-pane-background fade" id="nav-shipment"
                                                    role="tabpanel" aria-labelledby="nav-shipment-tab">
                                                    <div class="row">
                                                        <div class="col form-2-box wow fadeInUp">
                                                
                                                                <fieldset class="form-group border p-3">
                                                                    <legend>Create your shipment</legend>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>Where is this shipment going?</legend>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">Address
                                                                                            Book</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <select name="" id=""
                                                                                                class="form-select">
                                                                                                <option value="">--Select
                                                                                                    One--</option>
                                                                                                <option value="">1</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">Enter a
                                                                                            new address</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="" id="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Company or Name</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">Contact
                                                                                            Name</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Email Address</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="email"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Country or Territory</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                                <input id="country" type="text" class="form-control fromcountry" name="from_country" id="from_company0" value="{{old('from_country')}}" placeholder="Search Country..." onkeyup="return deleteCountry()">
                                                                                      
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            City/Town/Locality</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                                <input id="city" type="text" class="form-control fromcity" name="from_city" id="from_company0" value="{{old('from_city')}}" placeholder="Search City..." onkeyup="return searchcity()">
                                                                                      
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Postal Code</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="number"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Address Line 1</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Address Line 2</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Address Line 3</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Telephone</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="number"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Ext</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mt-3">
                                                                                    <input type="checkbox" name="" id="">
                                                                                    Residential Address
                                                                                </div>
                                                                                <div class="row form-group mt-3">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Other Address
                                                                                            Information</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="alert alert-info alert-dismissible fade show mt-4"
                                                                                    role="alert">
                                                                                    <h6
                                                                                        class="alert-heading font-weight-bold">
                                                                                        Ensure Timely Delivery</h6>
                                                                                    <p>To help ensure timely delivery to
                                                                                        your receiver, please provide a
                                                                                        valid mobile phone number and/or
                                                                                        email address. UPS may use the email
                                                                                        address and/or mobile number
                                                                                        provided to update your
                                                                                        receiver about the status of their
                                                                                        package.</p>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="alert"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Save Options for Address</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <select name="" id=""
                                                                                                class="form-select">
                                                                                                <option value="">--Select--
                                                                                                </option>
                                                                                                <option value="">1</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Save this to my address book
                                                                                            as</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>Where is this shipment coming from?</legend>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Ship
                                                                                            From Address</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <button
                                                                                                class="btn btn-warning"><i
                                                                                                    class="fa fa-pencil-alt"
                                                                                                    title="Edit"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <p>SHAILENDRA SHARMA</p>
                                                                                    <p>SHAILENDRA SHARMA</p>
                                                                                    <p>76 VASUNDHRA COLONY</p>
                                                                                    <p>TONK ROAD</p>
                                                                                    <p>JAIPUR</p>
                                                                                    <p>JAIPUR 302012</p>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-3">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Telephone</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <span>show no</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-3">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Email</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <span>show email</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>
                                                                                    <p>If the shipment is undeliverable
                                                                                        return to:</p>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">
                                                                                            Return Address</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <i
                                                                                                class="fa fa-question-circle"></i>
                                                                                            &nbsp;
                                                                                            <button
                                                                                                class="btn btn-warning"><i
                                                                                                    class="fa fa-pencil-alt"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <p>SHAILENDRA SHARMA</p>
                                                                                    <p>SHAILENDRA SHARMA</p>
                                                                                    <p>76 VASUNDHRA COLONY</p>
                                                                                    <p>TONK ROAD</p>
                                                                                    <p>JAIPUR</p>
                                                                                    <p>JAIPUR 302012</p>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-3">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">
                                                                                            Telephone</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <span>show no</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group mt-3">
                                                                                    <div class="col-md-3"> 
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Email</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <span>show email</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>What are you shipping?</legend>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">Description
                                                                                            of Goods<i
                                                                                                class="fa fa-question-circle"></i></label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <textarea name="" id="" class="dhltext" rows="3"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <input type="checkbox" name="" id="">
                                                                                    Documents of No Commercial Value
                                                                                </div>
                                                                                <div class="row form-group mt-3">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">Number
                                                                                            of Packages</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="" id="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Packages are all the
                                                                                            same?</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <select name=""
                                                                                                class="form-select"
                                                                                                id="">
                                                                                                <option value="">--Select--
                                                                                                </option>
                                                                                                <option value="" selected>
                                                                                                    Yes</option>
                                                                                                <option value="">No</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">Packaging
                                                                                            Type &nbsp;<i
                                                                                                class="fa fa-question-circle"></i></label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <select name=""
                                                                                                class="form-select"
                                                                                                id="">
                                                                                                <option value="">--Select--
                                                                                                </option>
                                                                                                <option value="" selected>
                                                                                                    Other Packaging</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            <span
                                                                                                class="required-star">*</span>
                                                                                            Shipment Weight</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control"> Kg
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Package Dimensions<i
                                                                                                class="fa fa-question-circle"></i></label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-md-4 d-flex">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        placeholder="L">&nbsp;&nbsp;
                                                                                                    <i
                                                                                                        class="fa fa-times mt-2"></i>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-md-4 d-flex">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        placeholder="W">&nbsp;&nbsp;
                                                                                                    <i
                                                                                                        class="fa fa-times mt-2"></i>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-md-4">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        placeholder="H">
                                                                                                </div>
                                                                                            </div>cm
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Shipment Declared Value <i
                                                                                                class="fa fa-question-circle"></i></label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text" name="" id=""
                                                                                                class="form-control"> INR
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <p><strong>Note:</strong> Additional
                                                                                        shipping fees may apply based on
                                                                                        declared value.</p>
                                                                                </div>
                                                                                <div class="row form-group mt-4">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Large or Unusually Shaped
                                                                                            Packages <i
                                                                                                class="fa fa-question-circle"></i></label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <div class="row">
                                                                                                <div
                                                                                                    class="col-md-6">
                                                                                                    <input type="checkbox"
                                                                                                        name="" id=""> Large
                                                                                                    Package
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-md-6">
                                                                                                    <input type="checkbox"
                                                                                                        name="" id="">
                                                                                                    Additional Handling
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Does this package include
                                                                                            batteries? <i
                                                                                                class="fa fa-question-circle"></i></label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="radio" name=""
                                                                                                id=""> &nbsp; Yes
                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            <input type="radio" name=""
                                                                                                id=""> &nbsp; No
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>How would you like to ship?</legend>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-7">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label">
                                                                                            Service</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="" id=""
                                                                                                placeholder="Not available">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <a href=""
                                                                                    style="text-decoration: none">Compare
                                                                                    Time and Cost <i
                                                                                        class="fa fa-arrow-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-7">
                                                                                <h6>Do you need <a href=""
                                                                                        style="text-decoration: none">additional
                                                                                        services</a> ?</h6>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <h6 class="font-weight-bold">Fee?</h6>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-md-7">
                                                                                <input type="checkbox" name="" id=""> &nbsp;
                                                                                Send E-mail Notifications
                                                                                <br>
                                                                                <input type="checkbox" name="" id=""> &nbsp;
                                                                                Receive Confirmation of Delivery
                                                                                <br>
                                                                                <input type="checkbox" name="" id=""> &nbsp;
                                                                                Deliver On Saturday
                                                                                <br>
                                                                                <input type="checkbox" name="" id=""> &nbsp;
                                                                                Direct Delivery Only
                                                                                <br>
                                                                                <input type="checkbox" name="" id=""> &nbsp;
                                                                                C.O.D.
                                                                                <br>
                                                                                <input type="checkbox" name="" id=""> &nbsp;
                                                                                Offset the climate impact of this shipment
                                                                                (UPS carbon neutral)
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <span>Free</span><br>
                                                                                <span>Yes</span><br>
                                                                                <span>Yes</span><br>
                                                                                <span>Yes</span><br>
                                                                                <span>Yes</span><br>
                                                                                <span>Yes</span><br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <span>Some services may require extra
                                                                                information. You will be able to enter the
                                                                                required information on the next
                                                                                page.</span>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>Would you like to add reference numbers to
                                                                            this shipment?</legend>
                                                                        <h6 class="mt-4">UPS gives you the option
                                                                            to track your shipments using <a href=""
                                                                                style="text-decoration: none">references</a><sup><i
                                                                                    class="fa fa-question-circle"></i></sup>
                                                                            that you define.</h6>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Reference#1</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="" id=""
                                                                                                placeholder="INEXT-">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <input type="checkbox" name=""
                                                                                        id="">&nbsp;<a href=""
                                                                                        style="text-decoration: none">Add a
                                                                                        bar code for Reference#1 to my
                                                                                        shipping label</a>&nbsp;<i
                                                                                        class="fa fa-question-circle"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-4">
                                                                                        <label for="name"
                                                                                            class="form-label font-weight-bold">Reference#2</label>
                                                                                    </div>
                                                                                    <div class="col-md-8">
                                                                                        <div class="bind_input">
                                                                                            <span
                                                                                                class="spacing">:</span>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="" id="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </fieldset>
                                                                <div class="text-end">
                                                                    
                                                                            <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                                            href="#nav-shipmentExport" role="tab"
                                                                            aria-controls="nav-fromto" aria-selected="false">Next
                                                                            <span><i class="fa fa-arrow-right"></i></span></a>
                                                                </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Shipment & Export --->
                                                <div class="tab-pane tab-pane-background fade" id="nav-shipmentExport"
                                                    role="tabpanel" aria-labelledby="nav-shipmentExport-tab">
                                                    <div class="row">
                                                        <div class="col form-2-box wow fadeInUp">
                                                                <fieldset class="form-group border p-3">
                                                                    <legend>Shipment</legend>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>How would you like to pay?</legend>
                                                                        <p class="mt-3">Please enter your payment
                                                                            information below. The information you enter
                                                                            will be transmitted using a secure
                                                                            connection.</p>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="row form-group">
                                                                                            <div class="col-md-4">
                                                                                                <label for="name"
                                                                                                    class="form-label">Payment
                                                                                                    method for shipping
                                                                                                    charges <i
                                                                                                        class="fa fa-question-circle"></i></label>
                                                                                            </div>
                                                                                            <div class="col-md-8">
                                                                                                <div
                                                                                                    class="bind_input">
                                                                                                    <span
                                                                                                        class="spacing">:</span>
                                                                                                    <div
                                                                                                        class="row">
                                                                                                        <div
                                                                                                            class="col-md-8">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="payment_method"
                                                                                                                id="">
                                                                                                        </div>
                                                                                                        <div class="row text-end mb-3">
                                                                                                        @if($errors->has('payment_method'))
                                                                                                        <div class="error">{{ $errors->first('payment_method') }}</div>
                                                                                                        @endif
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-md-4">
                                                                                                            <!-- <a href=""
                                                                                                                style="text-decoration: none">Check
                                                                                                                My
                                                                                                                Discounts</a> -->
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row form-group">
                                                                                            <div class="col-md-4">
                                                                                                <label for="name"
                                                                                                    class="form-label">Promotion
                                                                                                    Code &nbsp;<i
                                                                                                        class="fa fa-question-circle"></i></label>
                                                                                            </div>
                                                                                            <div class="col-md-8">
                                                                                                <div
                                                                                                    class="bind_input">
                                                                                                    <span
                                                                                                        class="spacing">:</span>
                                                                                                    <div
                                                                                                        class="row">
                                                                                                        <div
                                                                                                            class="col-md-8">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="promotion_code1"  value="{{old('promotion_code1')}}"
                                                                                                                id="">
                                                                                                        </div>
                                                                                                         <div class="row text-end mb-3">
                                                                                                        @if($errors->has('promotion_code1'))
                                                                                                        <div class="error">{{ $errors->first('promotion_code1') }}</div>
                                                                                                        @endif
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-md-4">
                                                                                                            <!-- <a href=""
                                                                                                                style="text-decoration: none">Apply
                                                                                                                Code</a> -->
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row form-group">
                                                                                            <div class="col-md-4">
                                                                                                <label for="name"
                                                                                                    class="form-label">
                                                                                                    Bill Duties & Taxes To
                                                                                                    <i
                                                                                                        class="fa fa-question-circle"></i></label>
                                                                                            </div>
                                                                                            <div class="col-md-8">
                                                                                                <div
                                                                                                    class="bind_input">
                                                                                                    <span
                                                                                                        class="spacing">:</span>
                                                                                                    <input type="text" name="taxes" value="{{old('taxes')}}"
                                                                                                        class="form-control">
                                                                                                </div>
                                                                                                <div class="row text-end mb-3">
                                                                                                        @if($errors->has('taxes'))
                                                                                                        <div class="error">{{ $errors->first('taxes') }}</div>
                                                                                                        @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="row form-group">
                                                                                            <div class="col-md-4">
                                                                                                <label for="name"
                                                                                                    class="form-label">
                                                                                                    Receiver UPS Account
                                                                                                    Number</label>
                                                                                            </div>
                                                                                            <div class="col-md-8">
                                                                                                <div
                                                                                                    class="bind_input">
                                                                                                    <span
                                                                                                        class="spacing">:</span>
                                                                                                    <input type="text" name="ups_account_no" value="{{old('ups_account_no')}}"
                                                                                                        class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row form-group">
                                                                                            <div class="col-md-4">
                                                                                                <label for="name"
                                                                                                    class="form-label">
                                                                                                    Country or
                                                                                                    Territory</label>
                                                                                            </div>
                                                                                            <div class="col-md-8">
                                                                                                <div
                                                                                                    class="bind_input">
                                                                                                    <span
                                                                                                        class="spacing">:</span>
                                                                                                    <select name="territory"
                                                                                                        class="form-select"
                                                                                                        id="">
                                                                                                        <option value="">
                                                                                                            --Select--
                                                                                                        </option>
                                                                                                        <option value="india"
                                                                                                            selected>India
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="row form-group">
                                                                                            <div class="col-md-4">
                                                                                                <label for="name"
                                                                                                    class="form-label">
                                                                                                    Postal Code</label>
                                                                                            </div>
                                                                                            <div class="col-md-8">
                                                                                                <div
                                                                                                    class="bind_input">
                                                                                                    <span
                                                                                                        class="spacing">:</span>
                                                                                                    <input type="text" name="postal_code2"  value="{{old('postal_code2')}}"
                                                                                                        class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <input type="checkbox" name="address_books_entry"
                                                                                                id=""> &nbsp; Associate this
                                                                                            UPS Account to the receiver's
                                                                                            address book entry.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                        <legend>Would you like to schedule a collection?
                                                                        </legend>
                                                                        <div class="mt-4">
                                                                            <input type="checkbox" name="schedule_collection" id="">
                                                                            &nbsp;Schedule a <a href="" type="button"
                                                                                style="text-decoration: none">UPS On-Call
                                                                                Collection</a>. <i
                                                                                class="fa fa-question-circle"></i>
                                                                        </div>
                                                                    </fieldset>
                                                                    <div class="mt-4">
                                                                        <input type="checkbox" name="tearm_and_condition" id=""
                                                                            class="shipCheck mb-3"> &nbsp;Review Shipping
                                                                        details, including price, before completing this
                                                                        shipment.
                                                                        <p class="shipCheck">By selecting the Next
                                                                            button, I agree to the <a href=""
                                                                                style="text-decoration: none">Terms and
                                                                                Conditions</a>.</p>
                                                                    </div>
                                                                </fieldset>
                                                                <fieldset class="form-group border p-3 mt-5">
                                                                    <legend>Select Export Forms</legend>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-6">
                                                                            <input type="checkbox" name="paperless_shipment" id=""> &nbsp; <a
                                                                                href=""
                                                                                style="text-decoration: none">Process as a
                                                                                paperless shipment</a>&nbsp;<i
                                                                                class="fa fa-question-circle"></i>
                                                                            <div>
                                                                                <input type="radio" name="export_form" id=""> &nbsp;
                                                                                Complete selected export forms online
                                                                                <div class="check1 mt-2">
                                                                                    <input type="checkbox" name="comercial_invoice[]" value="Commercial Invoice"
                                                                                        checked> &nbsp; Commercial Invoice
                                                                                    <a href=""
                                                                                        style="text-decoration: none">View
                                                                                        Sample</a><br>
                                                                                    <input type="checkbox" name="comercial_invoice[]" value="Packing List">
                                                                                    &nbsp; Packing List
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="radio" name="form_history"
                                                                                class="mt-3" id=""> &nbsp; Reuse
                                                                            forms from your forms history <br>
                                                                            <input type="radio" name="export_document" id=""> &nbsp; Ship
                                                                            now with no Export Documents or with documents
                                                                            you supply <br>
                                                                            <input type="checkbox" name="completing_shipment" id=""> &nbsp;
                                                                            Preview Shipment before Completing Shipment
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <div class="text-end">
                                                                            <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                                            href="#nav-shipmentconfirmation" role="tab"
                                                                            aria-controls="nav-fromto" aria-selected="false">Next
                                                                            <span><i class="fa fa-arrow-right"></i></span></a>
                                                                </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Shipment Confirmation --->
                                                <div class="tab-pane tab-pane-background fade"
                                                    id="nav-shipmentconfirmation" role="tabpanel"
                                                    aria-labelledby="nav-shipmentconfirmation-tab">
                                                    <div class="row">
                                                        <div class="col form-2-box wow fadeInUp">
                                                                <fieldset class="form-group border p-3">
                                                                    <legend>Confirmation</legend>
                                                                    <div class="alert alert-success mt-3" role="alert">
                                                                        Thank you. Your shipment has been processed.
                                                                    </div>
                                                                    <p class="mt-3">We have received your
                                                                        shipping details and processed your payment. If you
                                                                        need to print shipping labels, print
                                                                        a receipt, or print a return label, follow the steps
                                                                        below.</p>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label font-weight-bold">
                                                                                        Tracking Number</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <span>1Z9970FV0418497063</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label font-weight-bold">
                                                                                        Service</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <span>UPS Express Saver</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label font-weight-bold">
                                                                                        Guaranteed By</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <span>End of Day Tuesday, 1 Mar,
                                                                                            2022</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label font-weight-bold">
                                                                                        Bill Shipping Charges to</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <span>Shipper's Account
                                                                                            9970FV</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label font-weight-bold">
                                                                                        Bill Duties and Taxes to</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <span>Receiver</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label font-weight-bold">
                                                                                        Shipping Charges</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <span>19,382.03 INR</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label font-weight-bold">
                                                                                        Total Charged</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <span
                                                                                            class="font-weight-bold">19,382.03
                                                                                            INR</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <p>Rate excludes VAT. Rate includes a fuel surcharge,
                                                                        but excludes taxes, duties and other charges that
                                                                        may
                                                                        apply to the shipment.</p>
                                                                </fieldset>
                                                                <fieldset class="form-group border p-3 mt-5">
                                                                    <legend>Print Shipping Documents</legend>
                                                                    <p class="mt-3">Select the items to print
                                                                        below. To print selected items select Print.</p>
                                                                    <button
                                                                        class="btn btn-primary rounded-0 float-right"><i
                                                                            class="fa fa-print"
                                                                            title="Print"></i></button>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Select Items</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="checkbox" name="" id=""
                                                                                            checked> &nbsp; Item1 &nbsp;
                                                                                        <input type="checkbox" name="" id=""
                                                                                            checked> &nbsp; Item2
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="check2">
                                                                                <input type="checkbox" name="" id=""> &nbsp;
                                                                                Item3 &nbsp;
                                                                                <input type="checkbox" name="" id=""> &nbsp;
                                                                                Item4
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Print labels using my UPS thermal
                                                                                        Printer?</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <select name=""
                                                                                            class="form-select" id="">
                                                                                            <option value="">--Select--
                                                                                            </option>
                                                                                            <option value="">Yes</option>
                                                                                            <option value="" selected>No
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Print label instructions on?</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="text" name="" id=""
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Receipt</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <input type="checkbox" name=""
                                                                                            id=""> &nbsp; Receipt
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col-md-4">
                                                                                    <label for="name"
                                                                                        class="form-label">
                                                                                        Print receipt using my UPS Thermal
                                                                                        Printer?</label>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="bind_input">
                                                                                        <span
                                                                                            class="spacing">:</span>
                                                                                        <select name=""
                                                                                            class="form-select" id="">
                                                                                            <option value="">--Select--
                                                                                            </option>
                                                                                            <option value="">Yes</option>
                                                                                            <option value="" selected>No
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <p>(International shipments, or shipments requiring a
                                                                        signature or special instructions, will always print
                                                                        label
                                                                        instructions regardless of this setting.)</p>
                                                                </fieldset>
                                                                <fieldset class="form-group border p-3 mt-5">
                                                                    <legend>Void This Shipment or Past Shipments</legend>
                                                                    <p class="mt-3">To void this shipment, select
                                                                        the Void This Shipment button. You can review and
                                                                        void past shipments in your
                                                                        <a href="" style="text-decoration: none">shipping
                                                                            history
                                                                            (https://www.ups.com/ship/history?loc=en_IN)</a>.
                                                                    </p>
                                                                </fieldset>
                                                                <div class="text-end">
                                                                            <a class="btn btn-secondary rounded-0" data-toggle="tab"
                                                                            href="#nav-returnShipment" role="tab"
                                                                            aria-controls="nav-fromto" aria-selected="false">Next
                                                                            <span><i class="fa fa-arrow-right"></i></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <!-- Return Shipment --->
                                                <div class="tab-pane tab-pane-background fade" id="nav-returnShipment"
                                                    role="tabpanel" aria-labelledby="nav-returnShipment-tab">
                                                    <div class="row">
                                                        <div class="col form-2-box wow fadeInUp">
                                                                  <fieldset class="form-group border p-3">
                                                                    <legend>Create a Return Shipment</legend>
                                                                    <p class="mt-3">The recipient of your
                                                                        shipment can easily return your letter or package
                                                                        when you create a return shipping label.
                                                                        To create a return shipment and print a return
                                                                        shipping label to include with your shipment select
                                                                        Create a
                                                                        Return Shipment.</p>
                                                                </fieldset>
                                                                <fieldset class="form-group border p-3 mt-5">
                                                                    <legend>Collection and Drop-off</legend>
                                                                    <p class="mt-3"><a href=""
                                                                            style="text-decoration: none">Schedule a
                                                                            Collection
                                                                            (https://wwwapps.ups.com/pickup/schedule?loc=en_IN)</a>
                                                                        - You can schedule a
                                                                        collection for today or schedule a UPS driver to
                                                                        collect all of your shipments on a regular schedule.
                                                                    </p>
                                                                    <p>Hand your packages to any UPS driver in your area.
                                                                    </p>

                                                                    <p><a href="" style="text-decoration: none">Find UPS
                                                                            Drop-off Locations (http://www.ups.com/dropoff?
                                                                            autosubmit=1&loc=en_IN&Address=76+VASUNDHRA+COLONY&PoliticalDiv1=&PoliticalDiv2=JAIPUR&Postal=302012&country=IN&appid=uisdol)</a>
                                                                        - Leave your packages at any convenient location
                                                                        near you.</p>
                                                                </fieldset>
                                                                <fieldset class="form-group border p-3 mt-5">
                                                                    <legend>Next Steps</legend>
                                                                    <p class="mt-3">You can create another
                                                                        shipment, or view your shipping history to review
                                                                        and track previously shipped
                                                                        packages.</p>
                                                                    <div class="shipCheck">
                                                                        <h6>Create Another Shipment</h6>
                                                                        <p class="mt-3"><a href=""
                                                                                style="text-decoration: none">View Your
                                                                                Shipping History
                                                                                (https://www.ups.com/ship/history?loc=en_IN)</a>.
                                                                        </p>
                                                                        <p>UPS provides online documents for international
                                                                            shipments.</p>
                                                                        <p><a href="" style="text-decoration: none">Export
                                                                                Documents
                                                                                (http://www.ups.com/content/in/en/resources/ship/packaging/docs/export.html)</a>.
                                                                        </p>
                                                                    </div>
                                                                </fieldset>
                                                                <p><strong>Note:</strong> Your invoice may vary from the
                                                                    displayed reference rates.</p>
                                                                <div class="text-end">
                                                                    <button class="btn btn-success rounded-0" onclick="return validate()">Save <i
                                                                            class="fa fa-save"></i></button>
                                                                </div>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
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
        </div>
    </div>
@endsection
@push('js')
<script type="text/javascript">

    function validate(){
        var address_book = document.getElementById("address_book");
        if (address_book.value == "") {
            //If the "Please Select" option is selected display error.
            alert("Please select an option!");
            return false;
        }
          var company = $("input[name='company_name']").val();
        if(company.length < 1){
            alert('The company_name field is required');
            $("input[name='company_name']").focus();
            return false;
        }
        var email = $("input[name='email']").val();
        if(email<1)
        {
            alert('email is required');
            $("input[name='email']").focus();
            return false;
        }
        var city = $("input[name='city']").val();
            if(city<1){
                alert('city is required');
                $("input[name='city']").focus();
                return false;
            }    
        var address1 = $("input[name='address1']").val();
        if(address1<1){
            alert('address1 is required');
            $("input[name='address1']").focus();
            return false;
        }
        // var telephone = $("input[name='telephone']").val();
        // if(telephone.length==10 || isNaN(telephone)){
        //     alert('telephone MUST BE NUMBER AND 10 DIGIT');
        //     $("input[name='telephone']").focus();
        //     return false;
        // }
        var email_id = $("input[name='email_id']").val();
        if(email_id<1){
            alert('email_id is required');
            $("input[name='email_id']").focus();
            return false;
        } 
        var contact_name = $("input[name='contact_name']").val();
        if(contact_name<1){
            alert('contact_name is required');
            $("input[name='contact_name']").focus();
            return false;
        }
        var telephone1 = $("input[name='telephone1']").val();
        if(telephone1==10 || isNaN(telephone1)){
            alert('telephone1 MUST BE NUMBER AND 10 DIGIT');
            $("input[name='telephone1']").focus();
            return false;
        }
        var taxes = $("input[name='taxes']").val();
        if(taxes<1){
            alert('taxes is required');
            $("input[name='taxes']").focus();
            return false;
        }
    }
    </script> 
@endpush
