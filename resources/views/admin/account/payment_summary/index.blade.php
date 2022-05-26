@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="paymentsummary" role="tabpanel" aria-labelledby="paymentsummary-tab">
                        <!-- <h5 class="card-title text-center">PAYMENT SUMMARY</h5><br> -->
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Payment Collection Report</legend>
                                <form>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row name form-group">
                                                        <div class="col-md-5">
                                                            <label for="name" class="form-label ">Mode</label>
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
                                                    <div class="row name form-group">
                                                        <div class="col-md-5">
                                                            <label for="name" class="form-label ">Receipt Type</label>
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
                                                    <div class="row name form-group">
                                                        <div class="col-md-5">
                                                            <label for="name" class="form-label ">Branch</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row name form-group">
                                                        <div class="col-md-5">
                                                            <label for="name" class="form-label ">Code</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> &nbsp;&nbsp;
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row name form-group">
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
                                                    <div class="row name form-group">
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
                                                    <div class="btn_group text-center">
                                                        <button class="btn btn-success">Show <i class="fa fa-eye"></i></button> 
                                                        <button class="btn btn-info">CSV <i class="fa fa-file"></i></button> 
                                                        <button class="btn btn-primary">Print <i class="fa fa-print"></i></button> 
                                                        <button class="btn btn-danger">Close <i class="fa fa-times"></i></button>
                                                    </div><br>
                                                </div>
                                                <div>
                                                    <textarea rows="15" class="t1"></textarea>
                                                </div>
                                                <div class="d-flex mt-2">
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Rcpt Amount</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> 
                                                            </div>
                                                        </div>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Debit Amt</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"> 
                                                            </div>
                                                        </div>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Credit Amt</label>
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