@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="exportmanifest" role="tabpanel" aria-labelledby="exportmanifest-tab">
                        <!-- <h5 class="card-title text-center">EXPORT MANIFEST</h5> -->
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend>Run Details</legend>
                                <form>
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
                                                                <select class="form-select">
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Run no.</label>
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
                                                            <label for="name" class="form-label ">Sector</label>
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
                                                            <label for="name" class="form-label ">Counter part</label>
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
                                                            <label for="name" class="form-label ">A/L Mawb</label>
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
                                                            <label for="name" class="form-label ">Flight</label>
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
                                                            <label for="name" class="form-label ">Date</label>
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
                                                            <label for="name" class="form-label ">OBC</label>
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
                                                            <label for="name" class="form-label ">Dox/NDox</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <select class="form-select">
                                                                    <option>Both</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label "></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing"></span>
                                                                <input type="radio" checked> &nbsp; Both &nbsp;&nbsp;
                                                                <input type="radio"> &nbsp; HVG &nbsp;&nbsp;
                                                                <input type="radio"> &nbsp; LVG
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label "></label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing"></span>
                                                                <input type="checkbox"> &nbsp; Skip Bag No
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                            <div class="text-center">
                                <input type="radio" checked> &nbsp; With AwbNo &nbsp;&nbsp;
                                <input type="radio"> &nbsp; With Network No &nbsp;&nbsp;
                                <input type="radio"> &nbsp; With Forwarding No
                            </div>
                            <div class="card-footer mt-2">
                                <div class="btn_group text-center">
                                    <button class="btn btn-primary rounded-0 mr-2">Excel (.xls) <i class="fa fa-folder"></i></button> 
                                    <button class="btn btn-warning rounded-0 mr-2">Word (.doc) <i class="fa fa-file"></i></button> 
                                    <button class="btn btn-success rounded-0 mr-2">Show <i class="fa fa-eye"></i></button> 
                                    <button class="btn btn-info rounded-0 mr-2">Text <i class="fa fa-pencil-alt"></i></button> 
                                    <button class="btn btn-danger rounded-0">Close <i class="fa fa-times"></i></button>
                                </div>
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