@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="custominvoice" role="tabpanel" aria-labelledby="custominvoice-tab">
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Custom Invoice</legend>
                                <form class="">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row code form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Awb No.</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row name form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Shipper Name</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row name form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Contact Person</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Address</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing invisible">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing invisible">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">City</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">State</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Zip Code</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Dest</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Tel No.</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">KYC Type</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <select class="form-select">
                                                                    <option>GSTIN (Normal)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row gststatecode form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">KYC No.</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row name form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Comm Inv.</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="checkbox">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row name form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">IEC Code</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row gststatecode form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Terms of
                                                                DLV/PYMNT</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>`
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Awb Wise Custom Invoice</h5>
                                                    <div class="row code form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Invoice No.</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row code form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Invoice Date</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row name form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Consignee</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row gststatecode form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Contact Person</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Address</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing invisible">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing invisible">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">City</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">State</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Zip Code</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Dest</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Telephone No.</label>
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
                                            <fieldset class="form-group border p-3">
                                                <form>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="table-responsive custominvoice4">
                                                                        <table class="table-bordered customtable">
                                                                            <thead class="customtable2">
                                                                                <tr>
                                                                                    <th>BOX</th>
                                                                                    <th>DESCRIPTION</th>
                                                                                    <th>HSNCODE</th>
                                                                                    <th>QTY</th>
                                                                                    <th>RATE</th>
                                                                                    <th>AMOUNT</th>
                                                                                    <th>ACTION</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="customtable3">
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-success"><i class="fa fa-folder-plus"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="1">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="1">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="1">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="1">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="1">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="1">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="1">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="1">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="1">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="1">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="1">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" value="xyz">
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div><br>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Reason For Export</label>
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
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Select Header</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="bind_input">
                                                                                <span class="spacing">:</span>
                                                                                <select class="form-select">
                                                                                    <option>INVOICE</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Select Printer</label>
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
                                                                    <div class="row form-group">
                                                                        <div class="col-md-4">
                                                                            <label for="name" class="form-label ">Invoice Total Amount</label>
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
                                                        </div>
                                                    </div>
                                                </form>
                                            </fieldset>
                                        </div>
                                        <div class="card-footer">
                                            <div class="btn_group b4">
                                                <button class="btn btn-primary new-btn">New
                                                    <i class="fa fa-folder-plus"></i>
                                                </button>
                                                <button class="btn btn-success show/print-btn">Show/Print
                                                    <i class="fa fa-print"></i>
                                                </button>
                                                <button class="btn btn-danger delete-btn">Delete
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <button class="btn btn-dark exit-btn">Exit
                                                    <i class="fa fa-times"></i>
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
    </div>
@endsection

 @push('js')

@endpush