@extends('layouts.main')
@section('content')
<div class="row background_image">
    <div class="col-md-12">
        <div class="card-body">
            <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
            <div class="tab-content mt-5">
                <div class="tab-pane fade show active" id="userlist" role="tabpanel" aria-labelledby="userlist-tab">
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">User List</legend>
                            <form>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label ">Username</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <select class="form-select">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label">Department</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="bind_input">
                                                            <span class="spacing">:</span>
                                                            <select class="form-select">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn_group button_media text-center">
                                                <button class="btn show-btn btn-success rounded-0">Show <i class="fa fa-eye"></i></button>
                                                <button class="btn csv-btn btn-primary rounded-0">CSV <i class="fa fa-file"></i></button>
                                                <button class="btn close-btn btn-danger rounded-0">Close <i class="fa fa-times"></i></button>
                                            </div>
                                            <textarea rows="20" class="text mt-3"></textarea>
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
@endsection

 @push('js')

@endpush