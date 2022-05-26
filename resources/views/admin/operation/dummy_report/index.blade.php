@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="dummyreport" role="tabpanel" aria-labelledby="dummyreport-tab">
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Dummy Report</legend>
                                <form class="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col-md-5">
                                                            <label for="name" class="form-label ">Run no.</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-5">
                                                            <label for="name" class="form-label ">Mawb No.</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-5">
                                                            <label for="name" class="form-label ">Super Mawb No.</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-5">
                                                            <label for="name" class="form-label ">From</label>
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
                                                            <label for="name" class="form-label ">To</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="btn_group b4">
                                                <button class="btn btn-info show-btn rounded-0 mr-2">Show
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <button class="btn btn-danger close-btn rounded-0">Close
                                                    <i class="fa fa-times"></i>
                                                </button>
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
    </div>

@endsection

 @push('js')

@endpush