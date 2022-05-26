@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="flightupdate" role="tabpanel" aria-labelledby="flightupdate-tab">
                    </div> -->
                    <!-- <h5 class="card-title text-center">HISTORY UPLOAD</h5> -->
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3 mt-4">
                                <legend class="w-auto px-2 text-dark">Search</legend>
                                <form class="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12 col-sm-12">
                                                    <div class="flightupdateinput flightupdateinput2">
                                                        <input type="radio" checked> &nbsp; Awb Wise &nbsp;&nbsp;
                                                        <input type="radio"> &nbsp; AL-MawbNo Wise &nbsp;&nbsp;
                                                        <input type="radio"> &nbsp; Excel
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6 col-sm-12s">
                                                    <div class="row form-group mt-3">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Enter Awb No.</label>
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
                                                            <label for="name" class="form-label ">Excel Path</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">&nbsp;&nbsp;
                                                                <button class="btn btn-primary rounded-0">Browse</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>

                            <fieldset class="form-group border p-3 mt-5">
                                <legend class="w-auto px-2 text-dark">Shipment Event Activity</legend>
                                <form class="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-6 col-sm-6">
                                                    <div class="row form-row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Status</label>
                                                        </div>
                                                        <div class="col-md-8">
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
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Status Date</label>
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
                                                            <label for="name" class="form-label ">Time</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="time" class="form-control"> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <span style="color: red;">(Use 24hr Format)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Location</label>
                                                        </div>
                                                        <div class="col-md-8">
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <div class="btn_group b4">
                                                <button class="btn btn-success save-btn ">Save
                                                    <i class="fa fa-save"></i>
                                                </button>
                                                <button class="btn btn-primary refresh-btn rounded-0 ">Refresh
                                                    <i class="fa fa-refresh"></i>
                                                </button>
                                                <button class="btn btn-danger close-btn rounded-0">Close
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div><br>
                                            <div>
                                                <textarea rows="10" class="flightupdatetext"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
    
                        <!-- <div class="detail_edit">
                            
                        </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection

 @push('js')

@endpush