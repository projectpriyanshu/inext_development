@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="dataentry" role="tabpanel"
                        aria-labelledby="dataentry-tab">
                    </div> -->
                    <!-- <h5 class="card-title text-center">Data Entry</h5> -->
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">Data Entry</legend>
                            <form>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <fieldset class="form-group border p-3 mt-3">
                                                    <legend>AwbNo Details</legend>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6 mt-1">
                                                            <div class="dataentry1">
                                                                <input type="radio" checked> &nbsp; Manual &nbsp;&nbsp;
                                                                <input type="radio"> &nbsp; Auto
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Awb No</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Company</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Date</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="date" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Origin</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Dest</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"> &nbsp;
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend>Sender Details</legend>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Ship From</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> &nbsp;
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Sender</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> &nbsp;
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Contact Person</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Address</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <!-- <label for="name">Contact Person</label> -->
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing"></span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <!-- <label for="name">Contact Person</label> -->
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing"></span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Pincode</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">City</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">State</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Telephone</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                        <button type="submit" class="btn btn-common rounded-0"><i class="fa fa-search"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend>Receiver Details</legend>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Bill To</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> &nbsp;
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Receiver</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> &nbsp;
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Contact Person</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Address</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <!-- <label for="name">Contact Person</label> -->
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing"></span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <!-- <label for="name">Contact Person</label> -->
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing"></span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Pincode</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">City</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">State</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Telephone</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">SCode</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">ID Type</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>GSTIN (Normal)</option>
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
                                                                    <label for="name">GST No</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">IEC</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"> 
                                                                        <button type="submit" class="btn btn-common rounded-0"><i class="fa fa-search"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend>Carrier Details</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Forwarder</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Forwader No</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Network</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"> &nbsp;
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Network No</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Service</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"> &nbsp;
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Goods</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>NDox</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend>Package Details</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Pcs</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Wt</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Vol Wt</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                        <button type="submit" class="btn btn-common rounded-0"><i class="fa fa-search"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Chg Wt</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Pay Mode</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>CREDIT</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Shipment Terms</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option></option>
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
                                                                    <label for="name">Reason of Export</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>Non-Commercial</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Incoterms</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>CIF</option>
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
                                                                    <label for="name">Insured Value</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"> &nbsp;
                                                                        <select class="form-select">
                                                                            <option>INR</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Inv No</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend>Customs Clearance Details</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group mt-1">
                                                                <div class="col-md-4">
                                                                    <label for="name">OPS Remark</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Content</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"> 
                                                                        <button type="submit" class="btn btn-common rounded-0"><i class="fa fa-search"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">DRS No</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="name">Manifest No</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Hold</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> &nbsp;
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-4">
                                                <fieldset class="form-group border p-3 mt-4">
                                                    <legend>Run Details</legend>
                                                    <div class="row form-group mt-2">
                                                        <div class="col-md-2">
                                                            <label for="name">ALMawb</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Flight</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> &nbsp;
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend>Miscellaneous Details</legend>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Misc. Chg.</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> &nbsp;
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Amount</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div><br>
                                                        </div>
                                                    </div>
                                                    <div class="btn_group text-center button_media"></div>
                                                        <button class="btn btn-primary rounded-0">Add <i
                                                                class="fa fa-plus"></i></button>&nbsp;
                                                        <button class="btn btn-warning rounded-0">Edit <i
                                                                class="fa fa-edit"></i></button>
                                                    </div><br>
                                                    <div class="dataentrytable">
                                                        <table class="table-bordered">
                                                            <tr>
                                                                <th class="dataentrytable3">Misc Chg.</th>
                                                                <th class="dataentrytable3">MiscName</th>
                                                                <th class="dataentrytable3">MiscTax</th>
                                                                <th class="dataentrytable3">MiscNTax</th>
                                                                <th class="dataentrytable3">Fuel</th>
                                                                <th class="dataentrytable3">-</th>
                                                                <th class="dataentrytable3">-</th>
                                                                <th class="dataentrytable3">-</th>
                                                            </tr>
                                                            <tr class="dataentrytable4">
                                                                <td class="dataentrytable3">1</td>
                                                                <td class="dataentrytable3">Data</td>
                                                                <td class="dataentrytable3">10%</td>
                                                                <td class="dataentrytable3">2</td>
                                                                <td class="dataentrytable3">7</td>
                                                                <td class="dataentrytable3">-</td>
                                                                <td class="dataentrytable3">-</td>
                                                                <td class="dataentrytable3">-</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend>Freight Details</legend>
                                                    <div class="row form-group mt-2">
                                                        <div class="col-md-2">
                                                            <label for="name">Amount</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> &nbsp;
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Manual</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Curr</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <select class="form-select">
                                                                    <option>INR</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Misc</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Misc Fuel</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Fuel</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> &nbsp;
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Sub Total</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name" class="form-label">SGST</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name" class="form-label">CGST</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> &nbsp;
                                                                <input type="checkbox" checked>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">KGST</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name" class="form-label">Misc NTax</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name" class="form-label">G. Total</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend>Duty Amount Details</legend>
                                                    <div class="row form-group mt-2">
                                                        <div class="col-md-2">
                                                            <label for="name">Duty Amt</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">D/Bill No</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend>COD Amount Details</legend>
                                                    <div class="row form-group mt-2">
                                                        <div class="col-md-2">
                                                            <label for="name">COD Amt</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">C/Bill No</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group border p-3 mt-5">
                                                    <legend>Bill Details</legend>
                                                    <div class="row form-group mt-2">
                                                        <div class="col-md-2">
                                                            <label for="name">Bill No</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">COD Collect</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <select class="form-select">
                                                                    <option>No</option>
                                                                    <option>Yes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label for="name">Billing Remark</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <div class="btn_group mt-4">
                                            <!-- <button class="btn btn-primary">New <i
                                                    class="fa fa-folder-plus"></i></button> -->
                                                <button class="btn btn-secondary save-btn mr-3"> Edit
                                                    <i class="fa fa-edit ms-2"></i>
                                                </button>
                                                <button class="btn btn-success save-btn">Save
                                                    <i class="fa fa-save ms-2"></i>
                                                </button>
                                            <!-- <button class="btn btn-dark">Remove <i
                                                    class="fa fa-minus"></i></button><br><br>
                                            <button class="btn btn-danger">Close <i
                                                    class="fa fa-close"></i></button> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
@endsection

 @push('js')

@endpush