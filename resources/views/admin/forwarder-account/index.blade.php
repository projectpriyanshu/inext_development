@extends('layouts.main')
@section('content')

<div class="background_image">
        <!-- <div class=""> -->
        <div class="card-body">
            <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
            <div class="mt-5">
                <!-- <div class="tab-pane fade show active" id="forwarderaccount" role="tabpanel"
                        aria-labelledby="forwarderaccount-tab"> -->
               
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">FORWARDER MASTER</legend>
                            <form action="{{route('forwarder-account-add')}}" method="post">
                                @csrf
                            <div class="card form mt-2">
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
                                            <div class="row code form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Search</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Search here..." name="search" id="search">
                                                        <button type="button" id="search_btn" class="btn btn-common rounded-0 save-btn">
                                                            <span><i class="fa fa-search"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-8">
                                                    <hr class="yellow_line">
                                                </div>
                                            </div>
                                            <div class="row code form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Code</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="code" id="code" value="{{old('code')}}">
                                                        <button type="button" class="btn btn-common rounded-0 " id="check_code"><i
                                                                class="fa fa-search"></i></button>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('code'))
                                                    <div class="error">{{ $errors->first('code') }}</div>
                                                @endif
                                            </div>
                                            <div class="row name form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('name'))
                                                    <div class="error">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-8">
                                                    <hr class="yellow_line">
                                                </div>
                                            </div>
                                            <div class="row address form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('address'))
                                                    <div class="error">{{ $errors->first('address') }}</div>
                                                @endif
                                            </div>

                                                <div class="row city form-group">
                                                    <div class="col-md-4">
                                                        <label for="name" class="form-label ">City</label>
                                                    </div>
                                                 
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <div class="row form-row">
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="city_code" id="city_code" readonly value="{{old('city_code')}}">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="city_id" id="city_search" value="{{old('city_id')}}" onkeyup ="deleteData()" placeholder="Search City..">
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  
                                               
                                            <div class="row text-end mb-3">
                                                @if($errors->has('city_id'))
                                                    <div class="error">{{ $errors->first('city_id') }}</div>
                                                @endif
                                            </div>

                                            <div class="row state form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">State</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <div class="row form-row">
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" id="state_code" name="state_code" readonly value="{{old('state_code')}}">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="state" id="state" readonly value="{{old('state')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('state'))
                                                    <div class="error">{{ $errors->first('state') }}</div>
                                                @endif
                                            </div>

                                            <div class="row pincode form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Pincode</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="pincode" id="pincode" value="{{old('pincode')}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row text-end mb-3">
                                                @if($errors->has('pincode'))
                                                    <div class="error">{{ $errors->first('pincode') }}</div>
                                                @endif
                                            </div>

                                            <div class="row email form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Telephone</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="telephone" id="telephone" value="{{old('telephone')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('telephone'))
                                                    <div class="error">{{ $errors->first('telephone') }}</div>
                                                @endif
                                            </div>

                                            <div class="row email form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Email Id</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('email'))
                                                    <div class="error">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>

                                            <div class="row website form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Website</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="website" id="website" value="{{old('website')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('website'))
                                                    <div class="error">{{ $errors->first('website') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row code form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Bank Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{old('bank_name')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('bank_name'))
                                                    <div class="error">{{ $errors->first('bank_name') }}</div>
                                                @endif
                                            </div>
                                            <div class="row name form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">A/C No</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="account_no" id="account_no" value="{{old('account_no')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('account_no'))
                                                    <div class="error">{{ $errors->first('account_no') }}</div>
                                                @endif
                                            </div>
                                            <div class="row  form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">IFSC</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" value="{{old('ifsc_code')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('ifsc_code'))
                                                    <div class="error">{{ $errors->first('ifsc_code') }}</div>
                                                @endif
                                            </div>

                                            <div class="row  form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Bank Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="bank_address" id="bank_address" value="{{old('bank_address')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('bank_address'))
                                                    <div class="error">{{ $errors->first('bank_address') }}</div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"></div>
                                                <div class="col-md-8">
                                                    <hr class="yellow_line">
                                                </div>
                                            </div>
                                            <div class="row  form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">GST No</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="gst_no" id="gstno" value="{{old('gst_no')}}" onblur="verifyGstStatewise()">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('gst_no'))
                                                    <div class="error">{{ $errors->first('gst_no') }}</div>
                                                @endif
                                            </div>
                                            <div class="row  form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">PAN No</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="pan_no" id="pan_no" value="{{old('pan_no')}}" return onblur="checkPan()">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('pan_no'))
                                                    <div class="error">{{ $errors->first('pan_no') }}</div>
                                                @endif
                                            </div>

                                            <div class="row  form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">CIN No</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="cin_no" id="cin_no" value="{{old('cin_no')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-end mb-3">
                                                @if($errors->has('cin_no'))
                                                    <div class="error">{{ $errors->first('cin_no') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="card-footer text-right">
                                <input type="hidden" name="id" id="id" value="">
                                <a href="{{route('forwarder-account-list')}}" class="btn btn-secondary save-btn mr-3"> List
                                <i class="fa fa-list ms-2"></i>
                                </a>
                                <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_forwarder"> Edit
                                <i class="fa fa-edit ms-2"></i>
                                </button>
                                <button type="submit" class="btn btn-success save-btn" onclick="return validate()">Save
                                <i class="fa fa-save ms-2"></i>
                                </button>
                                </div>

                                
                            </div>
                            </form>
                        </fieldset>
                    </div>
              
                <!-- </div> -->
            </div>
        </div>
        <!-- </div> -->
    </div>
@endsection
@push('js')
    
<script type="text/javascript">
    function validate(){
    var cde = $("input[name='code']").val();
    if(cde.length < 1){
        alert('Please fill the code');
        $("input[name='code']").focus();
        return false;
    }
    var nme = $("input[name='name']").val();
    if(nme.length < 1){
        alert('name is required');
        $("input[name='name']").focus();
        return false;
    }
    var ADD = $("input[name='address']").val();
    if(ADD.length < 1){
        alert('address is required');
        $("input[name='address']").focus();
        return false;
    }
    var city = $("input[name='city_id']").val();
    if(city.length < 1){
        alert('Please fill the city_id');
        $("input[name='city_id']").focus();
        return false;
    }
    var state = $("input[name='state']").val();
    if(state.length < 1){
        alert('state is required');
        $("input[name='state']").focus();
        return false;
    }
    var pin = $("input[name='pincode']").val();
    if(pin.length < 1 || isNaN(pin)){
        alert('pincode is required and must be number');
        $("input[name='pincode']").focus();
        return false;
    }
    var tel = $("input[name='telephone']").val();
    if(tel.length !=10 || isNaN(tel) ){
        alert('Telephone must be 10 digit and Number');
        $("input[name='telephone']").focus();
        return false;
    }
    var email = $("input[name='email']").val();
    if(email.length <1 ){
        alert('email is required');
        $("input[name='email']").focus();
        return false;
    }
    var web = $("input[name='website']").val();
    if(web.length <1 ){
        alert('website is required');
        $("input[name='website']").focus();
        return false;
    }
    var bank = $("input[name='bank_name']").val();
    if(bank.length <1 ){
        alert('bank_name is required');
        $("input[name='bank_name']").focus();
        return false;
    }
    var account = $("input[name='account_no']").val();
    if(account.length < 1 || isNaN(account)){
        alert('account_no is required and must be a number');
        $("input[name='account_no']").focus();
        return false;
    }
    var ifsc = $("input[name='ifsc_code']").val();
    if(ifsc.length <1 ){
        alert('ifsc_code is required');
        $("input[name='ifsc_code']").focus();
        return false;
    }
    var bank_add = $("input[name='bank_address']").val();
    if(bank_add.length <1 ){
        alert('bank_address is required');
        $("input[name='bank_address']").focus();
        return false;
    }
    var GST = $("input[name='gst_no']").val();
    if(GST.length <1 ){
        alert('gst_no is required');
        $("input[name='gst_no']").focus();
        return false;
    }
   
    var cin = $("input[name='cin_no']").val();
    if(cin.length <1 ){
        alert('cin_no is required');
        $("input[name='cin_no']").focus();
        return false;
    }

    }
   $(document).ready(function(){
      $('#check_code').click(function(){
         var id = $('#id').val();
         var code = $('#code').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: "{{route('forwarder-account-index')}}", 
            data: {'_token':token,'code':code,'id':id},
            success: function(result){
               var forwarder = jQuery.parseJSON( result );
               console.log(forwarder);
               $('#id').val(forwarder.id);
               $('#code').val(forwarder.code).prop('disabled', true);
               $('#name').val(forwarder.name).prop('disabled', true);
               $('#email').val(forwarder.email).prop('disabled', true);
               $('#address').val(forwarder.address).prop('disabled', true);
               $('#city_search').val(forwarder.city_name).prop('disabled', true);
               $('#city_code').val(forwarder.city_code).prop('disabled', true);
               $('#state_code').val(forwarder.state_code).prop('disabled', true);
               $('#state').val(forwarder.state).prop('disabled', true);
               $('#pincode').val(forwarder.pincode).prop('disabled', true);
               $('#telephone').val(forwarder.telephone).prop('disabled', true);
               $('#website').val(forwarder.website).prop('disabled', true);
               $('#bank_name').val(forwarder.bank_name).prop('disabled', true);
               $('#account_no').val(forwarder.account_no).prop('disabled', true);
               $('#ifsc_code').val(forwarder.ifsc_code).prop('disabled', true);
               $('#bank_address').val(forwarder.bank_address).prop('disabled', true);
               $('#gstno').val(forwarder.gst_no).prop('disabled', true);
               $('#pan_no').val(forwarder.pan_no).prop('disabled', true);
               $('#cin_no').val(forwarder.cin_no).prop('disabled', true);
               if(forwarder.status == '400')
               {
                  $('#id').val();
                  $('#name').val();
                  $('#code').prop('disabled', false).val();
                  $('#email').val();
                  $('#name').prop('disabled', false);
                  $('#email').prop('disabled', false);
                  $('#address').prop('disabled', false);
                  $('#city_search').prop('disabled', false);
                  $('#city_code').prop('disabled', false);
                  $('#state_code').prop('disabled', true);
                  $('#state').prop('disabled', true);
                  $('#pincode').prop('disabled', false);
                  $('#website').prop('disabled', false);
                  $('#bank_name').prop('disabled', false);
                  $('#account_no').prop('disabled', false);
                  $('#ifsc_code').prop('disabled', false);
                  $('#bank_address').prop('disabled', false);
                  $('#gstno').prop('disabled', false);
                  $('#pan_no').prop('disabled', false);
                  $('#cin_no').prop('disabled', false);
                  $('#alert-danger').text(forwarder.message);
               }
            }  
         });
      });

      $('#search_btn').click(function(){
         var search = $('#search').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: "{{route('forwarder-account-index')}}", 
            data: {'_token':token,'search':search},
            success: function(result){
               var forwarder = jQuery.parseJSON( result );
               $('#id').val(forwarder.id);
               $('#code').val(forwarder.code).prop('disabled', true);
               $('#name').val(forwarder.name).prop('disabled', true);
               $('#email').val(forwarder.email).prop('disabled', true);
               $('#address').val(forwarder.address).prop('disabled', true);
               $('#city_search').val(forwarder.city_name).prop('disabled', true);
               $('#city_code').val(forwarder.city_code).prop('disabled', true);
               $('#state_code').val(forwarder.state_code).prop('disabled', true);
               $('#state').val(forwarder.state).prop('disabled', true);
               $('#pincode').val(forwarder.pincode).prop('disabled', true);
               $('#telephone').val(forwarder.telephone).prop('disabled', true);
               $('#website').val(forwarder.website).prop('disabled', true);
               $('#bank_name').val(forwarder.bank_name).prop('disabled', true);
               $('#account_no').val(forwarder.account_no).prop('disabled', true);
               $('#ifsc_code').val(forwarder.ifsc_code).prop('disabled', true);
               $('#bank_address').val(forwarder.bank_address).prop('disabled', true);
               $('#gstno').val(forwarder.gst_no).prop('disabled', true);
               $('#pan_no').val(forwarder.pan_no).prop('disabled', true);
               $('#cin_no').val(forwarder.cin_no).prop('disabled', true);
               if(forwarder.status == '400')
               {
                  $('#id').val();
                  $('#name').val();
                  $('#email').val();
                  $('#name').prop('disabled', false);
                  $('#email').prop('disabled', false);
                  $('#address').prop('disabled', false);
                  $('#city_search').prop('disabled', false);
                  $('#city_code').prop('disabled', false);
                  $('#state_code').prop('disabled', true);
                  $('#state').prop('disabled', true);
                  $('#pincode').prop('disabled', false);
                  $('#telephone').prop('disabled', false);
                  $('#website').prop('disabled', false);
                  $('#bank_name').prop('disabled', false);
                  $('#account_no').prop('disabled', false);
                  $('#ifsc_code').prop('disabled', false);
                  $('#bank_address').prop('disabled', false);
                  $('#gstno').prop('disabled', false);
                  $('#pan_no').prop('disabled', false);
                  $('#cin_no').prop('disabled', false);
                  $('#alert-danger').text(forwarder.message);
               }
            } 
         });
      });

      $('#edit_forwarder').click(function() 
      {
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
         $('#email').prop('disabled', false);
         $('#address').prop('disabled', false);
         $('#city_search').prop('disabled', false);
         $('#city_code').prop('disabled', false);
         $('#state_code').prop('disabled', true);
         $('#state').prop('disabled', true);
         $('#pincode').prop('disabled', false);
         $('#telephone').prop('disabled', false);
         $('#website').prop('disabled', false);
         $('#bank_name').prop('disabled', false);
         $('#account_no').prop('disabled', false);
         $('#ifsc_code').prop('disabled', false);
         $('#bank_address').prop('disabled', false);
         $('#gstno').prop('disabled', false);
         $('#pan_no').prop('disabled', false);
         $('#cin_no').prop('disabled', false);
         
      })
   });
      
       var token = "{{csrf_token()}}";
        $( "#city_search" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url:"{{route('search-city')}}",
            type: 'post',
            dataType: "json",
            data: {
               _token: token,
               search: request.term
            },
            success: function( data ) {
               response( data );
            }       
          });
        },
        
        select: function (event, ui) {
           $('#city_search').val(ui.item.label); 
           $('#city_code').val(ui.item.city_code); 
           $('#state_code').val(ui.item.state_code);
           $('#state').val(ui.item.state);
           return false;
        }
      });

      function deleteData(){
          var data = $('#city_search').val();
          if(data.length > 1)
          {
              $('#city_code').val(''); 
              $('#state_code').val('');
              $('#state').val('');
          }
      }
     
      
</script>
@endpush
