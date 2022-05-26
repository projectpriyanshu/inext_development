@extends('layouts.main')
@section('content')
<div class="row background_image">     
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="loadreciveemail" role="tabpanel"
                        aria-labelledby="loadreciveemail-tab">
                    </div> -->
                    <div class="detail_edit">
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset class="form-group border p-3">
                                    <legend>Load Notification</legend>
                                    <form method="post" action="{{ url('/load-notification-store')}}">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                @if(session()->has('success'))
                                            <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                            </div>
                                            @endif
                                            @if(session()->has('error'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('error') }}
                                            </div>
                                            @endif
                                            <span id="alert-success" style="color: green;"></span>
                                            <span id="alert-danger" style="color: red;"></span>
                                                
                                                    <div class="col-md-6">
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Sender
                                                                    SMTP</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" name="sender_smtp" id="sender_smtp" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Sender User
                                                                    ID</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" name="sender_id" id="sender_id" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="email" class="form-label ">Sender Email
                                                                    ID</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="email" name="sender_email" id="sender_email" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <!-- <label for="name" class="form-label "></label> -->
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing"></span>
                                                                    <input type="checkbox" name="checkbox" checked> &nbsp; SSL
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">SMTP Port</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" name="smtp_port" id="smtp_port" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" name="sender_password" class="form-label ">Sender
                                                                    Password</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="password" name="sender_password" id="sender_password"class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Additional
                                                                    CC</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" name="additional_cc" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <!-- <label for="name" class="form-label "></label> -->
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing"></span>
                                                                    <button class="btn btn-success rounded-0" value="1">Save Email Details
                                                                        <i class="fa fa-save"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-9">
                                                            <hr class="hr_line">
                                                        </div><br>
                                                        <div class="col-md-6">
                                                            <center>
                                                                <input type="radio" checked> &nbsp; Auto &nbsp;&nbsp;
                                                            <input type="radio"> &nbsp; Custom
                                                            </center><br>
                                                            <div class="row form-group">
                                                                <div class="col-md-5">
                                                                    <label class="form-label">Company</label>
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
                                                                    <label class="form-label">Sector</label>
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
                                                                    <label class="form-label">From</label>
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
                                                                    <label class="form-label">To</label>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="bind_input">
                                                                        <span class="spacing">:</span>
                                                                        <input type="date" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="btn_group loadbtn mt-4 button_media">
                                                                <button class="btn btn-primary rounded-0">Show <i class="fa fa-eye"></i></button>
                                                                <button class="btn btn-success rounded-0">Send Email <i class="fa fa-envelope"></i></button>
                                                                <button class="btn btn-warning rounded-0">Stop Email <i class="fa fa-envelope"></i></button>&nbsp;&nbsp;
                                                                <button class="btn btn-danger rounded-0">Close <i class="fa fa-close"></i></button>
                                                            </div>
                                                            <input type="checkbox" class="mt-4"> &nbsp; <span class="s1">Select All</span>  
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="table-responsive">
                                                                <table class="table-bordered loadreceivetable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Select</th>
                                                                            <th>Client</th>
                                                                            <th>Email</th>
                                                                            <th>ShpCode</th>
                                                                            <th>BranchCode</th>
                                                                            <th>SalePerson</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>abc</td>
                                                                            <td>abc@abc.com</td>
                                                                            <td>abc123</td>
                                                                            <td>Noida12</td>
                                                                            <td>Kbc</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
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

@endsection

 @push('js')

@endpush