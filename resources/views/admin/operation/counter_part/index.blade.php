@extends('layouts.main')
@section('content')

<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="counterpart" role="tabpanel" aria-labelledby="counterpart-tab">
                        <!-- <h5 class="card-title text-center">COUNTER PART</h5> -->
                        <div class="detail_edit"> 
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Details</legend>
                                <!-- @php
                                foreach ($errors->all('<li>:message</li>') as $message)
                                    {
                                        echo $message;
                                    }
                                    @endphp -->
                                <form  method="POST" action="{{url('counter-part-add')}}">
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
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label">Code</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="code" id="code"  class="form-control">
                                                                <div class="d-flex">
                                                                <button type="button" class="btn btn-common rounded-0 save-btn" id="check_code">
                                                                    <span><i class="fa fa-search"></i></span>
                                                                </button>
                                                                </div>
                                                                
                                                            </div>
                                                            @if($errors->has('name'))
						                                         <div class="error text-end">{{ $errors->first('code') }}</div>
						                           	            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Name</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="name" id="name" class="form-control">
                                                            </div>
                                                            @if($errors->has('name'))
						                                         <div class="error text-end">{{ $errors->first('name') }}</div>
						                           	            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Address</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="address" id="address" class="form-control">
                                                            </div>
                                                            @if($errors->has('name'))
						                                         <div class="error text-end">{{ $errors->first('address') }}</div>
						                           	            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing"></span>
                                                                <input type="text" name="address1" id="address1" class="form-control">
                                                            </div>
                                                            @if($errors->has('name'))
						                                         <div class="error text-end">{{ $errors->first('address1') }}</div>
						                           	            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="zipcode" class="form-label ">Zipcode</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" name="zipcode" id="zipcode" class="form-control">
                                                            </div>
                                                            @if($errors->has('name'))
						                                         <div class="error text-end">{{ $errors->first('zipcode') }}</div>
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
                                                                <label for="name" class="form-label ">Contact
                                                                    Person</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" name="contact" id="contact" class="form-control">
                                                                </div>
                                                                @if($errors->has('name'))
						                                         <div class="error text-end">{{ $errors->first('contact') }}</div>
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
                                                                    <input type="text" name="telephone" id="telephone" class="form-control">
                                                                </div>
                                                                @if($errors->has('name'))
						                                         <div class="error text-end">{{ $errors->first('telephone') }}</div>
						                           	            @endif
                                                            </div>
                                                        </div>
    
                                                        <div class="row gststatecode form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Email Id</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" name="email" id="email" class="form-control">
                                                                </div>
                                                                @if($errors->has('name'))
						                                         <div class="error text-end">{{ $errors->first('email') }}</div>
						                           	            @endif
                                                            </div>
                                                        </div>
    
                                                        <div class="row gststatecode form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Website</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" name="website" id="website" class="form-control">
                                                                </div>
                                                                @if($errors->has('name'))
						                                         <div class="error text-end">{{ $errors->first('website') }}</div>
						                           	            @endif
                                                            </div>
                                                        </div>
    
                                                        <div class="row gststatecode form-group">
                                                            <div class="col-md-4">
                                                                <label for="name" class="form-label ">Sector</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="bind_input">
                                                                    <span class="spacing">:</span>
                                                                    <input type="text" name="sector" id="sector" class="form-control">
                                                                </div>
                                                                @if($errors->has('name'))
						                                         <div class="error text-end">{{ $errors->first('sector') }}</div>
						                           	            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-right">
                                                    <input type="hidden" name="id" id="id" value="">
                                                    <a href="{{url('counter-part-list')}}" class="btn btn-secondary save-btn mr-3"> List
                                                    <i class="fa fa-list ms-2"></i>
                                                    </a>
                                                    
                                                    <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_counter"> Edit
                                                    <i class="fa fa-edit ms-2"></i>
                                                    </button>
                                                    <button class="btn btn-success save-btn" onclick="return validate()">Save
                                                    <i class="fa fa-save ms-2"></i>
                                                    </button>
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
        $("input[name='address']").focus();
        return false;
    }
    var add1 = $("input[name='address1']").val();
    if(add1.length < 1){
        alert('The adress1                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                field is required');
        $("input[name='adress1']").focus();
        return false;
    }
    var add2 = $("input[name='zipcode']").val();
    if(add2.length < 1){
        alert('The zipcode field is required');
        $("input[name='zipcode']").focus();
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
    var con= $("input[name='contact']").val();
    if(con.length < 1){
        alert('The contact field is required');
        $("input[name='contact']").focus();
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
    var sec= $("input[name='sector']").val();
    if(sec.length < 1){
        alert('The sector name field is required');
        $("input[name='sector']").focus();
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
            url: "{{route('counter-part.index')}}", 
            data: {'_token':token,'code':code,'id':id},
            success: function(result){
               var company = jQuery.parseJSON( result );
                $('#id').val(company.id).prop('disabled', true);
                $('#name').val(company.name).prop('disabled', true);
                $('#address').val(company.address).prop('disabled', true);
                $('#address1').val(company.address1).prop('disabled', true);
                $('#zipcode').val(company.zipcode).prop('disabled', true);
                $('#country_code').val(company.country_code).prop('disabled', true);
                $('#country').val(company.country).prop('disabled', true);
                $('#state_code').val(company.state_code).prop('disabled', true);
                $('#state').val(company.state).prop('disabled', true);
                $('#city_code').val(company.city_code).prop('disabled', true);
                $('#city').val(company.city).prop('disabled', true);
                $('#contact').val(company.contact).prop('disabled', true);
                $('#telephone').val(company.telephone).prop('disabled', true);
                $('#email').val(company.email).prop('disabled', true);
                $('#website').val(company.website).prop('disabled', true);
                $('#sector').val(company.sector).prop('disabled', true);
                
               if(company.status == '400')
               {
                $('#id').val();
                $('#name').val();
                $('#state').val();
                $('#alert-danger').text(company.message);
                }
                }  
                });
            });

            $('#edit_counter').click(function() 
            {
                $('#code').prop('disabled', false);
                $('#name').prop('disabled', false);
                $('#address').prop('disabled', false);
                $('#address1').prop('disabled', false);
                $('#zipcode').prop('disabled', false);
                $('#country').prop('disabled', false);
                $('#country_code').prop('disabled', false);
                $('#state').prop('disabled', false);
                $('#state_code').prop('disabled', false);
                $('#city').prop('disabled', false);
                $('#city_code').prop('disabled', false);
                $('#contact').prop('disabled', false);
                $('#telephone').prop('disabled', false);
                $('#email').prop('disabled', false);
                $('#website').prop('disabled', false);
                $('#sector').prop('disabled', false);
                $('#id').prop('disabled', false);
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