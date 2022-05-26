@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="branchmanifest" role="tabpanel" aria-labelledby="branchmanifest-tab">
                    </div> -->
                    <!-- <h4 class="card-title">Branch Manifest</h4> -->
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend>Branch Manifest</legend>
                            <div class="row">
                                <div class="col-md-7">
                                    <fieldset class="form-group border p-3 mt-5">
                                        <legend>Manifest Details</legend>
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label ">To Branch</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
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
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label ">Destination</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
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
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label ">Co-Loader</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
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
                                                            <div class="row d-flex">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-6">
                                                                            <label for="name" class="form-label ">Vehicle No</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-3">
                                                                            <label for="name" class="form-label ">CD No</label>
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
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label ">Manifest Date</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="date" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row d-flex">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-6">
                                                                            <label for="name" class="form-label ">Manifest No</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Time</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="time" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label ">Location</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <div class="row form-row">
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control" value="JAI">

                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" value="Jaipur">

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
                                    <fieldset class="form-group border p-3 mt-5">
                                        <legend>Search AwbNo</legend>
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row form-group">
                                                                <div class="col-md-3">
                                                                    <label for="name" class="form-label">AwbNo</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control"> &nbsp;
                                                                        <button class="btn btn-primary rounded-0">Add</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </fieldset><br>
                                    <div class="btn_group text-center button_media">
                                        <button class="btn btn-info font-weight-bold rounded-0">New M/F <i class="fa fa-folder-plus"></i></button>
                                        <button class="btn btn-warning font-weight-bold rounded-0">Remove M/F <i class="fa fa-remove"></i></button>
                                        <button class="btn btn-success font-weight-bold rounded-0">Print <i class="fa fa-print"></i></button>
                                        <button class="btn btn-danger font-weight-bold rounded-0">Close <i class="fa fa-close"></i></button>
                                    </div><br>
                                    <textarea rows="15" class="branchmanifesttext"></textarea>
                                </div>
                                <div class="col-md-5">
                                    <fieldset class="form-group border p-3 mt-5">
                                        <legend>AwbNo Details</legend>
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <textarea rows="27" class="text branchmanifest2 branch1">
                                                            </textarea>
                                                            <div class="row form-group">
                                                                <div class="col-md-5">
                                                                    <label for="name" class="form-label ">Count</label>
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
                                                                    <label for="name" class="form-label ">Pcs</label>
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
                                                                    <label for="name" class="form-label ">Wt (KG)</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <fieldset class="form-group border p-3 mt-5">
                                                            <legend>Search Manifest No</legend>
                                                            <form>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="row form-group">
                                                                                    <div class="col-md-3">
                                                                                        <label for="name" class="form-label">Manifest No</label>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="bind_input">
                                                                                            <span class="spacing">:</span>
                                                                                            <input type="text" class="form-control"> &nbsp;
                                                                                            <button class="btn rounded-0 btn-dark">Search</button>
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
                                        </form>
                                    </fieldset>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

 @push('js')

@endpush