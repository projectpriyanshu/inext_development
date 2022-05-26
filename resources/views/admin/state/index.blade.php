@extends('layouts.main')
@section('content')
<div class="row background_image">
   <div class="col-md-12">
      <div class="card-body">
         <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
         <div class="mt-5">
            <!-- <div class="tab-pane fade show active" id="state" role="tabpanel" aria-labelledby="state-tab"> -->
            <div class="detail_edit">
               <fieldset class="form-group border p-3">
                  <legend class="w-auto px-2 text-dark">State Master</legend>
                  <form action="{{url('state-add')}}" method="post">
                  	@csrf()
                     <div class="card form mt-2">
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
                                          <input type="text" class="form-control" placeholder="Search here..." name="search" id="search">
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
                                   <div class="row country form-group">
                                       <div class="col-md-4">
                                             <label name="country" class="form-label " >Country</label>
                                       </div>
                                       <div class="col-md-8">
                                          <div class="bind_input">
                                             <span class="spacing">:</span>
                                             <div class="row form-row">
                                                   <div class="col-md-4">
                                                      <input id="country_code" type="text" class="form-control" name="country_code" value="{{old('country_code')}}" >
                                                      @if($errors->has('country_code'))
                                                         <div class="error text-end">{{ $errors->first('country_code') }}</div>
                                                      @endif
                                                   </div>
                                                   <div class="col-md-8">
                                                      <input id="country" type="text" class="form-control" name="country" value="{{old('country')}}" onkeyup="searchCountry()" autocomplete="off">
                                                      @if($errors->has('country'))
                                                         <div class="error text-end">{{ $errors->first('country') }}</div>
                                                      @endif
                                                      <div class="bg-dark country-suggestion search-suggestion"></div>
                                                   </div>
                                             </div>
                                          </div>
                                       </div>
                                            </div>
                                 <div class="row text-end mb-3">
                                 	@if($errors->has('country'))
			                              <div class="error">{{ $errors->first('country') }}</div>
			                           @endif
                                 </div>
                                 
                                 <div class="row code form-group">
                                    <div class="col-md-4">
                                       <label for="name" class="form-label">Code</label>
                                    </div>
                                    <div class="col-md-8">
                                       <div class="bind_input">
                                          <span class="spacing">:</span>
                                          <input type="text" class="form-control" name="code" id="code" value="{{old('code')}}">
                                          <button type="button" class="btn btn-common rounded-0 save-btn" id="check_code">
                                          <span><i class="fa fa-search"></i></span>
                                          </button>
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
                                 <div class="row gststatecode form-group">
                                    <div class="col-md-4">
                                       <label for="name" class="form-label ">GST State Code</label>
                                    </div>
                                    <div class="col-md-8">
                                       <div class="bind_input">
                                          <span class="spacing">:</span>
                                          <input type="text" class="form-control" name="gst_state_code" id="gst_state_code" value="{{old('gst_state_code')}}">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row text-end mb-3">
                                    @if($errors->has('gst_state_code'))
			                              <div class="error">{{ $errors->first('gst_state_code') }}</div>
			                           @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer text-right">
                           <input type="hidden" name="id" id="id" value="">
                           <a href="{{url('state-list')}}" class="btn btn-secondary save-btn mr-3"> List
                           <i class="fa fa-list ms-2"></i>
                           </a>
                           <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_state"> Edit
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
            <!-- </div> -->
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
    var isod = $("input[name='gst_state_code']").val();
    if(isod.length < 1){
        alert('This field is required');
        $("input[name='gst_state_code']").focus();
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
            url: baseurl + "/state-index", 
            data: {'_token':token,'code':code,'id':id},
            success: function(result){
               var state = jQuery.parseJSON( result );
               $('#id').val(state.id);
               $('#country').val(state.country).prop('disabled', true);
               $('#country_code').val(state.country_code).prop('disabled', true);
               $('#code').val(state.code).prop('disabled', true);
               $('#name').val(state.name).prop('disabled', true);
               $('#gst_state_code').val(state.gst_state_code).prop('disabled', true);
               if(state.status == '400')
               {
                  $('#id').val();
                  $('#name').val();
                  $('#code').prop('disabled', false);
                  $('#gst_state_code').val();
                  $('#country').prop('disabled', false);
                  $('#country_code').prop('disabled', false);
                  $('#name').prop('disabled', false);
                  $('#gst_state_code').prop('disabled', false);
                  $('#alert-danger').text(state.message);
               }
            }  
         });
      });

      $('#search_btn').click(function(){
         var search = $('#search').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: baseurl + "/state-index", 
            data: {'_token':token,'search':search},
            success: function(result){
               var state = jQuery.parseJSON( result );
               $('#id').val(state.id);
               $('#country').val(state.country).prop('disabled', true);
               $('#country_code').val(state.country_code).prop('disabled', true);
               $('#code').val(state.code).prop('disabled', true);
               $('#name').val(state.name).prop('disabled', true);
               $('#gst_state_code').val(state.gst_state_code).prop('disabled', true);
               if(state.status == '400')
               {
                  $('#id').val();
                  $('#code').val();
                  $('#name').val();
                  $('#country').prop('disabled', false);
                  $('#country_code').prop('disabled', false);
                  $('#code').prop('disabled', false);
                  $('#gst_state_code').val();
                  $('#name').prop('disabled', false);
                  $('#gst_state_code').prop('disabled', false);
                  $('#alert-danger').text(state.message);
               }
            }  
         });
      });

      $('#edit_state').click(function() 
      {
         $('#country_code').prop('disabled', false);
         $('#country').prop('disabled', false);
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
         $('#gst_state_code').prop('disabled', false);
      })
   });

  // country search
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
</script>
@endpush