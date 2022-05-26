@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <!-- <div class="tab-pane fade show active" id="pickupdrs" role="tabpanel" aria-labelledby="pickupdrs-tab">
                    </div> -->
                    <div class="detail_edit">
                        <div class="row">
                            <div class="col-md-7">
                                <fieldset class="form-group border p-3">
                                    <legend>Pickup DRS</legend>
                                    <form method="post" action="{{route('pickup.store')}}">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    @if(session()->has('success'))
                                                    <div class="alert alert-success">
                                                    {{ session()->get('success') }}
                                                    </div>
                                                    @endif
                                                    @if(session()->has('errors'))
                                                    <div class="alert alert-danger">
                                                        {{ session()->get('error') }}
                                                    </div>
                                                    @endif
                                                    <span id="alert-success" style="color: green;"></span>
                                                    <span id="alert-danger" style="color: red;"></span>                                                
                                                    
                                                    <div class="col-md-12">
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label">Company</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="form-select" id="company" name="company" value="{{old('company')}}">
                                                                        <option>company1</option>
                                                                        <option>company2</option>
                                                                        <option>company3</option>
                                                                    </select>
                                                                </div>

                                                                @if($errors->has('name'))
                                                                <div class="error text-end">{{ $errors->first('company') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">DRS No.</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"  id="drs_no" name="drs_no" value="{{old('drs_no')}}"> &nbsp;
                                                                    <button class="btn btn-primary rounded-0">New</button>
                                                                </div>

                                                                @if($errors->has('name'))
                                                                <div class="error text-end">{{ $errors->first('drs_no') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Date</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="date" class="form-control" id="date" name="date"  value="{{old('date')}}">
                                                                </div>

                                                                @if($errors->has('name'))
                                                                <div class="error text-end">{{ $errors->first('date') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label">Time</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="time" class="form-control" id="time" name="time" value="{{old('time')}}">
                                                                </div>
                                                                
                                                                @if($errors->has('name'))
                                                                <div class="error text-end">{{ $errors->first('time') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label">Location</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" class="form-control"  id="city_codenoparam" name="city_code"> &nbsp;
                                                                    <input type="text" class="form-control" id="citynoparam" name="city" value="{{old('city')}}">
                                                                </div>

                                                                @if($errors->has('name'))
                                                                <div class="error text-end">{{ $errors->first('city') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">From Date</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="date" class="form-control" id="from_date" name="from_date" value="{{old('from_date')}}">
                                                                </div>

                                                                @if($errors->has('name'))
                                                                <div class="error text-end">{{ $errors->first('from_date') }}</div>
                                                                 @endif
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">To Date</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="date" class="form-control" id="to_date" name="to_date" value="{{old('to_date')}}">
                                                                </div>

                                                                @if($errors->has('name'))
                                                                <div class="error text-end">{{ $errors->first('to_date') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label ">Pickup Boy</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <select class="form-select" id="pickup_boy" name="pickup_boy" value="{{old('pickup_boy')}}">
                                                                        <option>boy1</option>
                                                                        <option>boy2</option>
                                                                        <option>boy3</option>
                                                                    </select>
                                                                </div>

                                                                
                                                                @if($errors->has('name'))
                                                                <div class="error text-end">{{ $errors->first('pickup_boy') }}</div>
                                                                 @endif

                                                            </div>
                                                        </div>
                                                        <div class="btn_group b4 button_media text-right">
                                                            <input type="hidden" id="id" value="" name="id">
                                                            <button type="submit" class="btn btn-primary rounded-0">Create <i class="fa fa-folder-plus"></i></button>
                                                            <button class="btn btn-success rounded-0" type="button" id="print_btn" onclick="print()">Print <i class="fa fa-print"></i></button>
                                                            <button class="btn btn-danger rounded-0">Close <i class="fa fa-close"></i></button>
                                                        </div>
                                                        <hr>
                                                        <div class="row form-group">
                                                            <div class="col-md-5">
                                                                <label for="name" class="form-label">Search DRS</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="bind_input">
                                                                     <span class="spacing">:</span>
                                                                    {{-- <select class="form-select" id="code" name="code">
                                                                     <option>1</option> 
                                                                    </select> &nbsp; --}}
                                                                    <input type="text" class="form-control" id="code" name="code" value="{{old('code')}}">
                                                                    <button type="button" class="btn btn-primary rounded-0 searchbtn" id="search_btn">
                                                                        <span><i class="fa fa-search"></i></span>Search
                                                                    </button>
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
                            <div class="col-md-5">
                                <fieldset class="form-group border p-3 deliveryfield">
                                    <legend>Pickup Details</legend>
                                    <form id="print_data"  class="branch1 text">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                       <p>Company : <span id="drscompany" class="text-danger"></span></p>
                                                       <p>DRS No : <span id="drsno" class="text-danger"></span></p>
                                                       <p>Date : <span id="dsrdate" class="text-danger"></span></p>
                                                       <p>Time : <span id="dsrtime" class="text-danger"></span></p>
                                                       <p>City Code: <span id="ccode" class="text-danger"></span></p>
                                                       <p>City Name: <span id="cname" class="text-danger"></span></p>
                                                       <p>From Date: <span id="fromdate" class="text-danger"></span></p>
                                                       <p>To Date: <span id="todate" class="text-danger"></span></p>
                                                       <p>Pickup Boy: <span id="pickupboy" class="text-danger"></span></p>
                                                         </div>
                                                        {{-- <textarea rows="22"  class="branch1 text">
                                                           
                                                        </textarea> --}}
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
    // pickup drs search
    $(document).ready(function(){
        $('#search_btn').click(function(){
            var code = $('#code').val();
            $.ajax({
                    method:"GET",
                    url: "{{route('pickup-drs.index')}}", 
                    data: {
                       '_token':"{{csrf_token()}}",
                       'code':code,
                    },
                    success: function(res){
                    console.log(res)
                    var pickup = res.data;
                    if(res.status == true){
                        $('#drscompany').html(pickup.company);
                        $('#drsno').html(pickup.drs_no);
                        $('#dsrdate').html(pickup.date);
                        $('#dsrtime').html(pickup.time);
                        $('#ccode').html(pickup.citycode);
                        $('#cname').html(pickup.cityname);
                        $('#fromdate').html(pickup.from_date);
                        $('#todate').html(pickup.to_date);
                        $('#pickupboy').html(pickup.pickup_boy);
                    }else{
                        $('#drscompany').html('');
                        $('#drsno').html('');
                        $('#dsrdate').html('');
                        $('#dsrtime').html('');
                        $('#ccode').html('');
                        $('#cname').html('');
                        $('#fromdate').html('');
                        $('#todate').html('');
                        $('#pickupboy').html('');
                    }
                }
            });
        });
    });
    // pickup drs search
</script>
@endpush

