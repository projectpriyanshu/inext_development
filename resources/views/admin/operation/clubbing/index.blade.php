@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="clubbing" role="tabpanel" aria-labelledby="clubbing-tab">
                        <!-- <h5 class="card-title text-center">CLUBBING</h5> -->
                        <div class="detail_edit">
                            <div class="row">
                                <div class="col-md-5">
                                    <fieldset class="form-group border p-3">
                                        <legend>Club Details</legend>
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row name form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label ">Club Date</label>
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
                                                                    <label for="name" class="form-label ">Club No.</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row name form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label ">AirwayBill No.</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row name form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label ">Mawb No.</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row name form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label">Weight</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row name form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label">Total Weight</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="btn_group b4">
                                                        <button class="btn btn-primary rounded-0 mr-2">New Club <i class="fa fa-folder-plus"></i></button> 
                                                        <button class="btn btn-success rounded-0 mr-2">Add AwbNo <i class="fa fa-plus"></i></button>
                                                        <button class="btn btn-info rounded-0 mr-2 mt-1">Remove AwbNo <i class="fa fa-minus"></i></button> 
                                                        <button class="btn btn-danger rounded-0 mt-1">Remove ClubNo <i class="fa fa-minus"></i></button> 
                                                        <button class="btn btn-warning rounded-0 mt-1">Close <i class="fa fa-times"></i></button> 
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </fieldset>
                                    <fieldset class="form-group border p-3 mt-5">
                                        <legend>Search AirwayBill No</legend><br>
                                        <div class="row name form-group">
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Search here...">
                                                <br><button class="btn btn-dark">Search <i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-7">
                                    <textarea rows="10" class="clubbingtext mt-3 cl"></textarea>
                                    <div>
                                        <br><h5 class="card-title cl">Club Details</h5>
                                        <textarea rows="18" class="clubbingtext cl"></textarea>
                                    </div>
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