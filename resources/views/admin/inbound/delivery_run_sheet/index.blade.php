@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="deliveryrunsheet" role="tabpanel"
                        aria-labelledby="deliveryrunsheet-tab">
                    </div> -->
                    <!-- <h5 class="card-title text-center">deliveryrunsheet</h5> -->
                    <div class="detail_edit">
                        <!-- <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">Delivery Run Sheet</legend>
                        </fieldset> -->
                        <form>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="border form-group p-3">
                                                <legend>Delivery Run Sheet</legend>
                                                <div class="row form-group mt-3">
                                                    <div class="col-md-4">
                                                        <label for="name">DRS No.</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="text" class="form-control">
                                                            <div class="d-flex">
                                                                <button class="btn btn-primary rounded-0">New</button>
                                                            </div>
                                                            <!-- <div class="row">
                                                                <div class="col-md-7">
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <button class="btn btn-primary">New <i class="fa fa-folder-plus"></i></button>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
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
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name">Time</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="time" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name">Location</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <div class="row form-row">
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
                                                    <div class="col-md-4">
                                                        <label for="name">Route No.</label>
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
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name">G.C Name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name">Awb No.</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-group add-btn add-button">
                                                    <button class="btn btn-info rounded-0">Add <i class="fa fa-plus"></i></button>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="border form-group p-3 deliveryfield">
                                                <legend>Delivery Address</legend>
                                                <div class="mt-3">
                                                    <h5>Origin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</h5>
                                                    <h5>Destination &nbsp; |</h5>
                                                    <h5>Consignee &nbsp;&nbsp; |</h5>
                                                    <h5>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</h5>
                                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</h5>
                                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</h5>
                                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</h5>
                                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</h5>
                                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</h5>
                                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</h5>
                                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</h5>
                                                    
                                                    <h5 class="text-right">COD | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row form-group">
                                                <label for="name" class="drslabel">Awb No.</label>
                                            </div>
                                            <textarea rows="10" class="t1"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label for="name">Search DRS No.</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control"> &nbsp;
                                                        <button class="btn btn-dark rounded-0">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn_group text-center">
                                                <button class="btn btn-success rounded-0">Print <i class="fa fa-print"></i></button>
                                                <button class="btn btn-danger rounded-0">Close <i class="fa fa-close"></i></button>
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

@endpush