@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="flightupdate" role="tabpanel" aria-labelledby="flightupdate-tab">
                    </div> -->
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend>In Hub Scan</legend>
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3 mt-4">
                                                            <legend>Shipment Event Activity</legend>
                                                            <div class="row form-group mt-3">
                                                                <div class="col-md-2">
                                                                    <label for="name" class="form-label ">Status</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row w-100 form-row">
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
                                                            <div class="row form-group mt-3">
                                                                <div class="col-md-2">
                                                                    <label for="name" class="form-label ">Status Date</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="date" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group mt-3">
                                                                <div class="col-md-2">
                                                                    <label for="name" class="form-label ">Time</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="time" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row form-group">
                                                                <div class="col-md-2">
                                                                    <label for="name" class="form-label ">Location
                                                                        </label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row w-100 form-row">
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
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group border p-3 mt-5">
                                                            <legend>Scan/Manual Enter Awb No</legend><br>
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
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="btn_group text-center mt-2">
                                                    <button class="btn btn-success rounded-0">Save <i class="fa fa-save"></i></button>&nbsp;
                                                    <button class="btn btn-danger rounded-0">Close <i class="fa fa-close"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <fieldset class="form-group border p-3 mt-4">
                                                    <legend>Scan Awb No</legend><br>
                                                    <div class="form-group">
                                                        <textarea rows="15" class="text"></textarea>
                                                    </div>
                                                </fieldset>
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