@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="company" role="tabpanel" aria-labelledby="company-tab">
                    </div> -->
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">Login Audit</legend>
                            <form class="">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-6 col-sm-12">
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label">Enter Username</label>
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
                                                        <label for="name" class="form-label">To Date</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-6 col-sm-12">
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label">Login Date</label>
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
                                    </div>
                                    <div class="card-footer text-right">
                                        <div class="btn_group button_media">
                                            <button class="btn btn-success rounded-0">Show
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button class="btn btn-primary rounded-0">Excel
                                                <i class="fa fa-file"></i>
                                            </button>
                                            <button class="btn btn-danger rounded-0">Close
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                        <fieldset class="form-group border p-3 mt-5">
                            <legend>Action</legend>
                            <textarea rows="20" class="loginaudittext mt-3"></textarea>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush