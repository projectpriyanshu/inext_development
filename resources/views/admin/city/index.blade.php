@extends('layouts.main')
@section('content')
<div class="background_image">
        <!-- <div class="col-md-12"> -->
        <div class="card-body">
            <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
            <div class="mt-5">
            
                <!-- <div class="tab-pane fade show active" id="city" role="tabpanel" aria-labelledby="city-tab"> -->
                <form class="" method="POST" action="{{url('city-add')}}" >
                    @csrf
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">City Master</legend>

                            <div class="form card mt-2">
                                <!-- <div class="card-header">
                                        </div> -->
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
                                                
                                        <div class="col-md-7">
                                            <div class="row code form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Search</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" id="search-input" class="form-control"
                                                            placeholder="Search here...">
                                                        <button type="button" id="search-btn"  class="btn btn-common rounded-0 save-btn">
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
                                                    <label for="code" class="form-label ">Code</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input type="text" class="form-control" name="code" id="code" value="{{old('code')}}">
                                                        
                                                        <button type="button" class="btn btn-common rounded-0 save-btn" id="check_code">
                                                            <span><i class="fa fa-search"></i></span>
                                                        </button>
                                                    </div>
                                                    @if($errors->has('code'))
						                              <div class="error text-end">{{ $errors->first('code') }}</div>
						                           	@endif
                                                </div>
                                            </div>
                                            <div class="row name form-group">
                                                <div class="col-md-4">
                                                    <label name="name" class="form-label ">Name</label>
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
                                            
                                            <div class="row country form-group">
                                                <div class="col-md-4">
                                                    <label name="country" class="form-label " >Country</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <div class="form-row row">
                                                            <div class="col-md-3">
                                                                <input type="text" class="form-control" name="country_code" id="country_code" value="{{old('country_code')}}">
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" name="country" id="country" value="{{old('country')}}" class="form-control" onkeyup="searchCountry()" autocomplete="off">
                                                                @if($errors->has('country'))
                                                                <div class="error text-end">{{ $errors->first('country') }}</div>
                                                                @endif
                                                                <div class="bg-dark country-suggestion search-suggestion"></div>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row state form-group">
                                                <div class="col-md-4">
                                                    <label for="state" class="form-label ">State</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <div class="form-row row">
                                                        <div class="col-md-3">
                                                                <input type="text" class="form-control" name="state_code" id="state_code" value="{{old('state_code')}}">
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" name="state" id="state" class="form-control" onkeyup="searchState()" autocomplete="off" value="{{old('state')}}">
                                                                @if($errors->has('state'))
						                                        <div class="error text-end">{{ $errors->first('state') }}</div>
						                           	            @endif
                                                                   <div class="bg-dark state-suggestion search-suggestion"></div>
                                                            </div>
                                                            

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">

                                                </div>
                                                <!-- <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing"></span>
                                                        <a href="" class="download">
                                                          Download Excel
                                                        </a>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                           <input type="hidden" name="id" id="id" value="">
                           <a href="{{url('city-list')}}" class="btn btn-secondary save-btn mr-3"> List
                           <i class="fa fa-list ms-2"></i>
                           </a>
                           <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_city"> Edit
                           <i class="fa fa-edit ms-2"></i>
                           </button>
                           <button class="btn btn-success save-btn" onclick="return validate()">Save
                           <i class="fa fa-save ms-2"></i>
                           </button>
                        </div>
                     </div>
                        </fieldset>
                    </div>
                    
                </form>
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
    

    }

   $(document).ready(function(){
      $('#check_code').click(function(){
         var id = $('#id').val();
         var code = $('#code').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: "{{route('city-index')}}", 
            data: {'_token':token,'code':code,'id':id},
            success: function(result){
               var city = jQuery.parseJSON( result );
               $('#id').val(city.id);
               $('#name').val(city.name).prop('disabled', true);
               $('#state_code').val(city.state_code).prop('disabled', true);
               $('#country_code').val(city.country_code).prop('disabled', true);
                $('#state').val(city.state).prop('disabled', true);
                $('#country').val(city.country).prop('disabled', true);
               if(city.status == '400')
               {
                  $('#id').val();
                  $('#name').val();
                  $('#state').val();
                  $('#name').prop('disabled', false);
                  $('#state').prop('disabled', false);
                  $('#state_code').prop('disabled', false);
                  $('#country').prop('disabled', false);
                  $('#country_code').prop('disabled', false);
                  $('#state').prop('disabled', false);
                  $('#country').prop('disabled', false);
                  $('#alert-danger').text(city.message);
               }
            }  
         });
      });

      $('#search-btn').click(function(){
         var searchkey = $('#search-input').val();
         $.ajax({
            method:"GET",
            url: "{{route('city-index')}}", 
            data: {'_token':"{{csrf_token()}}",'searchkey':searchkey},
            success: function(result){
               console.log(result);
                var city = jQuery.parseJSON(result);
                $('#id').val(city.id);
                $('#code').val(city.code).prop('disabled', true);
                $('#name').val(city.name).prop('disabled', true);
                $('#state_code').val(city.state_code).prop('disabled', true);
                $('#country_code').val(city.country_code).prop('disabled', true);
                $('#state').val(city.state).prop('disabled', true);
                $('#country').val(city.country).prop('disabled', true);
               if(city.status == '400')
               {
                  $('#id').val();
                  $('#code').val();
                  $('#name').val();
                  $('#gst_state_code').val();
                  $('#code').prop('disabled', false);
                  $('#name').prop('disabled', false);
                  $('#code').prop('disabled', false);
                  $('#state').prop('disabled', false);
                  $('#state_code').prop('disabled', false);
                  $('#country').prop('disabled', false);
                  $('#country_code').prop('disabled', false);
                  $('#alert-danger').text(city.message);
               }
            }  
         });
      });

      $('#edit_city').click(function() 
      {
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
         $('#state').prop('disabled', false);
         $('#country').prop('disabled', false);
      })
     
    
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
        var key = $('#state').val();
        // alert(key);

        if(country.length < 1 || ccode.length < 1){
            alert('Please enter Country and Country code');
            $('#country').focus();
            $('#state').val('');
            return false;
        }
        
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

</script>
@endpush