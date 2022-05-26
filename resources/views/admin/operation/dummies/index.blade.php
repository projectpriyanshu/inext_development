@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="dummies" role="tabpanel" aria-labelledby="dummies-tab"> -->
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Dummy AwbNo</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset class="form-group border p-3 mt-5">
                                            <legend>Shipper Setting</legend>
                                            <div class="mt-2">
                                                <input type="radio" checked> &nbsp; Original Shipper &nbsp;
                                                <input type="radio"> &nbsp; Dummy Shipper &nbsp;
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group border p-3 mt-5">
                                            <!-- <legend></legend> -->
                                            <form>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <div class="row name form-group">
                                                                    <div class="col-md-5">
                                                                        <label for="name" class="form-label ">M.Awb No.</label>
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
                                                                        <label for="name" class="form-label ">No. of dummies</label>
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
                                                                        <label for="name" class="form-label ">Dummies sr. no.</label>
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
                                                    </div>
                                                </div>
                                            </form>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset class="form-group border p-3 mt-5">
                                            <legend>Consignee Setting</legend>
                                            <div class="mt-2">
                                                <input type="radio" checked> &nbsp; Original Consignee &nbsp;
                                                <input type="radio"> &nbsp; Dummy Consignee &nbsp;
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group border p-3 mt-5 dummy">
                                            <!-- <legend></legend> -->
                                            <form>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <div class="row name form-group">
                                                                    <div class="col-md-5">
                                                                        <label for="name" class="form-label ">Jump</label>
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
                                                                        <label for="name" class="form-label ">Country</label>
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </fieldset>
                                    </div>
                                    
                                    <div class="card-footer">
                                        <div class="btn_group b4">
                                            <button class="btn btn-primary rounded-0 show-btn">Show <i class="fa fa-eye"></i></button>
                                            <button class="btn btn-success rounded-0 save-btn">Save <i class="fa fa-save"></i></button>
                                            <button class="btn btn-danger rounded-0 remove-btn">Remove <i class="fa fa-minus"></i></button>
                                            <button class="btn btn-warning rounded-0 editor-btn">Editor <i class="fa fa-edit"></i></button>
                                            <button class="btn btn-dark rounded-0 close-btn">Close <i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="table-responsive">
                                    <table class="table-bordered table1">
                                        <thead>
                                            <tr>
                                                <th>Dummy Awb no.</th>
                                                <th>Shipper Name</th>
                                                <th>Shipper Address Line1</th>
                                                <th>Shipper Address Line2</th>
                                                <th>Shipper Address Line3</th>
                                                <th>Shipper City</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br><br><br><br>
                                </div>
                            </fieldset>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

@endsection

 @push('js')

@endpush