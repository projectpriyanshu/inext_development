@extends('layouts.main')
@section('content')
<div class="row background_image">
        <div class="col-md-12">
            <div class="card-body">
                <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
                <div class="tab-content mt-5">
                    <div class="tab-pane fade show active" id="branch" role="tabpanel" aria-labelledby="branch-tab">
                        <div class="detail_edit">
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2 text-dark">Franchise Master</legend>
                                <form class="" action="{{route('franchises.store')}}" method="POST" name="myForm" onsubmit="return validateForm()">
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
                                                <span id="alert-success" style="color: green;"></span>
                                                <span id="alert-danger" style="color: red;"></span>
                                                    

                                                <div class="col-md-6">
                                                    <div class="row code form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label">Code</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="code" name="code" value="{{old('code')}}"> 
                                                                <div class="d-flex">
                                                                    <!-- <input type="text" class="form-control"
                                                                        placeholder="Search here.."> &nbsp; -->
                                                                    <button class="btn btn-common rounded-0 searchbtn" type="button" id="search_btn">
                                                                        <i class="fa fa-search"></i>
                                                                        </button>

                                                                            @if($errors->has('code'))
                                                                            <div class="error text-end">{{ $errors->first('code') }}</div>
                                                                             @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row name form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">Name</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
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
                                                                <input type="text" class="form-control"  id="address" name="address" value="{{old('address')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('address') }}</div>
                                                             @endif

                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">
                                                            <span class="required-star">*</span>    
                                                            Country
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <div class="row form-row">
                                                                    <div class="col-md-4">
                                                                        <input id="country_code" type="text" class="form-control" name="country_code" value="{{old('country_code')}}">
                                                                        @if($errors->has('country_code'))
                                                                          <div class="error text-end">{{ $errors->first('country_code') }}</div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input id="country" type="text" class="form-control country" name="country" value="{{old('country')}}" placeholder="Search Country..." onkeyup="return deleteCountry()">
                                                                        @if($errors->has('country'))
                                                                          <div class="error text-end">{{ $errors->first('country') }}</div>
                                                                        @endif
                                                                        <div class="bg-dark country-suggestion search-suggestion"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label">
                                                            <span class="required-star">*</span>    
                                                            State
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <div class="row form-row">
                                                                    <div class="col-md-4">
                                                                        <input id="state_code" type="text" class="form-control" name="state_code" value="{{old('state_code')}}">
                                                                        @if($errors->has('state_code'))
                                                                          <div class="error text-end">{{ $errors->first('state_code') }}</div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input id="state" type="text" class="form-control" name="state" value="{{old('state')}}" placeholder="Search State..." onkeyup="return searchState()">
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
                                                            <label for="" class="form-label">
                                                            <span class="required-star">*</span>    
                                                            City
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <div class="row form-row">
                                                                    <div class="col-md-4">
                                                                        <input id="city_code" type="text" class="form-control" name="city_code" value="{{old('city_code')}}">
                                                                        @if($errors->has('city_code'))
                                                                          <div class="error text-end">{{ $errors->first('city_code') }}</div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input id="city" type="text" class="form-control" name="city" value="{{old('city')}}" placeholder="Search City..." onkeyup="return searchCity()">
                                                                        @if($errors->has('city'))
                                                                          <div class="error text-end">{{ $errors->first('city') }}</div>
                                                                        @endif
                                                                        <div class="bg-dark city-suggestion search-suggestion"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">
                                                                <span class="required-star">*</span> 
                                                                Pincode
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="pincode" name="pincode" value="{{old('pincode')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('pincode') }}</div>
                                                             @endif


                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">
                                                                <span class="required-star">*</span> 
                                                                Telephone
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{old('telephone')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('telephone') }}</div>
                                                             @endif


                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">
                                                                <span class="required-star">*</span> 
                                                                Email Id
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('email') }}</div>
                                                             @endif


                                                        </div>
                                                    </div>
    
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label">Website</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="website" name="website" value="{{old('website')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('website') }}</div>
                                                             @endif


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
                                                                <input type="text" class="form-control" id="bankname" name="bankname" value="{{old('bankname')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('bankname') }}</div>
                                                             @endif


                                                        </div>
                                                    </div>
                                                    <div class="row name form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">
                                                                <span class="required-star">*</span> 
                                                                A/C No
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="ac_no" name="ac_no" value="{{old('ac_no')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('ac_no') }}</div>
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
                                                                <input type="text" class="form-control" id="ifsc" name="ifsc" value="{{old('ifsc')}}">
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
                                                                <input type="text" class="form-control" id="bank_address" name="bank_address" value="{{old('bank_address')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('bank_address') }}</div>
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
                                                            <label for="name" class="form-label ">GST No</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="gst" name="gst"  value="{{old('gst')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('gst') }}</div>
                                                             @endif


                                                        </div>
                                                    </div>
    
                                                    <div class="row  form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">PAN No</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="pan_no" name="pan_no"  value="{{old('pan_no')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('pan_no') }}</div>
                                                             @endif


                                                        </div>
                                                    </div>
    
                                                    <div class="row  form-group">
                                                        <div class="col-md-4">
                                                            <label for="name" class="form-label ">
                                                                <span class="required-star">*</span> 
                                                                CIN No
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="bind_input">
                                                                <span class="spacing">:</span>
                                                                <input type="text" class="form-control" id="cin_no" name="cin_no" value="{{old('cin_no')}}">
                                                            </div>

                                                            @if($errors->has('name'))
                                                            <div class="error text-end">{{ $errors->first('cin_no') }}</div>
                                                             @endif


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <div class="btn_group b4">
                                                <input type="hidden" id="id" value="" name="id">
                                                <!-- <button class="btn new-btn btn-primary">New
                                                    <i class="fa fa-folder-plus"></i>
                                                </button> -->

                                                <a href="{{route('franchises.list')}}" class="btn btn-secondary save-btn mr-3"> List
                                                    <i class="fa fa-list ms-2"></i>
                                                    </a>
                                                <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_btn"> Edit
                                                    <i class="fa fa-edit ms-2"></i>
                                                </button>
                                                <button type="submit" class="btn btn-success save-btn">Save
                                                    <i class="fa fa-save ms-2"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" id="delete_franchises">Delete
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <!-- <button class="btn remove-btn btn-danger">Remove
                                                    <i class="fa fa-minus"></i>
                                                </button> 
                                                <button class="btn close-btn btn-info">Close
                                                    <i class="fa fa-times"></i>
                                                </button> -->
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

