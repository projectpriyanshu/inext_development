@extends('layouts.main')
@section('content')

<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="awbprint" role="tabpanel" aria-labelledby="awbprint-tab">
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">AIRWAY BILL NO PRINT</legend>
                                <form class="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Company</label>
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
                                                            <label for="name" class="form-label ">Awb No.</label>
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
                                                            <label for="name" class="form-label ">Bag No.</label>
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
                                                            <label for="name" class="form-label ">Page Size</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <div class="row">
                                                                    <div class="col-md-4 awbinput">
                                                                        <select class="form-select">
                                                                            <option>A4</option>
                                                                            <option>A5</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="checkbox"> &nbsp; With Transport Charges
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Printer</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <select name="printer"
                                                                    style="width:100%;margin-bottom: 5px;"
                                                                    class="form-select">
                                                                    <option></option>
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing"></span>
                                                                <input type="checkbox" checked> &nbsp; A4/2
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="btn_group b4">
                                                        <button class="btn btn-success rounded-0">Print <i class="fa fa-print"></i></button>
                                                        <button class="btn btn-danger rounded-0">Close <i class="fa fa-close"></i></button>
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

@endsection

 @push('js')

@endpush