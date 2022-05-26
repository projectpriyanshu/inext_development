@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="fedexlabelimport" role="tabpanel"
                        aria-labelledby="fedexlabelimport-tab">
                    </div> -->
                    <!-- <h5 class="card-title text-center">Fedex Label (Import)</h5> -->
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">Fedex Label (Import)</legend>
                            <form>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="fedexlabelinput fedeximport">
                                                                <input type="radio" checked> &nbsp; Manual &nbsp;&nbsp;
                                                                <input type="radio"> &nbsp; Auto
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">ISO</label>
                                                                </div>
                                                                <div class="col-md-9">
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
                                                                <div class="col-md-3">
                                                                    <label for="name">Awb No.</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Ship Date</label>
                                                                </div>
                                                                <div class="col-md-9">
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
                                                            <div class="row form-row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Destination</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row form-row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Bill To</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <!-- <label for="name"></label> -->
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing"></span>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <input type="checkbox"> &nbsp; Same as
                                                                            Customer
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <a href=""><u>View KYC Document</u></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Sender</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Contact Person</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Address</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <!-- <label for="name">Address</label> -->
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing"></span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Pincode</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">City</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">State</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Telephone</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">GST ID</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="form-select">
                                                                        <option>GSTIN (Normal)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">GSTIN</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"> 
                                                                    <button type="submit" class="btn btn-common rounded-0"><i class="fa fa-search"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <fieldset class="form-group border p-3 mt-5">
                                                            <legend>Recipient Information</legend>
                                                            <div class="row form-row form-group mt-3">
                                                                <div class="col-md-3">
                                                                    <label for="name">Recipient</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Contact Person</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Address</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <!-- <label for="name">Address</label> -->
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing"></span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Pincode</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">City</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">State</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Telephone</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">VAT/Customs ID</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"> 
                                                                        <button type="submit" class="btn btn-common rounded-0"><i class="fa fa-search"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <br><br><br>
                                                        <!-- <br><br><br><br><br><br><br><br><br><br><br> -->
                                                        <h1 class="fedexheading">FedEx</h1>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Service</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="form-select">
                                                                        <option>International Priority</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button class="btn btn-primary">Special Handling</button>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Package Type</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="form-select">
                                                                        <option>Your Packaging</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Identical</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="radio" checked> &nbsp; Yes &nbsp;&nbsp;
                                                                    <input type="radio"> &nbsp; No
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Packages</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Act Wt</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button class="btn btn-dark">Multiple Shipment</button>
                                                        </div>
                                                        <fieldset class="form-group border p-3 mt-5">
                                                            <legend>Dimension (L X W X H)</legend>
                                                            <div class="row form-group mt-2">
                                                                <div class="col-md-3">
                                                                    <label for="name">Length</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Width</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Height</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Volume Wt</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Total Weight</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name">Carriage Val</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <fieldset class="form-group border p-3 mt-5">
                                                            <legend>Department Notes</legend>
                                                            <div class="row form-group mt-2">
                                                                <div class="col-md-3">
                                                                    <label for="name">CSB_Type</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>CSB 4</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">GST_Invoice</label>
                                                                </div>
                                                                <div class="col-md-9">
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
                                                                <div class="col-md-3">
                                                                    <label for="name">Terms of Sale</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>CFR</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Bond/UT</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>NA</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">EComm (Y/N)</label>
                                                                </div>
                                                                <div class="col-md-9">
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
                                                                <div class="col-md-3">
                                                                    <label for="name">MEIS (Y/N)</label>
                                                                </div>
                                                                <div class="col-md-9">
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
                                                                <div class="col-md-3">
                                                                    <label for="name">GST Amount</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Invoice Date</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="date" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Invoice No</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group border p-3 mt-5">
                                                            <legend>Shipment Contents</legend>
                                                            <div class="row form-group mt-2">
                                                                <div class="col-md-3">
                                                                    <label for="name">Shipment Contents</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>NDox</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button class="btn btn-info">Commercial Invoice
                                                                    Details</button>
                                                            </div><br>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Content</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Customs Value</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"> &nbsp;
                                                                        <select class="form-select">
                                                                            <option>USD</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Ship Purpose</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>PERSONAL_EFFECT</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group border p-3 mt-5">
                                                            <legend>Billing Details</legend>
                                                            <div class="row form-group mt-2">
                                                                <div class="col-md-3">
                                                                    <label for="name">Bill Shipment To</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>Sender</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Account #</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Duties/Taxes To</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>Recipient</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Account #</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Booking Confirmation
                                                                        Number</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name">Label Stock Type</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option>PAPER_4X6</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="fedexlabelinputcode fedeximportradio">
                                                                <input type="radio" checked> &nbsp; PNG &nbsp;
                                                                <input type="radio"> &nbsp; PDF
                                                            </div>
                                                        </fieldset>
                                                        <div class="text-center">
                                                            <input type="checkbox"> &nbsp; IE AirwayBill
                                                        </div>
                                                        <div class="btn_group text-center button_media mt-2">
                                                            <button class="btn btn-primary rounded-0">New <i class="fa fa-folder-plus"></i></button>
                                                            <button class="btn btn-secondary rounded-0">Label <i class="fa fa-check-circle"></i></button>
                                                            <button class="btn btn-success rounded-0">Print <i class="fa fa-print"></i></button> 
                                                            <button class="btn btn-warning rounded-0">Void <i class="fa fa-circle"></i></button>
                                                            <button class="btn btn-danger mt-2 rounded-0">Close <i class="fa fa-close"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <textarea rows="112" class="fedextextarea"></textarea>
                                                <span class="fedexline1">Total Awbno: 0</span>
                                            </div>
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