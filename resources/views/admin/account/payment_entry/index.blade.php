@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="paymententry" role="tabpanel" aria-labelledby="paymententry-tab">
                    </div> -->
                    <!-- <h5 class="card-title text-center">PAYMENT ENTRY</h5><br> -->

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

                    <div class="detail_edit">
                        <div class="row">                                
                            <div class="col-md-6">
                                <fieldset class="form-group border p-3">
                                    <legend>Customer Details</legend>
                                    <form method="post" action={{route('add-data')}} onsubmit="return validateForm()" name="myForm">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Customer</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="customer_code" name="customer_code"> &nbsp;
                                                                    <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{old('customer_name')}}" onkeypress="search()">
                                                                </div>
                                                            </div>

                                                            <div class="row text-end mb-3">
                                                                @if($errors->has('customer_name'))
                                                            <div class="error">{{ $errors->first('customer_name') }}</div>
                                                            @endif
                                                            </div>

                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Branch</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="branch" name="branch" value="{{old('branch')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('branch'))
                                                                <div class="error">{{ $errors->first('branch') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- </form> --}}
                                </fieldset>
                                <fieldset class="form-group border p-3 mt-5">
                                    <legend>Receipt Amount</legend>
                                    {{-- <form> --}}
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Amount</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="amount" name="amount" value="{{old('amount')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('amount'))
                                                                <div class="error">{{ $errors->first('amount') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Mode</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="form-select" id="cash" name="cash" value="{{old('cash')}}">
                                                                        <option value="" @if(old('cash') == '') selected  @endif>Select</option>
                                                                        <option value="cash" @if(old('cash') == 'cash') selected  @endif>Cash</option>
                                                                        <option value="cash1" @if(old('cash') == 'cash1') selected  @endif>Cash1</option>
                                                                        <option value="cash2" @if(old('cash') == 'cash2') selected  @endif>Cash2</option>
                                                                    </select>
                                                                </div>
  
                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('cash'))
                                                                <div class="error">{{ $errors->first('cash') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Cheque No.</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="cheque" name="cheque" value="{{old('cheque')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('cheque'))
                                                                <div class="error">{{ $errors->first('cheque') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Bank Name</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="bankname" name="bankname" value="{{old('bankname')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('bankname'))
                                                                <div class="error">{{ $errors->first('bankname') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- </form> --}}
                                </fieldset>
                                <fieldset class="form-group border p-3 mt-5">
                                    <legend>Debit/Credit Details</legend>
                                    {{-- <form> --}}
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Receipt Type</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="form-select" id="receipt" name="receipt" value="{{old('receipt')}}">
                                                                        <option value="" @if(old('receipt') == '') selected  @endif>Select</option>
                                                                        <option value="general1" @if(old('receipt') == 'general1') selected  @endif>General Entry1</option>
                                                                        <option value="general2" @if(old('receipt') == 'general2') selected  @endif>General Entry2</option>
                                                                        <option value="general3" @if(old('receipt') == 'general3') selected  @endif>General Entry3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label">Debit Amt</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="debit_amt" name="debit_amt" value="{{old('debit_amt')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('debit_amt'))
                                                                <div class="error">{{ $errors->first('debit_amt') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Credit Amt</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="credit_amt" name="credit_amt" value="{{old('credit_amt')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('credit_amt'))
                                                                <div class="error">{{ $errors->first('credit_amt') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Debit No.</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="debit_no" name="debit_no" value="{{old('debit_no')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('debit_no'))
                                                                <div class="error">{{ $errors->first('debit_no') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Credit No.</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="credit_no" name="credit_no" value="{{old('credit_no')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('credit_no'))
                                                                <div class="error">{{ $errors->first('credit_no') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- </form> --}}
                                </fieldset>

                                <div class="card-footer">
                                    <div class="btn_group">
                                        <button class="btn btn-primary">New <i class="fa fa-folder-plus"></i></button>
                                        <button type="submit" class="btn btn-success">Save <i class="fa fa-save"></i></button>
                                        <button class="btn btn-info">View List <i class="fa fa-eye"></i></button>
                                        <button class="btn btn-warning">Verify <i class="fa fa-check-circle"></i></button>
                                        <button class="btn btn-danger">Close <i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <fieldset class="form-group border p-3 c1">
                                    <legend>Receipt No</legend>
                                    {{-- <form> --}}
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Receipt No.</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="receipt_no" name="receipt_no" value="{{old('receipt_no')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('receipt_no'))
                                                                <div class="error">{{ $errors->first('receipt_no') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Date</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('date'))
                                                                <div class="error">{{ $errors->first('date') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- </form> --}}
                                </fieldset>
                                <fieldset class="form-group border p-3 mt-5">
                                    <legend>Summary</legend>
                                    {{-- <form> --}}
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Opening Balance</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="opening_balance" name="opening_balance" value="{{old('opening_balance')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('opening_balance'))
                                                                <div class="error">{{ $errors->first('opening_balance') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Total Sales</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="total_sales" name="total_sales" value="{{old('total_sales')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('total_sales'))
                                                                <div class="error">{{ $errors->first('total_sales') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Total Receipt</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="total_receipt" name="total_receipt" value="{{old('total_receipt')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('total_receipt'))
                                                                <div class="error">{{ $errors->first('total_receipt') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Total Debit</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="total_debit" name="total_debit" value="{{old('total_debit')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('total_debit'))
                                                                <div class="error">{{ $errors->first('total_debit') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Total Credit</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="total_credit" name="total_credit" value="{{old('total_credit')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                    @if($errors->has('total_credit'))
                                                                <div class="error">{{ $errors->first('total_credit') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Total Balance</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control" id="total_balance" name="total_balance" value="{{old('total_balance')}}">
                                                                </div>

                                                                <div class="row text-end mb-3">
                                                                  @if($errors->has('total_balance'))
                                                                <div class="error">{{ $errors->first('total_balance') }}</div>
                                                                @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- </form> --}}
                                </fieldset>
                                <div class="payentry">
                                    <div class="row form-group">
                                        <div class="col-md-3">
                                            <label for="name" class="form-label">Remark</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="bind_input">
                                                <span class="spacing">:</span>
                                                <input type="text" class="form-control" id="remark" name="remark" value="{{old('remark')}}">
                                            </div>

                                            <div class="row text-end mb-3">
                                                @if($errors->has('remark'))
                                                <div class="error">{{ $errors->first('remark') }}</div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-3">
                                            <label for="name" class="form-label ">Verify Remark</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="bind_input">
                                                <span class="spacing">:</span>
                                                <input type="text" class="form-control" id="verify_remark" name="verify_remark" value="{{old('verify_remark')}}">
                                            </div>

                                            <div class="row text-end mb-3">
                                                @if($errors->has('verify_remark'))
                                                <div class="error">{{ $errors->first('verify_remark') }}</div>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="payentry">
                                    <div class="row form-group">
                                        <div class="col-md-6 d-flex">
                                            <input type="text" class="form-control" placeholder="Search here..">
                                            <button class="btn btn-secondary rounded-0 search-btn py-1">
                                                <span><i class="fa fa-search"></i></span>
                                                </button>
                                        </div>
                                    </div><br>
                                    <div class="row form-group">
                                        <div class="col-md-3">
                                            <label class="form-label">Receipt No.</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="bind_input">
                                                <span class="spacing">:</span>
                                                <input type="text" class="form-control" placeholder="Search here.." id="code" name="code"> &nbsp;
                                                <button class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

 @push('js')

 <script>
function validateForm() {

  let customer = document.forms["myForm"]["customer_name"].value;
  if (customer == "" ) {
    alert("customer must be filled out");
    return false;
  }

  let a = document.forms["myForm"]["branch"].value;
  if (a == "" ) {
    alert("branch must be filled out");
    return false;
  }

  let b = document.forms["myForm"]["amount"].value;
  if (b == "" ) {
    alert("amount must be filled out");
    return false;
  }

  let c = document.forms["myForm"]["cash"].value;
  if (c == "") {
    alert("cash must be filled out");
    return false;
  }

  let d = document.forms["myForm"]["cheque"].value;
  if (d == "") {
    alert("cheque must be filled out");
    return false;
  }

  let e = document.forms["myForm"]["bankname"].value;
  if (e == "") {
    alert("bankname must be filled out");
    return false;
  }

  let f = document.forms["myForm"]["receipt"].value;
  if (f == "") {
    alert("receipt must be filled out");
    return false;
  }

  let g = document.forms["myForm"]["debit_amt"].value;
  if (g == "") {
    alert("debit_amt must be filled out");
    return false;
  }

  let h = document.forms["myForm"]["credit_amt"].value;
  if (h == "") {
    alert("credit_amt must be filled out");
    return false;
  }

  let i = document.forms["myForm"]["debit_no"].value;
  if (i == "") {
    alert("debit_no must be filled out");
    return false;
  }

  let j = document.forms["myForm"]["credit_no"].value;
  if (j == "") {
    alert("credit_no must be filled out");
    return false;
  }

  let k = document.forms["myForm"]["receipt_no"].value;
  if (k == "") {
    alert("receipt_no must be filled out");
    return false;
  }

  let l = document.forms["myForm"]["date"].value;
  if (l == "") {
    alert("date must be filled out");
    return false;
  }

  let m = document.forms["myForm"]["opening_balance"].value;
  if (m == "") {
    alert("opening_balance must be filled out");
    return false;
  }

  let n = document.forms["myForm"]["total_sales"].value;
  if (n == "") {
    alert("total_sales must be filled out");
    return false;
  }

  let o = document.forms["myForm"]["total_receipt"].value;
  if (o == "") {
    alert("total_receipt must be filled out");
    return false;
  }

  let p = document.forms["myForm"]["total_debit"].value;
  if (p == "") {
    alert("total_debit must be filled out");
    return false;
  }

  let q = document.forms["myForm"]["total_credit"].value;
  if (q == "") {
    alert("total_credit must be filled out");
    return false;
  }

  let r = document.forms["myForm"]["total_balance"].value;
  if (r == "") {
    alert("total_balance must be filled out");
    return false;
  }

  let s = document.forms["myForm"]["remark"].value;
  if (s == "") {
    alert("remark must be filled out");
    return false;
  }

  let t = document.forms["myForm"]["verify_remark"].value;
  if (t == "") {
    alert("verify_remark must be filled out");
    return false;
  }
}

</script>
@endpush