function validateForm() {
  let country = document.forms["myForm"]["country"].value;
  if (country == "") {
    alert("country must be filled out");
    return false;
  }

  let state = document.forms["myForm"]["state"].value;
  if (state == "") {
    alert("state must be filled out");
    return false;
  }

  let city = document.forms["myForm"]["city"].value;
  if (city == "") {
    alert("city must be filled out");
    return false;
  }

  let pincode = document.forms["myForm"]["pincode"].value;
  if (pincode == "") {
    alert("pincode must be filled out");
    return false;
  }

  let telephone = document.forms["myForm"]["telephone"].value;
  if (telephone == 10 || isNaN(telephone) ) {
      alert("telephone MUST BE NUMBER AND 10 DIGIT");
    return false;
  }

  let email = document.forms["myForm"]["email"].value;
  if (email == "" ) {
      alert("email must be filled out");
    return false;
  }

  let ac_no = document.forms["myForm"]["ac_no"].value;
  if (ac_no == "") {
    alert("ac_no must be filled out");
    return false;
  }

  let cin_no = document.forms["myForm"]["cin_no"].value;
  if (cin_no == "") {
    alert("cin_no must be filled out");
    return false;
  }
 }

$(document).ready(function(){
 $('#search_btn').click(function(){
    var code = Number($('#code').val());
    $.ajax({
       method:"GET",
       url: "{{route('franchise.index')}}", 
       data: {
           '_token':"{{csrf_token()}}",
           'code':code,
        },
       success: function(res){
         console.log(res);
            var franchises = res.data;
            if(res.status == true){
                $('#code').val(franchises.code);
                $('#address').val(franchises.address).prop('disabled', true);
                $('#name').val(franchises.name).prop('disabled', true);
                $('#state_code').val(franchises.statecode).prop('disabled', true);
                $('#country_code').val(franchises.countrycode).prop('disabled', true);
                $('#state').val(franchises.statename).prop('disabled', true);
                $('#country').val(franchises.countriename).prop('disabled', true); 
                $('#city_code').val(franchises.citycode).prop('disabled', true);
                $('#city').val(franchises.cityname).prop('disabled', true);
                $('#pincode').val(franchises.pincode).prop('disabled', true);
                $('#telephone').val(franchises.telephone).prop('disabled', true);
                $('#email').val(franchises.email).prop('disabled', true);
                $('#website').val(franchises.website).prop('disabled', true);
                $('#bankname').val(franchises.bank_name).prop('disabled', true);
                $('#ac_no').val(franchises.ac_no).prop('disabled', true);
                $('#ifsc').val(franchises.ifsc).prop('disabled', true);
                $('#bank_address').val(franchises.bank_address).prop('disabled', true);
                $('#gst').val(franchises.gst_no).prop('disabled', true);
                $('#pan_no').val(franchises.pan_no).prop('disabled', true);
                $('#cin_no').val(franchises.cin_no).prop('disabled', true);
                $('#id').val(franchises.id).prop('disabled', true);
            }else{
                $('#address').val('').prop('disabled', false);
                $('#name').val('').prop('disabled', false);
                $('#state_code').val('').prop('disabled', false);
                $('#country_code').val('').prop('disabled', false);
                $('#state').val('').prop('disabled', false);
                $('#country').val('').prop('disabled', false); 
                $('#city_code').val('').prop('disabled', false);
                $('#city').val('').prop('disabled', false);
                $('#pincode').val('').prop('disabled', false);
                $('#telephone').val('').prop('disabled', false);
                $('#email').val('').prop('disabled', false);
                $('#website').val('').prop('disabled', false);
                $('#bankname').val('').prop('disabled', false);
                $('#ac_no').val('').prop('disabled', false);
                $('#ifsc').val('').prop('disabled', false);
                $('#bank_address').val('').prop('disabled', false);
                $('#gst').val('').prop('disabled', false);
                $('#pan_no').val('').prop('disabled', false);
                $('#cin_no').val('').prop('disabled', false);
                $('#id').val('').prop('disabled', false);
            }
       }  
    });
        

       $('#edit_btn').click(function() 
            {
                $('#name').prop('disabled', false);
                $('#address').prop('disabled', false);
                $('#state_code').prop('disabled', false);
                $('#country_code').prop('disabled', false);
                $('#state').prop('disabled', false);
                $('#country').prop('disabled', false);
                $('#pincode').prop('disabled', false);
                $('#telephone').prop('disabled', false);
                $('#email').prop('disabled', false);
                $('#website').prop('disabled', false);
                $('#bankname').prop('disabled', false);
                $('#ac_no').prop('disabled', false);
                $('#ifsc').prop('disabled', false);
                $('#bank_address').prop('disabled', false);
                $('#gst').prop('disabled', false);
                $('#pan_no').prop('disabled', false);
                $('#cin_no').prop('disabled', false);
                $('#city').prop('disabled', false);
                $('#city_code').prop('disabled', false);
                $('#id').prop('disabled', false);
                })
 });

 $('#delete_franchises').click(function() 
      {
        var id = $('#id').val();
         var token = "{{csrf_token()}}";
         $.ajax({
            url: "{{route('delete-franchises')}}", 
            data: {'_token':token,'id':id},
            success: function(){
                alert('Data Deleted Successfully!')
                location.reload();
            }
      })
   });
 
});

 </script>
@endpush