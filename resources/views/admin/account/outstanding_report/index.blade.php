@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="outstandingreport" role="tabpanel"
                        aria-labelledby="outstandingledger-tab">
                        <!-- <h5 class="card-title text-center">OUTSTANDING REPORT</h5><br> -->
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Total Outstanding</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="b4">
                                                                <input type="radio" checked> &nbsp; All &nbsp;
                                                                <input type="radio"> &nbsp; Date Range
                                                            </div>
                                                            <div class="row form-group mt-2">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label ">From</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="date" class="form-control"> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row name form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label ">To</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="date" class="form-control"> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="btn_group text-center">
                                                                <button class="btn btn-success">Show <i class="fa fa-eye"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row name form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label ">Search</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="btn_group text-center">
                                                                <button class="btn btn-info">CSV <i class="fa fa-file"></i></button> &nbsp;
                                                                <button class="btn btn-danger">Close <i class="fa fa-times"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                        <textarea rows="15" class="outstandingreporttext"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row form-group">
                                            <div class="col-md-4">  
                                                <label for="name" class="form-label ">Total</label>
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
                </div>
            </div>
        </div>
    </div>

@endsection

 @push('js')

@endpush