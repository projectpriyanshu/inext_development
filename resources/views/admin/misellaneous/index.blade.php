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
                  <legend class="w-auto px-2 text-dark">Misellaneous Master</legend>
                  <form action="{{url('misellaneous-add')}}" method="post">
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
                                       <label for="gst" class="form-label ">GST</label>
                                    </div>
                                    <div class="col-md-8">
                                       <div class="bind_input">
                                          <span class="spacing">:</span>
                                          <input type="text" class="form-control" name="gst" id="gst" value="{{old('gst')}}">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row text-end mb-3">
                                    @if($errors->has('gst'))
			                              <div class="error">{{ $errors->first('gst') }}</div>
			                           @endif
                                 </div>
                                 <div class="row gststatecode form-group">
                                    <div class="col-md-4">
                                       <label for="fuel_charges" class="form-label ">Fuel Charges</label>
                                    </div>
                                    <div class="col-md-8">
                                       <div class="bind_input">
                                          <span class="spacing">:</span>
                                          <input type="text" class="form-control" name="fuel_charges" id="fuel_charges" value="{{old('fuel_charges')}}">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row text-end mb-3">
                                    @if($errors->has('fuel_charges'))
                                       <div class="error">{{ $errors->first('fuel_charges') }}</div>
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card-footer text-right">
                           <input type="hidden" name="id" id="id" value="">
                           <a href="{{url('misellaneous-list')}}" class="btn btn-secondary save-btn mr-3"> List
                           <i class="fa fa-list ms-2"></i>
                           </a>
                           <button type="button" class="btn btn-secondary save-btn mr-3" id="edit_state"> Edit
                           <i class="fa fa-edit ms-2"></i>
                           </button>
                           <button type="submit" class="btn btn-success save-btn">Save
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
   $(document).ready(function(){
      $('#check_code').click(function(){
         var id = $('#id').val();
         var code = $('#code').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: baseurl + "/misellaneous-index", 
            data: {'_token':token,'code':code,'id':id},
            success: function(result){
               var misellaneous = jQuery.parseJSON( result );
               $('#id').val(misellaneous.id);
               $('#name').val(misellaneous.name).prop('disabled', true);
               $('#gst').val(misellaneous.gst).prop('disabled', true);
               $('#fuel_charges').val(misellaneous.fuel_charges).prop('disabled', true);
               if(misellaneous.status == '400')
               {
                  $('#id').val();
                  $('#name').val();
                  $('#gst').val();
                  $('#fuel_charges').val();
                  $('#name').prop('disabled', false);
                  $('#gst').prop('disabled', false);
                  $('#fuel_charges').prop('disabled', false);
                  $('#alert-danger').text(misellaneous.message);
               }
            }  
         });
      });

      $('#search_btn').click(function(){
         var search = $('#search').val();
         var baseurl = "{{url('/')}}";
         var token = "{{csrf_token()}}";
         $.ajax({
            url: baseurl + "/misellaneous-index", 
            data: {'_token':token,'search':search},
            success: function(result){
               var misellaneous = jQuery.parseJSON( result );
               $('#id').val(misellaneous.id);
               $('#code').val(misellaneous.code).prop('disabled', true);
               $('#name').val(misellaneous.name).prop('disabled', true);
               $('#gst').val(misellaneous.gst).prop('disabled', true);
               $('#fuel_charges').val(misellaneous.fuel_charges).prop('disabled', true);
               if(misellaneous.status == '400')
               {
                  $('#id').val();
                  $('#code').val();
                  $('#name').val();
                  $('#gst').val();
                  $('#fuel_charges').val();
                  $('#code').prop('disabled', false);
                  $('#name').prop('disabled', false);
                  $('#gst').prop('disabled', false);
                  $('#fuel_charges').prop('disabled', false);
                  $('#alert-danger').text(misellaneous.message);
               }
            }  
         });
      });

      $('#edit_state').click(function() 
      {
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
         $('#gst').prop('disabled', false);
         $('#fuel_charges').prop('disabled', false);
      })
   });
</script>
@endpush