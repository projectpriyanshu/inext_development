@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="agentmanifest" role="tabpanel" aria-labelledby="agentmanifest-tab">
                    </div> -->
                    <!-- <h4 class="card-title">Agent Manifest</h4> -->
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend>COD/Duty Collection</legend>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="coddutycollection1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <fieldset class="form-group border p-3 mt-4">
                                                    <legend>COD Details</legend>
                                                    <form>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row form-group">
                                                                            <div class="col-md-2">
                                                                                <label for="name" class="form-label ">Bill To</label>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-2">
                                                                                <label for="name" class="form-label ">COD RefNo</label>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-2">
                                                                                <label for="name" class="form-label ">COD Bill Date</label>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="date" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-2">
                                                                                <label for="name" class="form-label ">COD Total</label>
                                                                            </div>
                                                                            <div class="col-md-10">
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
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="form-group border p-3 mt-4">
                                                    <legend>Duty Details</legend>
                                                    <form>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row form-group">
                                                                            <div class="col-md-2">
                                                                                <label for="name" class="form-label ">Bill To</label>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-2">
                                                                                <label for="name" class="form-label ">Duty RefNo</label>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-2">
                                                                                <label for="name" class="form-label ">Duty Bill Date</label>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <div class="bind_input">
                                                                                    <span class="spacing">:</span>
                                                                                    <input type="date" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-md-2">
                                                                                <label for="name" class="form-label ">Duty Total</label>
                                                                            </div>
                                                                            <div class="col-md-10">
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
                                            </div>
                                        </div>
                                    </div>
                                    <fieldset class="form-group border p-3 mt-5">
                                        <legend>Collection Information</legend>
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-5">
                                                                            <label for="name" class="form-label">AwbNo</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="checkbox"> &nbsp; COD &nbsp;&nbsp;
                                                                    <input type="checkbox"> &nbsp; DUTY
                                                                </div>
                                                            </div>
                                                            <div class="row c1">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-5">
                                                                            <label for="name" class="form-label">Collect</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select">
                                                                                    <option>Yes</option>
                                                                                    <option>No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-5">
                                                                            <label for="name" class="form-label">Payment Terms</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select">
                                                                                    <option>Cash</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-5">
                                                                            <label for="name" class="form-label">Recv COD Amt</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-5">
                                                                            <label for="name" class="form-label">Recv DUTY Amt</label>
                                                                        </div>
                                                                        <div class="col-md-7">
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
                                                                        <div class="col-md-5">
                                                                            <label for="name" class="form-label">Cheque No</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-5">
                                                                            <label for="name" class="form-label">Bank Name</label>
                                                                        </div>
                                                                        <div class="col-md-7">
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
                                                                        <div class="col-md-5">
                                                                            <label for="name" class="form-label">COD Remark</label>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <input type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="">
                                                                <div class="text-center">
                                                                    <div class="btn_group">
                                                                        <button class="btn btn-primary rounded-0 font-weight-bold">Collect <i class="fa fa-circle"></i></button>
                                                                        <button class="btn btn-danger rounded-0 font-weight-bold">Close <i class="fa fa-close"></i></button>
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
                                <div class="col-md-4">
                                    <fieldset class="form-group border p-3 mt-4">
                                        <legend>Pending COD/Duty Collection</legend>
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <textarea rows="29" class="text">
                                                            </textarea>
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