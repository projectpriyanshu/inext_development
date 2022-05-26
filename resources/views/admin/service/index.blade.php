@extends('layouts.main')
@section('content')
<div class="row background_image">
    <div class="col-md-12">
        <div class="card-body">
            <!-- <img src="../INext Screens/image/Logo.png" class="image_middle" alt=""> -->
            <div class="mt-5">
                <!-- <div class="tab-pane fade show active" id="service" role="tabpanel" aria-labelledby="service-tab"> -->

                	@if(Session::has('success'))
                	<div class="col-md-6 offset-md-3">
                		<div class="alert alert-success alert-dismissible">
						    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
						    <strong>Success!</strong> {{Session::get('success')}}
						</div>
                	</div>
                	
                	@endif

                <form method="post" action="{{route('service.master.add')}}">
                    <div class="detail_edit">
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2 text-dark">SERVICE MASTER</legend>

                            <div class="form card mt-2">
                        		@csrf
                                <div class="card-body">
                                    <div class="row">
                                    	
                                        <div class="col-md-6">
                                        	<div id="message" class="text-danger text-center"></div>
                                            <div class="row code form-group">
                                                <div class="col-md-4">
                                                    <label for="name" class="form-label ">Search</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input id="search" type="text" class="form-control"
                                                            placeholder="Search here...">
                                                        <button id="search-btn" type="button" class="btn btn-common rounded-0 save-btn">
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
                                                        <input id="code" type="text" class="form-control" name="code" value="{{old('code')}}">
                                                        <button id="search-code" type="button" class="btn btn-common rounded-0 save-btn">
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
                                                    <label for="name" class="form-label ">Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="bind_input">
                                                        <span class="spacing">:</span>
                                                        <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}">
                                                    </div>
                                                    @if($errors->has('name'))
						                              	<div class="error text-end">{{ $errors->first('name') }}</div>
						                           	@endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                	<input type="hidden" name="id" id="id" value="">
                                	<a href="{{route('service.master.list')}}" class="btn btn-secondary save-btn mr-3"> List
		                           		<i class="fa fa-list ms-2"></i>
		                           	</a>
                                    <button id="edit-btn" type="button" class="btn btn-secondary save-btn mr-3"> Edit
                                        <i class="fa fa-edit ms-2"></i>
                                    </button>
                                    <button class="btn btn-success save-btn" type="submit" onclick="return validate()">Save
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
         }


   $(document).ready(function(){
   	
      $('#search-code').click(function(){
      	var searchkey = $('#code').val();
         $.ajax({
            url: "{{route('search.service.master')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','searchcode':searchkey},
            success: function(response){
            	console.log(response);
               if(response.status == 200){
               		$('#code').val(response.data.code).prop('disabled', true);
               		$('#name').val(response.data.name).prop('disabled', true);
               		$('#id').val(response.data.id);
               }else if(response.status == 400){
               		$('#code').val('');
               		$('#name').val('');
               		$('#id').val('');
               		$('#message').html(response.message).show();
               }else{
               		$('#message').show();	
               		$('#message').html('Unknown Error!');
               }
            }  
         });
      });

      $('#search-btn').click(function(){
      	var searchkey = $('#search').val();
         $.ajax({
            url: "{{route('search.service.master')}}",
            method: "POST",
            data: {'_token':'{{csrf_token()}}','searchkey':searchkey},
            success: function(response){
            	console.log(response);
               if(response.status == 200){
               		$('#code').val(response.data.code).prop('disabled', true);
               		$('#name').val(response.data.name).prop('disabled', true);
               		$('#id').val(response.data.id);
               }else if(response.status == 400){
               		$('#code').val('');
               		$('#name').val('');
               		$('#id').val('');
               		$('#message').html(response.message).show();
               }else{
               		$('#message').show();	
               		$('#message').html('Unknown Error!');
               }
            }  
         });
      });

      $('#edit-btn').click(function() 
      {
         $('#code').prop('disabled', false);
         $('#name').prop('disabled', false);
      })
      
   });
</script>
@endpush