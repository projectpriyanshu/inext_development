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
                            <legend class="w-auto px-2 text-dark">Change Password</legend>
                            <form class="" method="POST" action="{{ route('change.password') }}">
                                @csrf

                                @if(session()->has('message'))
                               <div class="alert alert-success">
                                 {{ session()->get('message') }}
                               </div>
                               @endif
                           @foreach ($errors->all() as $error)
                           <p class="text-danger">{{ $error }}</p>
                           @endforeach 

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label">Username</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="text" class="form-control" name="user">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label">New Password</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="password" class="form-control" name="pwd">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label">Confirm Password</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <input type="password" class="form-control" name="cnf_pwd">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <div class="btn_group button_media">
                                            <button class="btn btn-primary rounded-0">Change
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            <button class="btn btn-danger rounded-0">Close
                                                <i class="fa fa-close"></i>
                                            </button>
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