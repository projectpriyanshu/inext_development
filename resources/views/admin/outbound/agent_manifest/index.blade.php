@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="agentmanifest" role="tabpanel" aria-labelledby="agentmanifest-tab">
                    </div> -->
                    <!-- <h4 class="card-title agentmanifestheading">Agent Manifest</h4> -->
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend>Agent Manifest</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset class="form-group border p-3 mt-5">
                                        <legend>Manifest Details</legend>
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="awb-check">
                                                                        <div class="awb">
                                                                            <input type="radio" checked> &nbsp; Network &nbsp;&nbsp;

                                                                        </div>
                                                                        <div class="awb">
                                                               <input type="radio"> &nbsp; Forwarder
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                            </div><br>
                                                            <div class="row form-group">
                                                                <div class="col-md-5">
                                                                    <label for="name" class="form-label ">Company</label>
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
                                                                    <label for="name" class="form-label ">To Agent</label>
                                                                </div>
                                                                <div class="col-md-7">
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
                                                                <div class="col-md-5">
                                                                    <label for="name" class="form-label ">Account No</label>
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
                                                                    <label for="name" class="form-label ">Destination</label>
                                                                </div>
                                                                <div class="col-md-7">
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
                                                                <div class="col-md-5">
                                                                    <label for="name" class="form-label ">Network</label>
                                                                </div>
                                                                <div class="col-md-7">
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
                                                                <div class="col-md-5">
                                                                    <label for="name" class="form-label ">Vehicle No</label>
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
                                                                    <label for="name" class="form-label ">CD No</label>
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
                                                                    <label for="name" class="form-label ">Manifest Date</label>
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
                                                                    <label for="name" class="form-label ">Manifest No</label>
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
                                                                    <label for="name" class="form-label ">Time</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="time" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-5">
                                                                    <label for="name" class="form-label ">Location</label>
                                                                </div>
                                                                <div class="col-md-7">
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
                                                            <div class="row">
                                                                <div class="col-md-6">

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="awb-check">
                                                                        <div class="awb">
                                                                <input type="radio" checked> &nbsp; Date Wise &nbsp;&nbsp;

                                                                        </div>
                                                                        <div class="awb">
                                                               <input type="radio"> &nbsp; Awbno
                                                                            
                                                                        </div>
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
                                                            <div class="btn_group button_media">
                                                                <button class="btn btn-primary rounded-0">Show <i class="fa fa-eye"></i></button>
                                                                <button class="btn btn-secondary rounded-0">Add <i class="fa fa-plus"></i></button>
                                                            </div>
                                                            <h5 class="agentmanifestorpart c1">Or</h5>
                                                            <div class="row form-group mt-3">
                                                                <div class="col-md-5">
                                                                    <label for="name" class="form-label">AwbNo</label>
                                                                </div>
                                                                <div class="col-md-7">
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
                                    </fieldset>
                                    <div class="text-center agentmanifestcheck">
                                        <input type="checkbox"> &nbsp; Print On Letter Head
                                    </div><br>
                                    <div class="btn_group text-center button_media">
                                        <button class="btn btn-warning rounded-0">New M/F <i class="fa fa-folder-plus"></i></button>
                                        <button class="btn btn-success rounded-0">Print <i class="fa fa-print"></i></button>
                                        <button class="btn btn-info rounded-0">Excel <i class="fa fa-file"></i></button>
                                        <button class="btn btn-danger rounded-0">Close <i class="fa fa-close"></i></button>
                                    </div><br>
                                    <textarea rows="8" class="agentmanifesttext text"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="form-group border p-3 mt-5">
                                        <legend>AwbNo Details</legend>
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="checkbox"> &nbsp; Select All
                                                            <select class="form-select">
                                                                <option></option>
                                                            </select><br>
                                                            <textarea rows="37" class="branch1 text">
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
                                                                                    <div class="col-md-5">
                                                                                        <label for="name" class="form-label">Manifest No</label>
                                                                                    </div>
                                                                                    <div class="col-md-7">
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
                                                        <div class="btn_group text-center">
                                                            <button class="btn btn-success rounded-0">Security Declaration <i class="fa fa-check"></i></button>
                                                        </div>
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