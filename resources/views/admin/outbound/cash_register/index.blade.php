@extends('layouts.main')
@section('content')

<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="cashregister" role="tabpanel" aria-labelledby="cashregister-tab">
                    </div> -->
                    <div class="detail_edit">
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset class="form-group border p-3">
                                    <legend>Cash Register</legend>
                                    <form>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Customer</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row form-row">
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Cash Enter By</label>
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
                                                            <button class="btn btn-primary rounded-0">Search <i class="fa fa-search"></i></button>
                                                            <button class="btn btn-success rounded-0">Print <i class="fa fa-print"></i></button>
                                                            <button class="btn btn-warning rounded-0">Excel <i class="fa fa-file"></i></button>
                                                            <button class="btn btn-danger rounded-0">Close <i class="fa fa-close"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <textarea class="cashregistertext text" rows="15"></textarea>
                                                        <div class="row mt-2">
                                                            <div class="col-md-4">
                                                                <div class="row form-group">
                                                                    <div class="col-md-5">
                                                                        <label for="name" class="form-label ">Total Cash Amount</label>
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
                                                                        <label for="name" class="form-label ">Total Amount</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row form-group">
                                                                    <div class="col-md-5">
                                                                        <label for="name" class="form-label ">Recover</label>
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
                                                                        <label for="name" class="form-label ">Refund</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row form-group">
                                                                    <div class="col-md-5">
                                                                        <label for="name" class="form-label ">Balance</label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <div class="bind_input">
                                                                            <span class="spacing">:</span>
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
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

 @push('js')

@endpush