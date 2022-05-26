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
                            <legend class="w-auto px-2 text-dark">API User</legend>
                            <form class="">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <div class="card-body "> -->
                                            <div class="row mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-5">
    
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="awb-check">
                                                                    <div class="awb">
                                                                        <input type="radio" checked> &nbsp; Live User &nbsp;&nbsp;
                                                                    </div>
                                                                    <div class="awb">
                                                                        <input type="radio"> &nbsp; Test User
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">Account Code</label>
                                                            </div>
                                                            <div class="col-md-8">
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
                                                                <label for="name" class="form-label">Access Key</label>
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
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">Username</label>
                                                            </div>
                                                            <div class="col-md-8">
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
                                                                <label for="name" class="form-label">Password</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="password" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">API Status</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="form-select">
                                                                        <option>Active</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- </div> -->
                                        
                                        <div class="card-footer text-right">
                                            <div class="btn_group button_media">
                                                <button class="btn btn-success rounded-0">Save
                                                    <i class="fa fa-save"></i>
                                                </button>
                                                <button class="btn btn-warning rounded-0">Remove
                                                    <i class="fa fa-delete"></i>
                                                </button>
                                                <button class="btn btn-danger rounded-0">Close
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Shipper Account Code</th>
                                                        <th>Site Id</th>
                                                        <th>Password</th>
                                                        <th>Access Key</th>
                                                        <th>API Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fa fa-caret-right"></i></td>
                                                        <td>E003</td>
                                                        <td>E003</td>
                                                        <td>ECOM@2020!</td>
                                                        <td>A1F91A37</td>
                                                        <td>Active</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br><br><br><br><br><br><br><br>
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
@endsection

 @push('js')

@endpush