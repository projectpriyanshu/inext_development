@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
    <div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="employeedetails" role="tabpanel"
                        aria-labelledby="employeedetails-tab">
                        <!-- <h5 class="card-title">EMPLOYEE PROFILE</h5> -->
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Employee Profile</legend>
                                <form action="{{route('employee-details-add')}}" method="post" enctype="multipart/form-data">
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
                                                    <fieldset class="form-group border p-3 mt-4">
                                                        <legend>Employee ID/Name</legend>
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Search</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Search Employee ID/Aadhar No/Email ID..." name="search" id="search">
                                                                <button type="button" id="search_btn" class="btn btn-common rounded-0 save-btn">
                                                                    <span><i class="fa fa-search"></i></span>
                                                                </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">ID</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row form-row">
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="employee_id" id="employee_id" value="{{old('employee_id')}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                                    @if($errors->has('employee_id'))
                                                                        <div class="error">{{ $errors->first('employee_id') }}</div>
                                                                    @endif
                                                                    </div>
                                                    </fieldset>
                                                    <fieldset class="form-group border p-3 mt-5">
                                                        <legend>Employee ID/Name</legend>
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Father's Name</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="father_name" id="father_name" value="{{old('father_name')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('father_name'))
                                                            <div class="error">{{ $errors->first('father_name') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Mother's Name</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{old('mother_name')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('mother_name'))
                                                            <div class="error">{{ $errors->first('mother_name') }}</div>
                                                        @endif
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="form-group border p-3 mt-5">
                                                        <legend>Address Details</legend>
                                                        <div class="row form-group mt-3">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Address</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('address'))
                                                            <div class="error">{{ $errors->first('address') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-3">
                                                                <!-- <label for="name" class="form-label ">Address</label> -->
                                                            </div>
                                                          
                                                        </div>
                                                        <div class="row city form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">City</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row form-row">
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control" name="city_code" id="city_code" value="{{old('city_code')}}" readonly>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="city_id" id="city_search" value="{{old('city_id')}}" onkeyup ="deleteData()" placeholder="Search City..">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('city_id'))
                                                            <div class="error">{{ $errors->first('city_id') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row state form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">State</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row form-row">
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control" name="state_code" id="state_code" readonly value="{{old('state_code')}}">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="state_id" id="state_name" readonly value="{{old('state_id')}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('state_id'))
                                                            <div class="error">{{ $errors->first('state_id') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row branch form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Branch</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row form-row">
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="branch_id" id="branch_id" value="{{old('branch_id')}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('branch'))
                                                            <div class="error">{{ $errors->first('branch') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row pincode form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Pincode</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" name="pincode" id="pincode" value="{{old('pincode')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('pincode'))
                                                            <div class="error">{{ $errors->first('pincode') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row telephone form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Telephone</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" name="telephone" id="telephone" value="{{old('telephone')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('telephone'))
                                                            <div class="error">{{ $errors->first('telephone') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row email form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Email Id</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('email'))
                                                            <div class="error">{{ $errors->first('email') }}</div>
                                                        @endif
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="form-group border p-3 mt-5">
                                                        <legend>Aadhaar/PAN No. Details</legend>
                                                        <div class="row voter form-group mt-3">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Voter ID</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="voter_id" id="voter_id" value="{{old('voter_id')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('voter_id'))
                                                            <div class="error">{{ $errors->first('voter_id') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row aadhar form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Aadhaar No</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" name="aadhar_no" id="aadhar_no" value="{{old('aadhar_no')}}" return onblur="checkAadhar()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('aadhar_no'))
                                                            <div class="error">{{ $errors->first('aadhar_no') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row pan form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">PAN No</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="pan_no" id="pan_no" value="{{old('pan_no')}}" return onblur="checkPan()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('pan_no'))
                                                            <div class="error">{{ $errors->first('pan_no') }}</div>
                                                        @endif
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group border p-3 mt-4">
                                                        <legend>Bank Details</legend>
                                                        <div class="row bank_name form-group mt-2">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Bank Name</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{old('bank_name')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('bank_name'))
                                                            <div class="error">{{ $errors->first('bank_name') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row account_no form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">A/C No</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" name="account_no" id="account_no" value="{{old('account_no')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('account_no'))
                                                            <div class="error">{{ $errors->first('account_no') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row ifsc_code form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">IFSC</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" value="{{old('ifsc_code')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('ifsc_code'))
                                                            <div class="error">{{ $errors->first('ifsc_code') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row bank_address form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Bank Address</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="bank_address" id="bank_address" value="{{old('bank_address')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('bank_address'))
                                                            <div class="error">{{ $errors->first('bank_address') }}</div>
                                                        @endif
                                                        </div>
                                                    </fieldset>
                                                    <fieldset class="form-group border p-3 mt-5">
                                                        <legend>DOB/DOJ Details</legend>
                                                        <div class="row dob form-group mt-3">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">DOB</label>
                                                            </div>
                                                            
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="date" class="form-control" name="dob" id="dob" value="{{old('dob')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                            @if($errors->has('dob'))
                                                                <div class="error">{{ $errors->first('dob') }}</div>
                                                            @endif
                                                            </div>
                                                       
                                                        <div class="row doj form-group mt-3">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">DOJ</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="date" class="form-control" name="doj" id="doj" value="{{old('doj')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('doj'))
                                                            <div class="error">{{ $errors->first('doj') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row department form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Department</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="department" id="department" value="{{old('department')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('department'))
                                                            <div class="error">{{ $errors->first('department') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row material form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Material</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="material" id="material" value="{{old('material')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('material'))
                                                            <div class="error">{{ $errors->first('material') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row gender form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Gender</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="form-select" name="gender" id="gender" value="{{old('gender')}}"> 
                                                                        <option value="male">Male</option>
                                                                        <option value="female">Female</option>
                                                                        <option value="other">Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('gender'))
                                                            <div class="error">{{ $errors->first('gender') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row education form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Education</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="education" id="education" value="{{old('education')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('education'))
                                                            <div class="error">{{ $errors->first('education') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row payment form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Payment</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="payment" id="payment" value="{{old('payment')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('payment'))
                                                            <div class="error">{{ $errors->first('payment') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row uan form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">UAN No</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="uan_no" id="uan_no" value="{{old('uan_no')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('uan_no'))
                                                            <div class="error">{{ $errors->first('uan_no') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row salary form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Annual Salary</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" name="annual_salary" id="annual_salary" value="{{old('annual_salary')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('annual_salary'))
                                                            <div class="error">{{ $errors->first('annual_salary') }}</div>
                                                        @endif
                                                        </div>
                                                        <div class="row  form-group">
                                                            <div class="col-md-3">
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing"></span>
                                                                    <img src="" id="photo_path" style="width:90%;height:300px;display:none;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row image form-group">
                                                            <div class="col-md-3">
                                                                <label for="name" class="form-label ">Photo Path</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="file" class="form-control photo_path" name="photo_path" onchange="document.getElementById('photo_path').src = window.URL.createObjectURL(this.files[0])" value="{{old('photo_path')}}"> &nbsp;
                                                                    {{--<button type="button" class="btn btn-common rounded-0 save-btn"><i class="fa fa-plus"></i></button>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                        @if($errors->has('photo_path'))
                                                            <div class="error">{{ $errors->first('photo_path') }}</div>
                                                        @endif
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                       <input type="hidden" name="id" id="id" value="">
                                        <a href="{{route('employee-details-list')}}" class="btn btn-secondary save-btn mr-3"> List
                                        <i class="fa fa-list ms-2"></i>
                                        </a>
                                        <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_employee"> Edit
                                        <i class="fa fa-edit ms-2"></i>
                                        </button>
                                        <button type="submit" class="btn btn-success save-btn" onclick="return validate()">Save
                                        <i class="fa fa-save ms-2"></i>
                                        </button>
                                        </div>`
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
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
 function validate(){
    var empid = $("input[name='employee_id']").val();
    if(empid.length < 1){
        alert('Please fill the Employee id');
        $("input[name='employee_id']").focus();
        return false;
    }
    var father = $("input[name='father_name']").val();
    if(father.length < 1){
        alert('father_name is required');
        $("input[name='father_name']").focus();
        return false;
    }
    var mother = $("input[name='mother_name']").val();
    if(mother.length < 1){
        alert('mother_name is required');
        $("input[name='mother_name']").focus();
        return false;
    }
    var ADD = $("input[name='address']").val();
    if(ADD.length < 1){
        alert('address is required');
        $("input[name='address']").focus();
        return false;
    }
    var city = $("input[name='city_id']").val();
    if(city.length < 1){
        alert('city_id is required');
        $("input[name='city_id']").focus();
        return false;
    }
    var branch = $("input[name='branch_id']").val();
    if(branch.length < 1){
        alert('branch_id is required');
        $("input[name='branch_id']").focus();
        return false;
    }
    var pin = $("input[name='pincode']").val();
    if(pin.length < 1 || isNaN(pin)){
        alert('pincode is required and must be number');
        $("input[name='pincode']").focus();
        return false;
    }
    var tel = $("input[name='telephone']").val();
    if(tel.length !=10 || isNaN(tel) ){
        alert('Telephone must be 10 digit and Number');
        $("input[name='telephone']").focus();
        return false;
    }
    var email = $("input[name='email']").val();
    if(email.length <1){
        alert('Email is required');
        $("input[name='email']").focus();
        return false;
    }
    var voter = $("input[name='voter_id']").val();
    if(voter.length < 1){
        alert('voter_id is required');
        $("input[name='voter_id']").focus();
        return false;
    }
  
    var pan = $("input[name='pan_no']").val();
    if(pan.length < 1){
        alert('pan_no is required');
        $("input[name='pan_no']").focus();
        return false;
    }
     var bank = $("input[name='bank_name']").val();
    if(bank.length <1 ){
        alert('bank_name is required');
        $("input[name='bank_name']").focus();
        return false;
    }
    var account = $("input[name='account_no']").val();
    if(account.length < 1 || isNaN(account)){
        alert('account_no is required and must be a number');
        $("input[name='account_no']").focus();
        return false;
    }
    var ifsc = $("input[name='ifsc_code']").val();
    if(ifsc.length <1 ){
        alert('ifsc_code is required');
        $("input[name='ifsc_code']").focus();
        return false;
    }
    var bank_add = $("input[name='bank_address']").val();
    if(bank_add.length <1 ){
        alert('bank_address is required');
        $("input[name='bank_address']").focus();
        return false;
    }
    var date = $("input[name='dob']").val();
    if(date.length <1 ){
        alert('dob is required');
        $("input[name='dob']").focus();
        return false;
    }
    var join = $("input[name='doj']").val();
    if(join.length <1 ){ 
        alert('doj is required');
        $("input[name='doj']").focus();
        return false;
    }
    var dept = $("input[name='department']").val();
    if(dept.length <1 ){
        alert('department is required');
        $("input[name='department']").focus();
        return false;
    }
    var mat = $("input[name='material']").val();
    if(mat.length <1 ){
        alert('material is required');
        $("input[name='material']").focus();
        return false;
    }
    var edu = $("input[name='education']").val();
    if(edu.length <1 ){
        alert('education is required');
        $("input[name='education']").focus();
        return false;
    }
    var pay = $("input[name='payment']").val();
    if(pay.length <1 || isNaN(pay) ){
        alert('payment is required must be number');
        $("input[name='payment']").focus();
        return false;
    }
    var Uan = $("input[name='uan_no']").val();
    if(Uan.length <1 ){
        alert('uan_no is required');
        $("input[name='uan_no']").focus();
        return false;
    }
    var anual = $("input[name='annual_salary']").val();
    if(anual.length <1 || isNaN(pay) ){
        alert('annual_salary is required must be number');
        $("input[name='annual_salary']").focus();
        return false;
    }
    var photo = $("input[name='photo_path']").val();
    if(photo.length <1  ){
        alert('please choose the files');
        $("input[name='photo_path']").focus();
        return false;
    }

 }
 

$('#search_btn').click(function(){
         var search = $('#search').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: "{{route('employee-details-index')}}", 
            data: {'_token':token,'search':search},
            success: function(result){
              
               var employee = jQuery.parseJSON( result );
               
               $('#id').val(employee.id);
               $('#employee_id').val(employee.employee_id).prop('disabled', true);
               $('#email').val(employee.email).prop('disabled', true);
               $('#father_name').val(employee.father_name).prop('disabled', true);
               $('#mother_name').val(employee.mother_name).prop('disabled', true);
               $('#address').val(employee.address).prop('disabled', true);
               $('#city_search').val(employee.city_name).prop('disabled', true);
               $('#city_code').val(employee.city_code).prop('disabled', true);
               $('#state_code').val(employee.state_code).prop('disabled', true);
               $('#state_name').val(employee.state_name).prop('disabled', true);
               $('#branch_id').val(employee.branch_id).prop('disabled', true);
               $('#pincode').val(employee.pincode).prop('disabled', true);
               $('#telephone').val(employee.telephone).prop('disabled', true);
               $('#voter_id').val(employee.voter_id).prop('disabled', true);
               $('#aadhar_no').val(employee.aadhar_no).prop('disabled', true);
               $('#pan_no').val(employee.pan_no).prop('disabled', true);
               $('#bank_name').val(employee.bank_name).prop('disabled', true);
               $('#account_no').val(employee.account_no).prop('disabled', true);
               $('#ifsc_code').val(employee.ifsc_code).prop('disabled', true);
               $('#bank_address').val(employee.bank_address).prop('disabled', true);
               $('#dob').val(employee.dob).prop('disabled', true);
               $('#doj').val(employee.doj).prop('disabled', true);
               $('#department').val(employee.department).prop('disabled', true);
               $('#material').val(employee.material).prop('disabled', true);
               $('#gender').val(employee.gender).prop('disabled', true);
               $('#education').val(employee.education).prop('disabled', true);
               $('#payment').val(employee.payment).prop('disabled', true);
               $('#uan_no').val(employee.uan_no).prop('disabled', true);
               $('#annual_salary').val(employee.annual_salary).prop('disabled', true);
               $('.photo_path').prop('disabled',true);

               $("#photo_path").prop('disabled', true).css('display','block').attr('src','uploads/employee_image/'+employee.photo_path); 
               
               
               if(employee.status == '400')
               {
                  $('#id').val();
                  $('#employee_id').val();
                  $('#email').val();
                  $('#employee_id').prop('disabled', false);
                  $('#email').prop('disabled', false);
                  $('#father_name').prop('disabled', false);
                  $('#mother_name').prop('disabled', false);
                  $('#address').prop('disabled', false);
                  $('#city_search').prop('disabled', false);
                  $('#city_code').prop('disabled', false);
                  $('#state_code').prop('disabled', true);
                  $('#state_name').prop('disabled', true);
                  $('#branch_id').prop('disabled', true);
                  $('#pincode').prop('disabled', false);
                  $('#telephone').prop('disabled', false);
                  $('#voter_id').prop('disabled', false);
                  $('#aadhar_no').prop('disabled', false);
                  $('#pan_no').prop('disabled', false);
                  $('#bank_name').prop('disabled', false);
                  $('#account_no').prop('disabled', false);
                  $('#ifsc_code').prop('disabled', false);
                  $('#bank_address').prop('disabled', false);
                  $('#dob').prop('disabled', true);
                  $('#doj').prop('disabled', true);
                  $('#department').prop('disabled', true);
                  $('#material').prop('disabled', true);
                  $('#gender').prop('disabled', true);
                  $('#education').prop('disabled', true);
                  $('#payment').prop('disabled', true);
                  $('#uan_no').prop('disabled', true);
                  $('#annual_salary').prop('disabled', true);
                  $('.photo_path').prop('disabled', false);
                  $('#alert-danger').text(employee.message);
               }
            } 
         });
      });

 $('#edit_employee').click(function() 
      {
        $('#employee_id').prop('disabled', false);
        $('#email').prop('disabled', false);
        $('#father_name').prop('disabled', false);
        $('#mother_name').prop('disabled', false);
        $('#address').prop('disabled', false);
        $('#city_search').prop('disabled', false);
        $('#city_code').prop('disabled', false);
        $('#state_code').prop('disabled', true);
        $('#state_name').prop('disabled', true);
        $('#branch_id').prop('disabled', false);
        $('#pincode').prop('disabled', false);
        $('#telephone').prop('disabled', false);
        $('#voter_id').prop('disabled', false);
        $('#aadhar_no').prop('disabled', false);
        $('#pan_no').prop('disabled', false);
        $('#bank_name').prop('disabled', false);
        $('#account_no').prop('disabled', false);
        $('#ifsc_code').prop('disabled', false);
        $('#bank_address').prop('disabled', false);
        $('#dob').prop('disabled', false);
        $('#doj').prop('disabled', false);
        $('#department').prop('disabled', false);
        $('#material').prop('disabled', false);
        $('#gender').prop('disabled', false);
        $('#education').prop('disabled', false);
        $('#payment').prop('disabled', false);
        $('#uan_no').prop('disabled', false);
        $('#annual_salary').prop('disabled', false);
        $('.photo_path').prop('disabled', false);
         
      })
// city Search
       var token = "{{csrf_token()}}";
        $( "#city_search" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url:"{{route('search-city')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: token,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }       
          });
        },
        
        select: function (event, ui) {
           $('#city_search').val(ui.item.label); 
           $('#city_code').val(ui.item.city_code); 
           $('#state_code').val(ui.item.state_code);
           $('#state_name').val(ui.item.state_name);
           return false;
        }
      });

      function deleteData(){
          var data = $('#city_search').val();
          if(data.length > 1)
          {
              $('#city_code').val(''); 
              $('#state_code').val('');
              $('#state_name').val('');
          }
      }

</script>
@endpush
