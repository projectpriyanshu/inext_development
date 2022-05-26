@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="bagging" role="tabpanel" aria-labelledby="bagging-tab"> -->
                        <!-- <h5 class="card-title text-center">BAGGING</h5> -->
                        <div class="detail_edit">
                            <!-- <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Bagging</legend>
                            </fieldset> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset class="form-group border p-3">
                                        <legend>Run Details</legend>
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12 box_shadow baggingrun">
                                                            <div class="row">
                                                                <div class="col-md-6">
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
                                                                            <label for="name" class="form-label ">Date</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="date" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Counter Part</label>
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
                                                                            <label for="name" class="form-label ">Mawb</label>
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
                                                      
                                                        <div class="col-md-5">
                                                            <fieldset class="form-group border p-3 mt-3">
                                                                <legend>Bag Details</legend>
                                                                <form>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="row name form-group">
                                                                                        <div class="col-md-3">
                                                                                            <label for="name" class="form-label ">Bag No.</label>
                                                                                        </div>
                                                                                        <div class="col-md-9">
                                                                                            <div class="bind_input">
                                                                                                <span class="spacing">:</span>
                                                                                                <input type="text" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="text-center">
                                                                                        <button class="btn btn-primary rounded-0">New Bag <i class="fa fa-folder-plus"></i></button>
                                                                                    </div>
                                                                                    <div class="row name form-group mt-2">
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
                                                                                            <label for="name" class="form-label ">Pcs</label>
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
                                                                                            <label for="name" class="form-label ">Weight</label>
                                                                                        </div>
                                                                                        <div class="col-md-9">
                                                                                            <div class="bind_input">
                                                                                                <span class="spacing">:</span>
                                                                                                <input type="text" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="text-center">
                                                                                        <button class="btn btn-success rounded-0">Add <i class="fa fa-plus-circle"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </fieldset>

                                                            <fieldset class="form-group border p-3 mt-5">
                                                                <legend>Run Summary</legend>
                                                                <form>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="row name form-group">
                                                                                        <div class="col-md-4">
                                                                                            <label for="name" class="form-label ">Bag Weight</label>
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                            <div class="bind_input">
                                                                                                <span class="spacing">:</span>
                                                                                                <input type="text" class="form-control">  KG
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                    <div class="row name form-group">
                                                                                        <div class="col-md-4">
                                                                                            <label for="name" class="form-label ">Run Weight</label>
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                            <div class="bind_input">
                                                                                                <span class="spacing">:</span>
                                                                                                <input type="text" class="form-control">  KG
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row name form-group">
                                                                                        <div class="col-md-4">
                                                                                            <label for="name" class="form-label ">Count Bag</label>
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                            <div class="bind_input">
                                                                                                <span class="spacing">:</span>
                                                                                                <input type="text" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row name form-group">
                                                                                        <div class="col-md-4">
                                                                                            <label for="name" class="form-label ">Count AwbNo.</label>
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

                                                            <div>
                                                                <h5 class="card-title">Bag Details</h5>
                                                                <textarea rows="14" class="t1"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-7">
                                                            <fieldset class="form-group border p-3 mt-3">
                                                                <!-- <legend></legend> -->
                                                                <form>
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="row name form-group">
                                                                                        <div class="col-md-4">
                                                                                            <label for="name" class="form-label ">Actual Pcs</label>
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                            <div class="bind_input">
                                                                                                <span class="spacing">:</span>
                                                                                                <input type="text" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                    <div class="row name form-group">
                                                                                        <div class="col-md-4">
                                                                                            <label for="name" class="form-label ">Act Weight</label>
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                            <div class="bind_input">
                                                                                                <span class="spacing">:</span>
                                                                                                <input type="text" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <textarea rows="4" class="t1"></textarea>
                                                                                    </div>
                                                                                    <div class="row form-group mt-2">
                                                                                        <div class="col-md-4">
                                                                                            <label for="name" class="form-label ">Remark</label>
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                            <div class="bind_input">
                                                                                                <span class="spacing">:</span>
                                                                                                <input type="text" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="btn_group b4">
                                                                                        <button class="btn btn-primary rounded-0 mr-2">New Run <i class="fa fa-folder-plus"></i></button> 
                                                                                        <button class="btn btn-danger rounded-0 mr-2">Delete Awb <i class="fa fa-trash"></i></button> 
                                                                                        <button class="btn btn-warning rounded-0 mr-2">Delete Bag <i class="fa fa-trash"></i></button> 
                                                                                        <button class="btn btn-dark rounded-0">Close <i class="fa fa-times"></i></button> 
                                                                                    </div>

                                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                                        <legend>Club Details</legend>
                                                                                        <div class="row name form-group">
                                                                                            <div class="col-md-4">
                                                                                                <label for="name" class="form-label ">Count Awb No.</label>
                                                                                            </div>
                                                                                            <div class="col-md-8">
                                                                                                <div class="bind_input">
                                                                                                    <span class="spacing">:</span>
                                                                                                    <input type="text" class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row name form-group">
                                                                                            <div class="col-md-4">
                                                                                                <label for="name" class="form-label ">Total Weight</label>
                                                                                            </div>
                                                                                            <div class="col-md-8">
                                                                                                <div class="bind_input">
                                                                                                    <span class="spacing">:</span>
                                                                                                    <input type="text" class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </fieldset>
                                                                                    <fieldset class="form-group border p-3 mt-5">
                                                                                        <legend>Search AirwayBill No</legend><br>
                                                                                        <div class="row form-group">
                                                                                            <div class="col-md-6">
                                                                                                <input type="text" class="form-control" placeholder="Search here...">&nbsp;
                                                                                                <div class="d-flex">
                                                                                                    <button type="submit" class="btn btn-dark rounded-0">Search <i class="fa fa-search"></i></button>
                                                                                                </div>
                                                                                                <!-- <br><button type="submit" class="btn btn-dark">Search <i class="fa fa-search"></i></button> -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </fieldset>

                                                                                    <div>
                                                                                        <h5 class="card-title">Hold Shipment</h5>
                                                                                        <textarea rows="10" class="t1"></textarea>
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
                                        </form>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection

 @push('js')

@endpush