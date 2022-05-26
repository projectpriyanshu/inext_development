@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="excelforediimport" role="tabpanel"
                        aria-labelledby="excelforediimport-tab">
                    </div> -->
                    <!-- <h5 class="card-title text-center">IMPORT EDI EXCEL FILE</h5> -->
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Excel file for import EDI</legend>
                                <form class="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="ediimport text-center edi1">
                                                        <input type="radio" checked> &nbsp; ECM-DOCS &nbsp;&nbsp;
                                                        <input type="radio"> &nbsp; ECM-NDOCS &nbsp;&nbsp;
                                                        <input type="radio"> &nbsp; CBE XII-XIII
                                                    </div>
                                                    <div class="text-center">
                                                        <input type="radio"> &nbsp; Date Wise &nbsp;&nbsp;
                                                        <input type="radio" checked> &nbsp; AL-MawbNo Wise
                                                    </div><br>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">AL-MawbNo</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <span class="text-center font-weight-bold" style="color: red;">[OR]</span>
                                                    </div>
                                                    <div class="row form-row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Customer</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">From Date</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">To Date</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="" class="font-weight-bold d1"><u>Download Template</u> <i class="fa fa-download"></i></a>
                                            <div class="btn_group float-right b2">
                                                <button class="btn btn-primary rounded">EDI Excel <i class="fa fa-file"></i></button>
                                                <button class="btn btn-danger rounded">Close <i class="fa fa-times"></i></button>
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