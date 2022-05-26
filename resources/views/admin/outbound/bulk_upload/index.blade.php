@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="bulkupload" role="tabpanel" aria-labelledby="bulkupload-tab">
                    </div> -->
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">Bulk Upload</legend>
                            <form class="" method="post" action="{{url('bulk-store')}}" enctype="multipart/form-data">
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
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label ">Date</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="date" name="date" id="date" class="form-control">
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                            @if($errors->has('date'))
                                                                <div class="error">{{ $errors->first('date') }}</div>
                                                            @endif
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label ">Company</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <select name="company" id="company" class="form-select" value="{{old('company')}}">
                                                                <option value="redfm" ></option>
                                                                <option value="redfm">redfm</option>
                                                                <option value="microsoft">microsoft</option>
                                                                <option value="tesla">tesla</option>
                                                            </select>
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                            @if($errors->has('company'))
                                                                <div class="error">{{ $errors->first('company') }}</div>
                                                            @endif
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label ">Branch</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="text" name="branch_code" id="branch_code" class="form-control"> &nbsp;
                                                            <input type="text" name="branch_name" id="branch_id" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row text-end mb-3">
                                                            @if($errors->has('branch_code'))
                                                                <div class="error">{{ $errors->first('branch_code') }}</div>
                                                            @endif
                                                            </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label ">CSV File Path</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="file" name="file" id="file" class="form-control">
                                                            {{-- <button class="btn btn-primary rounded-0">Browse</button> --}}
                                                        </div>
                                                        <div class="row text-end mb-3">
                                                            @if($errors->has('file'))
                                                                <div class="error">{{ $errors->first('file') }}</div>
                                                            @endif
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <div class="btn_group b4">
                                                    <button class="btn btn-success rounded-0">Upload <i class="fa fa-upload"></i></button>
                                                    <button class="btn btn-danger rounded-0">Close <i class="fa fa-close"></i></button>
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
@endsection

 @push('js')

@endpush