@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="hubscan" role="tabpanel" aria-labelledby="hubscan-tab">
                        <h5 class="card-title">HUB Scan</h5>
                    </div> -->
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend>Hub Inscan (Client)</legend>
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <fieldset class="form-group border p-3 mt-3">
                                                            <legend>Consignor Details</legend><br>
                                                            <textarea rows="4" class="hubfield text"></textarea>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 c1">
                                                        <fieldset class="form-group border p-3 mt-3">
                                                            <legend>Consignee Details</legend><br>
                                                            <textarea rows="4" class="hubfield text"></textarea>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row hub1">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3 mt-4">
                                                            <legend>Shipment Origin/Destination</legend><br>
                                                            <div class="row d-flex">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Date</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="date" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Origin</label>
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
                                                            <div class="row d-flex">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Sector
                                                                                </label>
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
                                                                            <label for="name" class="form-label ">Destination
                                                                                </label>
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
                                                    </div>
                                                </div>
                                                <div class="row hub1">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3 mt-4">
                                                            <legend>Customer Details</legend><br>
                                                            <div class="row form-group">
                                                                <div class="col-md-2">
                                                                    <label for="name" class="form-label ">Customer</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control">

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-2">
                                                                    <label for="name" class="form-label ">Network</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row w-100">
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
                                                            <div class="row d-flex">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Goods Type
                                                                                </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select">
                                                                                    <option>Dox</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Pcs
                                                                                </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control" placeholder="1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row d-flex">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Vol Wt.
                                                                                </label>
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
                                                                            <label for="name" class="form-label ">Vol Discount
                                                                                </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control"> &nbsp;%
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row d-flex">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Chg Wt.
                                                                                </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control"> &nbsp;Kg
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Payment
                                                                                </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select">
                                                                                    <option>Credit</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-2">
                                                                    <label for="name" class="form-label ">Service</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row hub1">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3 mt-4">
                                                            <legend>Scan Airwaybill No</legend><br>
                                                            <div class="row d-flex">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Status Date
                                                                                </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="date" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Time
                                                                                </label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="time" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-2">
                                                                    <label for="name" class="form-label ">Location</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row w-100">
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control" placeholder="JAI">

                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" placeholder="JAIPUR">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-2">
                                                                    <label for="name" class="form-label ">Manifest No.</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <select class="form-select">
                                                                            <option></option>
                                                                        </select> &nbsp;&nbsp;
                                                                        <a href="" class="font-weight-bold"><u>Refresh</u></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-2">
                                                                    <label for="name" class="form-label ">Awb No.</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row d-flex">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Actual Wt.
                                                                                </label>
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
                                                                        <div class="btn_group b4 button_media">
                                                                            <button class="btn btn-primary rounded-0">Scan <i class="fa fa-qrcode"></i></button>
                                                                            <button class="btn btn-danger rounded-0">Close <i class="fa fa-close"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <textarea rows="20" class="t1 text"></textarea>
                                                <textarea rows="28" class="t1 text"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

 @push('js')

@endpush