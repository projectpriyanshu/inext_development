@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="pickupregister" role="tabpanel" aria-labelledby="pickupregister-tab">
                    </div> -->
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">Pickup Register</legend>
                            <form class="">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-5">

                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="awb-check">
                                                            <div class="awb">
                                                                <input type="radio" checked> &nbsp; All  &nbsp;
                                                            </div>
                                                            <div class="awb">
                                                                <input type="radio"> &nbsp; Pending &nbsp;

                                                            </div>
                                                            <div class="awb">
                                                                <input type="radio"> &nbsp; Cancel 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="awb-check">
                                                            <div class="awb">
                                                                <input type="radio" checked> &nbsp; Confirm  &nbsp;
                                                            </div>
                                                            <div class="awb">
                                                                <input type="radio"> &nbsp; Transfer &nbsp;

                                                            </div>
                                                            <div class="awb">
                                                                <input type="radio"> &nbsp; Re-Schedule 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                
                                                <div class="row form-group">
                                                    <div class="col-md-5">
                                                        <label for="name" class="form-label ">Customer Name</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <select class="form-select">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-5">
                                                        <label for="name" class="form-label ">From Date</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-5">
                                                        <label for="name" class="form-label ">To Date</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn_group b4 button_media">
                                                    <button class="btn btn-success rounded-0">Show <i class="fa fa-eye"></i></button>
                                                    <button class="btn btn-primary rounded-0">CSV <i class="fa fa-file"></i></button>
                                                    <button class="btn btn-danger rounded-0">Close <i class="fa fa-close"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pickuplist mt-4">
                                                <h5 class="font-weight-bold">Pickup List</h5>
                                                <textarea class="pickuptext" rows="20"></textarea>
                                            </div>
                                            <div class="col-md-12 pickupsummary">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h5 class="font-weight-bold">Pickup Summary:</h5>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="row form-group">
                                                                    <div class="col-md-5">
                                                                        <label for="name" class="form-label ">Total Count</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <div class="bind_input">
                                                                            <!-- <span class="spacing">:</span> -->
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="row form-group">
                                                                    <div class="col-md-5">
                                                                        <label for="name" class="form-label ">Total Confirm</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <div class="bind_input">
                                                                            <!-- <span class="spacing">:</span> -->
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>        
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="row form-group">
                                                                    <div class="col-md-5">
                                                                        <label for="name" class="form-label ">Total Pending</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <div class="bind_input">
                                                                            <!-- <span class="spacing">:</span> -->
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="row form-group">
                                                                    <div class="col-md-5">
                                                                        <label for="name" class="form-label ">Total Cancel</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <div class="bind_input">
                                                                            <!-- <span class="spacing">:</span> -->
                                                                            <input type="text" class="form-control">
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
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

 @push('js')

@endpush