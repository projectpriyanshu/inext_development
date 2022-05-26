@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="company" role="tabpanel" aria-labelledby="company-tab">
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Company Profile</legend>
                                @php
                                foreach ($errors->all('<li>:message</li>') as $message)
                                    {
                                        echo $message;
                                    }
                                    @endphp
                                 <form class="" method="POST" action="{{url('company-prof.add')}}" enctype="multipart/form-data" >
                                @csrf
                                    <div class="card">
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
                                                <div class="col-md-6">
                                                    <div class="row code form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Code</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" name="code" id="code" value="{{old('code')}}">
                                                                
                                                                <button type="button" class="btn btn-common rounded-0 save-btn" id="check_code">
                                                                    <span><i class="fa fa-search"></i></span>
                                                                </button>
                                                            </div>
                                                            @if($errors->has('name'))
						                                         <div class="error text-end">{{ $errors->first('code') }}</div>
						                           	            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row name form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Name</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('name') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-8">
                                                            <hr class="yellow_line">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Address</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text"  name="address" id="address" class="form-control" value="{{old('address')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('address') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Country</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                              <div class="row form-row">
                                                                  <div class="col-md-4">
                                                                      <input type="text" name="country_code" id="country_code" class="form-control"  value="{{old('code')}}">
                                                                  </div>
                                                                  <div class="col-md-8">
                                                                      <input type="text" name="country" id="country" class="form-control" onkeyup="searchCountry()" autocomplete="off" value="{{old('country')}}">
                                                                  </div>
                                                                  @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('country') }}</div>
						                           	@endif
                                                              </div>
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
                                                              <div class="row form-row">
                                                                  <div class="col-md-4">
                                                                      <input type="text" name="state_code" id="state_code" class="form-control" value="{{old('state')}}">
                                                                  </div>
                                                                  <div class="col-md-8">
                                                                      <input type="text" name="state" id="state" class="form-control" onkeyup="searchState()" autocomplete="off" value="{{old('code')}}">
                                                                  </div>
                                                                  @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('state') }}</div>
						                           	@endif
                                                              </div>
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
                                                              <div class="row form-row">
                                                                  <div class="col-md-4">
                                                                      <input type="text" name="city_code" id="city_code" class="form-control" value="{{old('code')}}">
                                                                  </div>
                                                                  <div class="col-md-8">
                                                                      <input type="text" name="city" id="city" class="form-control" onkeyup="searchCity()" autocomplete="off" value="{{old('city')}}">
                                                                  </div>
                                                                  @if($errors->has('name'))
                                                                    <div class="error text-end">{{ $errors->first('city') }}</div>
                                                                    @endif
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Pincode</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="pincode" id="pincode" class="form-control" value="{{old('pincode')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('pincode') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Telephone</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="telephone" id="telephone" class="form-control" value="{{old('telephone')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('telephone') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row  form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Email Id</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('email') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Website</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="website" id="website" class="form-control" value="{{old('website')}}">
                                                            </div>
                                                        </div>
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
                                                                <input type="text" name="bank_name" id="bank_name" class="form-control" value="{{old('bank_name')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('bank name') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>
                                                    <div class="row name form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">A/C No</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="account_no" id="account_no"  class="form-control" value="{{old('account_no')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('account no') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">IFSC</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="ifsc" id="ifsc" class="form-control" value="{{old('ifsc')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('ifsc') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Bank Addres</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="bank_address" id="bank_address" class="form-control" value="{{old('bank_address')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-8">
                                                            <hr class="yellow_line">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">GST No</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="gst_no" id="gst_no" class="form-control" value="{{old('gst_no')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('gst') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">PAN No</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="pan_no" class="form-control" id="pan_no" value="{{old('pan_no')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('pan no') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">CIN No</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="cin_no" id="cin_no" class="form-control" value="{{old('cin_no')}}">
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('cin no') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Logo Image</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="file" name="file" id="file" class="form-control" > 
                                                                
                                                            </div>
                                                            @if($errors->has('name'))
						                              <div class="error text-end">{{ $errors->first('file') }}</div>
						                           	@endif
                                                        </div>
                                                    </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                        <input type="hidden" name="id" id="id" value="">
                                        <a href="{{url('company-prof-list')}}" class="btn btn-secondary save-btn mr-3"> List
                                        <i class="fa fa-list ms-2"></i>
                                        </a>
                                         
                                        <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_company"> Edit
                                        <i class="fa fa-edit ms-2"></i>
                                        </button>
                                        <button class="btn btn-success save-btn" onclick="return validate()">Save
                                        <i class="fa fa-save ms-2"></i>
                                        </button>
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
<script type="text/javascript">

function validate(){
    var cde = $("input[name='code']").val();
    if(cde.length < 1){
        alert('The code field is required');
        $("input[name='code']").focus();
        return false;
    }
    var nme = $("input[name='name']").val();
    if(nme.length < 1){
        alert('The name field is required');
        $("input[name='name']").focus();
        return false;
    }
    var add = $("input[name='address']").val();
    if(add.length < 1){
        alert('The adress field is required');
        $("input[name='name']").focus();
        return false;
    }
    var cntry = $("input[name='country']").val();
    if(cntry.length < 1){
        alert('The country field is required');
        $("input[name='country']").focus();
        return false;
    }
    var stat = $("input[name='state']").val();
    if(stat.length < 1){
        alert('The state field is required');
        $("input[name='state']").focus();
        return false;
    }
    var city= $("input[name='city']").val();
    if(city.length < 1){
        alert('The xity field is required');
        $("input[name='city']").focus();
        return false;
    }
    var pin= $("input[name='pincode']").val();
    if(isNaN(pin)){
        alert('The pin field is required');
        $("input[name='pincode']").focus();
        return false;
    }
    var tel= $("input[name='telephone']").val();
    if(tel.length != 10 || isNaN(tel)){
        alert('The telephne field is required AND must be 10 digite');
        $("input[name='telephone']").focus();
        return false;
    }
    var email= $("input[name='email']").val();
    if(email.length < 1){
        alert('The email field is required');
        $("input[name='email']").focus();
        return false;
    }
    var website= $("input[name='website']").val();
    if(website.length < 1){
        alert('The website field is required');
        $("input[name='website']").focus();
        return false;
    }
    var bank= $("input[name='bank_name']").val();
    if(bank.length < 1){
        alert('The bank name field is required');
        $("input[name='bank_name']").focus();
        return false;
    }
    var ac= $("input[name='account_no']").val();
    if(tel.length < 1 || isNaN(tel)){
        alert('The account no field is required');
        $("input[name='account_no']").focus();
        return false;
    }
    var ifsc= $("input[name='ifsc']").val();
    if(ifsc.length < 1){
        alert('The ifsc field is required');
        $("input[name='ifsc']").focus();
        return false;
    }
    var banka= $("input[name='bank_address']").val();
    if(banka.length < 1){
        alert('The bank address field is required');
        $("input[name='bank_address']").focus();
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
            url: "{{route('company.index')}}", 
            data: {'_token':token,'code':code,'id':id},
            success: function(result){
               var company = jQuery.parseJSON( result );
                $('#id').val(company.id).prop('disabled', true);
                $('#name').val(company.name).prop('disabled', true);
                $('#address').val(company.address).prop('disabled', true);
                $('#country_code').val(company.country_code).prop('disabled', true);
                $('#country').val(company.country).prop('disabled', true);
                $('#state_code').val(company.state_code).prop('disabled', true);
                $('#state').val(company.state).prop('disabled', true);
                $('#city_code').val(company.city_code).prop('disabled', true);
                $('#city').val(company.city).prop('disabled', true);
                $('#pincode').val(company.pincode).prop('disabled', true);
                $('#telephone').val(company.telephone).prop('disabled', true);
                $('#email').val(company.email).prop('disabled', true);
                $('#website').val(company.website).prop('disabled', true);
                $('#bank_name').val(company.bank_name).prop('disabled', true);
                $('#account_no').val(company.account_no).prop('disabled', true);
                $('#ifsc').val(company.ifsc).prop('disabled', true);
                $('#bank_address').val(company.bank_address).prop('disabled', true);
                $('#gst_no').val(company.gst_no).prop('disabled', true);
                $('#pan_no').val(company.pan_no).prop('disabled', true);
                $('#cin_no').val(company.cin_no).prop('disabled', true);
                if(company.status == '400')
               {

                    $('#name').prop('disabled', false);
                    $('#address').prop('disabled', false);
                    $('#country_code').prop('disabled', false);
                    $('#country').prop('disabled', false);
                    $('#state_code').prop('disabled', false);
                    $('#state').prop('disabled', false);
                    $('#city_code').prop('disabled', false);
                    $('#city').prop('disabled', false);
                    $('#pincode').prop('disabled', false);
                    $('#telephone').prop('disabled', false);
                    $('#email').prop('disabled', false);
                    $('#website').prop('disabled', false);
                    $('#bank_name').prop('disabled', false);
                    $('#account_no').prop('disabled', false);
                    $('#ifsc').prop('disabled', false);
                    $('#bank_address').prop('disabled', false);
                    $('#gst_no').prop('disabled', false);
                    $('#pan_no').prop('disabled', false);
                    $('#cin_no').prop('disabled', false);
                    $('#alert-danger').text(company.message);
                    }
                    }  
                    });
            });

            $('#edit_company').click(function() 
            {
                $('#id').prop('disabled', false);
                $('#code').prop('disabled', false);
                $('#name').prop('disabled', false);
                $('#address').prop('disabled', false);
                $('#country').prop('disabled', false);
                $('#country_code').prop('disabled', false);
                $('#state').prop('disabled', false);
                $('#state_code').prop('disabled', false);
                $('#city').prop('disabled', false);
                $('#city_code').prop('disabled', false);
                $('#pincode').prop('disabled', false);
                $('#telephone').prop('disabled', false);
                $('#email').prop('disabled', false);
                $('#website').prop('disabled', false);
                $('#bank_name').prop('disabled', false);
                $('#account_no').prop('disabled', false);
                $('#ifsc').prop('disabled', false);
                $('#bank_address').prop('disabled', false);
                $('#gst_no').prop('disabled', false);
                $('#pan_no').prop('disabled', false);
                $('#cin_no').prop('disabled', false);
                $('#file').prop('disabled', false);
            });
     
    
   });
     // country search
    //  function searchCountry(){
    //     var key = $('#country').val();
    //     $('#country_code').val('');
    //     if(key.length < 1){
    //         return false;
    //     }
    //     $.ajax({
    //         url: "{{route('search.country')}}",
    //         method: "POST",
    //         data: {'_token':'{{csrf_token()}}','key':key},
    //         success: function(response){
    //             $('.country-suggestion').replaceWith(response.sugestion);
    //         }
    //     });
    // }

    function searchCountry(){
        var key = $('#country').val();
        $('#country_code').val('');
        if(key.length < 1){
            return false;
        }
        $.ajax({
            url: "{{route('search.country')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','key':key},
            success: function(response){
                $('#country_code').val('');
                $('.country-suggestion').replaceWith(response.sugestion);
            }
        });
    }

    function searchCountryData(name,code){
        $('#country_code').val(code);
        $('#country').val(name);
        $('.country-suggestion').hide();
    }
    // country search
    // state search 
    function searchState(){
        var country = $('#country').val();
        var ccode = $('#country_code').val();

        $('#city').val('');
        $('#city_code').val('');

        if(country.length < 1 || ccode.length < 1){
            alert('Please enter Country and Country code');
            $('#country').focus();
            $('#state').val('');
            return false;
        }
        var key = $('#state').val();
        $('#state_code').val('');
        if(key.length < 1){
            $('.search-suggestion').hide();
            return false;
        }
        $.ajax({
            url: "{{route('search.state')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','key':key,'country':country,'ccode':ccode},
            success: function(response){
                if(response.status == 400){
                    alert(response.message)
                    $('#country').focus();
                    $('#state').val('');
                }
                $('.state-suggestion').replaceWith(response.sugestion);
            }
        });
    }

    function searchStateData(name,code){
        $('#state_code').val(code);
        $('#state').val(name);
        $('.state-suggestion').hide();
    }
    // state search

    // search city
    function searchCity(){
        var country = $('#country').val();
        var ccode = $('#country_code').val();

        var state = $('#state').val();
        var scode = $('#state_code').val();

        if(state.length < 1 || scode.length < 1){
            alert('Please enter State and State Code');
            $('#state').focus();
            $('#city').val('');
            return false;
        }
        var key = $('#city').val();
        $('#city_code').val('');
        if(key.length < 1){
            $('.search-suggestion').hide();
            return false;
        }
        $.ajax({
            url: "{{route('search.city')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','key':key,'state':state,'scode':scode,'country':country,'ccode':ccode},
            success: function(response){
                console.log(response);
                if(response.status == 400){
                    alert(response.message)
                    $('#state').focus();
                    $('#state').val('');
                }
                $('.city-suggestion').replaceWith(response.sugestion);
            }
        });
    }
    function searchCityData(name,code){
        $('#city_code').val(code);
        $('#city').val(name);
        $('.state-suggestion').hide();
    }
    // search city

</script>
@endpush