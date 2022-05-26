@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="userregistration" role="tabpanel"
                        aria-labelledby="userregistration-tab">
                        <div class="detail_edit p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset class="form-group border p-3">
                                        <legend class="w-auto px-2 text-dark">User Registration</legend>
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row name form-group">
                                                        <div class="col-md-5">
                                                            <label for="name" class="form-label ">Type</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <select class="form-select">
                                                                    <option>User</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row name form-group">
                                                        <div class="col-md-5">
                                                            <label for="name" class="form-label ">User ID</label>
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
                                                            <label for="name" class="form-label ">Password</label>
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
                                                            <label for="name" class="form-label ">Branch</label>
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
                                                    <div class="row name form-group">
                                                        <div class="col-md-5">
                                                            <label for="name" class="form-label ">Department</label>
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
                                                            <label for="name" class="form-label ">Email Id</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class=" awb-check">
                                                                <div class="awb">
                                                                    <input type="checkbox"> &nbsp; Awb Edit &nbsp;&nbsp;
                                                                </div>
                                                                <div class="awb">
                                                                    <input type="checkbox"> &nbsp; Awb Delete
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="btn_group text-center mt-3 button_media">
                                                        <button class="btn show-btn btn-primary rounded-0">Create <i class="fa fa-plus"></i></button> 
                                                        <button class="btn csv-btn btn-danger rounded-0">Remove <i class="fa fa-minus"></i></button> 
                                                        <button class="btn close-btn btn-warning rounded-0">Close <i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </fieldset>
                                    <div class="table_out">
                                        <div class="table-responsive">
                                            <table class="table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>UserID</th>
                                                    <th>Pass</th>
                                                    <th>Department</th>
                                                    <th>BranchCode</th>
                                                    <th>BranchName</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>admin</td>
                                                    <td>admin@2022#</td>
                                                    <td>Admin</td>
                                                    <td>JAI</td>
                                                    <td>JAIPUR</td>
                                                  </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                        </div>
                                    </div>
                                    
                                    <span class="data">Total Count: 1</span>
                                </div>
                                <div class="col-md-6 user2">
                                    <fieldset class="form-group border p-3">
                                        <legend>Permission</legend>
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row name form-group">
                                                        <div class="col-md-12">
                                                            <div class="bind_input">
                                                                <input type="checkbox"> &nbsp; SELECT ALL
                                                            </div>
                                                            <div class="row form-group box_type">
                                                                <div class="col-md-5">
                                                                    <div class="bind_input">
                                                                        <input type="checkbox"> &nbsp; Master
                                                                    </div>
                                                                    <div class="bind_input">
                                                                        <input type="checkbox"> &nbsp; Automation
                                                                    </div>
                                                                    <div class="bind_input">
                                                                        <input type="checkbox"> &nbsp; Outbound
                                                                    </div>
                                                                    <div class="bind_input">
                                                                        <input type="checkbox"> &nbsp; Operation
                                                                    </div>
                                                                    <div class="bind_input">
                                                                        <input type="checkbox"> &nbsp; Inbound
                                                                    </div>
                                                                    <div class="bind_input">
                                                                        <input type="checkbox"> &nbsp; Account
                                                                    </div>
                                                                    <div class="bind_input">
                                                                        <input type="checkbox"> &nbsp; Billing
                                                                    </div>
                                                                    <div class="bind_input">
                                                                        <input type="checkbox"> &nbsp; Purchase
                                                                    </div>
                                                                    <div class="bind_input">
                                                                        <input type="checkbox"> &nbsp; Customer Care
                                                                    </div>
                                                                    <div class="bind_input">
                                                                        <input type="checkbox"> &nbsp; Reports
                                                                    </div>
                                                                    <div class="bind_input">
                                                                        <input type="checkbox"> &nbsp; Setting
                                                                    </div>
                                                                    <br><br><br><br><br>
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
    </div>
@endsection

 @push('js')

@endpush