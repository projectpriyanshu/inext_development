@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="cashentry" role="tabpanel" aria-labelledby="cashentry-tab">
                    </div> -->
                    <div class="detail_edit">
                        <div class="row">
                            <div class="col-md-7">
                                <fieldset class="form-group border p-3">
                                    <legend>Cash Amount</legend>
                                    <form action="{{route('cash-add')}}" method="POST">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="text-center cashentrytitle">Cash Entry</h4>
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
                                                        
                                                    <div class="col-md-12">
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Awb No.</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" id="awb_no" name="awb_no">
                                                                </div>

                                                                @if($errors->has('awb_no'))
                                                                <div class="error text-end">{{ $errors->first('awb_no') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Customer</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <div class="row form-row">
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" id="customer_name" name="customer_name" onkeyup="searchCustomer()" autocomplete="off" value="{{old('customer_code')}}">
 
                                                                            {{-- @if($errors->has('customer_name'))
                                                                            <div class="error text-end">{{ $errors->first('customer_name') }}</div>
                                                                             @endif --}}
                                                                    
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control" id="customer_code" name="customer_code" value="{{old('customer_code')}}">
                                                                        </div>

                                                                        @if($errors->has('customer_code'))
                                                                        <div class="error text-end">{{ $errors->first('customer_code') }}</div>
                                                                         @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Consignor</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="consignor" name="consignor" value="{{old('consignor')}}">
                                                                </div>

                                                                @if($errors->has('consignor'))
                                                                <div class="error text-end">{{ $errors->first('consignor') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Address</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
                                                                </div>

                                                                @if($errors->has('address'))
                                                                <div class="error text-end">{{ $errors->first('address') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label">Cash Amount</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" id="cash_amount" name="cash_amount" value="{{old('cash_amount')}}">
                                                                </div>

                                                                
                                                                @if($errors->has('cash_amount'))
                                                                <div class="error text-end">{{ $errors->first('cash_amount') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-5"></div>
                                                            <div class="col-md-7">
                                                                <hr class="red_line res_line">
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Received Amt</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" id="received_amt" name="received_amt" value="{{old('received_amt')}}">
                                                                </div>

                                                                @if($errors->has('received_amt'))
                                                                <div class="error text-end">{{ $errors->first('received_amt') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label">Recover</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="recover" name="recover" value="{{old('recover')}}">
                                                                </div>

                                                                @if($errors->has('recover'))
                                                                <div class="error text-end">{{ $errors->first('recover') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Refund</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" id="refund" name="refund" value="{{old('refund')}}">
                                                                </div>

                                                                @if($errors->has('refund'))
                                                                <div class="error text-end">{{ $errors->first('refund') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Recv Date</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}">
                                                                </div>

                                                                @if($errors->has('date'))
                                                                <div class="error text-end">{{ $errors->first('date') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Rcpt No</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" id="rcpt_no" name="rcpt_no" value="{{old('rcpt_no')}}">
                                                                </div>

                                                                @if($errors->has('rcpt_no'))
                                                                <div class="error text-end">{{ $errors->first('rcpt_no') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label">Balance</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="number" class="form-control" id="balance" name="balance" value="{{old('balance')}}">
                                                                </div>

                                                                @if($errors->has('balance'))
                                                                <div class="error text-end">{{ $errors->first('balance') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Remark</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="remark" name="remark" value="{{old('remark')}}">
                                                                </div>

                                                                @if($errors->has('remark'))
                                                                <div class="error text-end">{{ $errors->first('remark') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="btn_group b4 button_media text-right">
                                                            <input type="hidden" name="id" id="id" value="">
                                                            <button class="btn btn-primary rounded-0">New <i class="fa fa-folder-plus"></i></button>
                                                            <button type="submit" class="btn btn-success rounded-0" >Save <i class="fa fa-save"></i></button>
                                                            <button class="btn btn-danger rounded-0">Close <i class="fa fa-close"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </fieldset>
                            </div>
                            <div class="col-md-5">
                                <fieldset class="form-group border p-3 deliveryfield">
                                    <legend>Total Rows: 0</legend>
                                    <form>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea rows="21" class="branch1 text"></textarea>
                                                        <div class="row form-group mt-2">
                                                            <div class="col-md-5">
                                                                <label class="form-label">Total Amount</label>
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
                                                                <label class="form-label">Refund</label>
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
                                                                <label class="form-label">Recover</label>
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
                                                                <label class="form-label">Balance</label>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

 @push('js')
  <script type="text/javascript">

    
 </script> 
@endpush